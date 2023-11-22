<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
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
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $userProduct = Product::where('product_id', $product->id)
            ->where('user_id', $user->id)
            ->first();
        if (!$userProduct)
            return abort(404);
        return view('products.edit',get_defined_vars());
    }

    public function update(StoreProductRequest $request, string $id)
    {
        $user = auth()->user();
        $data = $request->only('price','status');
        $userProduct = Product::where('product_id', $id)
            ->where('user_id', $user->id)
            ->first();
        $userProduct->update($data);
        Session::flash('success', __('admin.product updated successfully'));
//        return redirect()->route('products.edit',$id);
        return redirect()->route('admin-products.index');
    }

    public function destroy(string $id)
    {
        $user = auth()->user();
        if ($user->hasRole('Super Admin')){
            $product = Product::findOrFail($id);
            $product->delete();
        }
        Session::flash('error', __('admin.product deleted successfully'));
        return redirect()->route('admin-products.index');
    }
}
