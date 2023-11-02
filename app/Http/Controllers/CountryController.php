<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::where('country_status',1)->get(['id','country_name']);
        return response()->apiSuccess($countries);
    }

}
