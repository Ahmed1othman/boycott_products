<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::where('country_status',1)->get(['id','country_name']);
        return response()->apiSuccess($countries);
    }

}
