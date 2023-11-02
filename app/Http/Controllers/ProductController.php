<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::select(
                'products.id',
                'products.product_name',
                'companies.company_name',
                'countries.country_name',
                'categories.category_name',
                'product_statuses.status_name',
            )->where('products.product_accept_id',2)
                ->leftjoin('companies', 'companies.id', 'products.company_id')
                ->leftjoin('countries', 'countries.id', 'companies.country_id')
                ->leftjoin('categories', 'categories.id', 'products.category_id')
                ->leftjoin('product_statuses', 'product_statuses.id', 'products.product_status_id')
                ->leftjoin('product_accepts', 'product_accepts.id', 'products.product_accept_id')
            ->get();
        return response()->apiSuccess($products);
    }

    public function show(Product $product){
        $product = Product::select(
            'products.id',
            'products.product_name',
            'products.product_image',
            'companies.company_name',
            'countries.country_name',
            'categories.category_name',
            'product_statuses.status_name',
        )->where('products.id',$product->id)
            ->where('products.product_accept_id',2)
            ->leftjoin('companies', 'companies.id', 'products.company_id')
            ->leftjoin('countries', 'countries.id', 'companies.country_id')
            ->leftjoin('categories', 'categories.id', 'products.category_id')
            ->leftjoin('product_statuses', 'product_statuses.id', 'products.product_status_id')
            ->leftjoin('product_accepts', 'product_accepts.id', 'products.product_accept_id')
//            ->with('alternatives')

            ->first();
        return response()->apiSuccess($product);
    }

    public function store(Request $request){
        $request->validate([
            'product_name'=>'required|max:255|string',
            'category_id'=>'required|exists:categories,id',
            'company_id'=>'nullable|exists:companies,id',
            'product_status_id'=>'nullable|exists:product_statuses,id',
            'product_accept_id'=>'nullable|exists:product_accepts,id',
        ]);
        $data = $request->only([
            'product_name',
            'category_id',
            'company_id',
            'product_status_id',
            'product_accept_id',
        ]);
        if ($request->hasFile('product_image')){
            $filename = 'organizations_'.time() . '.' .$request->product_image->getClientOriginalExtension();
            $path =Storage::disk('public')->putFileAs(
                'products',
                $request->product_image,
                $filename
            );
            $data['product_image'] = $path;
        }
        $product = Product::create($data);
        return response()->apiSuccess($product);

    }

    public function searchProduct(Request $request){
        $searchTerm = $request->input('word');

        $product = Product::select(
            'products.id',
            'products.product_name',
            'products.product_image',
            'companies.company_name',
            'countries.country_name',
            'categories.category_name',
            'product_statuses.status_name'
        )
            ->where('products.product_accept_id', 2)
            ->leftjoin('companies', 'companies.id', 'products.company_id')
            ->leftjoin('countries', 'countries.id', 'companies.country_id')
            ->leftjoin('categories', 'categories.id', 'products.category_id')
            ->leftjoin('product_statuses', 'product_statuses.id', 'products.product_status_id')
            ->leftjoin('product_accepts', 'product_accepts.id', 'products.product_accept_id');

        if (!empty($searchTerm)) {
            $product->where(function ($query) use ($searchTerm) {
                $query->where('products.product_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('products.product_code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('countries.country_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('companies.company_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('categories.category_name', 'like', '%' . $searchTerm . '%');
            });
        }

        $result = $product->get();
        return response()->apiSuccess($result);
    }

}
