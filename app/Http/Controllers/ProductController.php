<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::select(
            'products.id',
            'products.product_name',
            'products.created_at',
            'categories.category_name',
            'companies.company_name',
            'countries.country_name',
            'product_statuses.status_name',
            'product_accepts.value as product_accept',
        )
            ->leftJoin('categories','categories.id','products.category_id')
            ->leftJoin('companies','companies.id','products.company_id')
            ->leftJoin('countries','countries.id','companies.country_id')
            ->leftJoin('product_statuses','product_statuses.id','products.product_status_id')
            ->leftJoin('product_accepts','product_accepts.id','products.product_accept_id')
        ->paginate(10);
        return view('admin.products.index',get_defined_vars());
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',$product);
    }

    public function store(StoreProductRequest $request){
        $data = $request->only('product_name','category_id','company_id','product_status_id','product_accept_id');
        if ($request->hasFile('product_image')){
            $filename = 'organizations_'.time() . '.' .$request->product_image->getClientOriginalExtension();
            $path =Storage::disk('public')->putFileAs(
                'products',
                $request->product_image,
                $filename
            );
            $data['product_image'] = $path;
        }
        Product::create($data);
        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->route('products.index');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit',get_defined_vars());
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->only('product_name','category_id','company_id','product_status_id','product_accept_id');
        if ($request->hasFile('product_image')){
            $filename = 'products_'.time() . '.' .$request->product_image->getClientOriginalExtension();
            $path =Storage::disk('public')->putFileAs(
                'products',
                $request->product_image,
                $filename
            );
            $data['product_image'] = $path;
        }
        $product = Product::findOrFail($id);
        $product->update($data);

        Session::flash('success', __('تم التحديث بنجاج'));
        return redirect()->route('products.index');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash('error','تم الحذف بنجاح');
        return redirect()->route('products.index');
    }
}
