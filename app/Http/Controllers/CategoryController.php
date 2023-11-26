<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('admin.categories.index',get_defined_vars());
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function show(string $id)
    {
        $product = Category::findOrFail($id);
        return view('admin.categories.show',$product);
    }

    public function store(StoreCategoryRequest $request){
        $data = $request->only('category_name');
        if ($request->hasFile('image')){
            $filename = 'organizations_'.time() . '.' .$request->image->getClientOriginalExtension();
            $path =Storage::disk('public')->putFileAs(
                'categories',
                $request->image,
                $filename
            );
            $data['image'] = $path;
        }
        Category::create($data);
        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->route('categories.index');
    }

    public function edit(string $id)
    {
        $product = Category::findOrFail($id);
        return view('admin.categories.edit',get_defined_vars());
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $data = $request->only('product_name','category_id','company_id','product_status_id','product_accept_id');
        if ($request->hasFile('product_image')){
            $filename = 'products_'.time() . '.' .$request->product_image->getClientOriginalExtension();
            $path =Storage::disk('public')->putFileAs(
                'categories',
                $request->product_image,
                $filename
            );
            $data['product_image'] = $path;
        }
        $product = Category::findOrFail($id);
        $product->update($data);

        Session::flash('success', __('تم التحديث بنجاج'));
        return redirect()->route('categories.index');
    }

    public function destroy(string $id)
    {
        $product = Category::findOrFail($id);
        $product->delete();
        Session::flash('error','تم الحذف بنجاح');
        return redirect()->route('categories.index');
    }
}
