<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::where('company_status',1)->get(['id','company_name']);
        return response()->apiSuccess($companies);
    }

}
