@extends('layouts.admin.master')
@section('title')
    {{__('admin.products')}}
@endsection

@section('vendor-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection
@section('vendor-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')
    <!-- jQuery Validation -->
    <div class="col-md-12 col-12">
        <x-alerts.validation-errors :errors="$errors" />
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">إضافة منتج</h4>
            </div>
            <div class="card-body">
                <form id="jquery-val-form" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="product_name">اسم المنتج</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="اسم المنتج - مثال: شيبسي" required/>
                        </div>

                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="product_code">كود المنتج</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="" required/>
                        </div>

                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="company_id">الشركة المالكة</label>
                            <select class="form-select select2" id="company_id" name="company_id">
                                <option disabled selected>اختر الشركة المالكة</option>
                                @foreach(\App\Http\Controllers\LookupController::getLookupData('Company') as $company)
                                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="category_id">تصنيف المنتج</label>
                            <select class="form-select select2" id="category_id" name="category_id" required>
                                <option disabled selected>اختر تصنف المنتج</option>
                                @foreach(\App\Http\Controllers\LookupController::getLookupData('Category') as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="product_status_id">موقف المنتج</label>
                            <select class="form-select select2" id="product_status_id" name="product_status_id" required>
                                <option disabled selected>اختر موقف المنتج</option>
                                @foreach(\App\Http\Controllers\LookupController::getLookupData('ProductStatus') as $status)
                                    <option value="{{$status->id}}">{{$status->status_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="product_accept_id">حالة الموافقة علي المنتج</label>
                            <select class="form-select select2" id="product_accept_id" name="product_accept_id" required>
                                <option disabled selected>اختر حالة الموافقة علي المنتج</option>
                                @foreach(\App\Http\Controllers\LookupController::getLookupData('ProductAccept') as $status)
                                    <option value="{{$status->id}}">{{$status->value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="product_image">صورة المتتج</label>
                            <input type="file" class="form-control" name="product_image" accept="image/*">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /jQuery Validation -->
@endsection

@section('vendor-js')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('app-assets/js/scripts/forms/form-validation.js')}}"></script>
@endsection
