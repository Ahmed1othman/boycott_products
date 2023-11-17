<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $companies = Category::get(['id','category_name','image']);
        return response()->apiSuccess($companies);
    }

}
