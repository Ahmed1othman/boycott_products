<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::where('company_status',1)->get(['id','company_name']);
        return response()->apiSuccess($companies);
    }

}
