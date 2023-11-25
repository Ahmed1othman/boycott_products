@extends('layouts.admin.master')
@section('title')
    التصنيفات
@endsection

@section('vendor-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endsection

@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/forms/form-validation.css') }}">
@endsection


@section('vendor-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endsection

@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
@endsection

@section('content')
    <h3>قائمة التصنيفات</h3>
    <p class="mb-2">

    </p>
    <!-- table -->
    <x-alerts.alerts type="success" />
    <x-alerts.alerts type="info" />
    <x-alerts.alerts type="danger" />
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="align-content-end">
                        <h3 class="h3">قائمة التصنيفات</h3>
                    </span>
                    <span class="align-content-start"><a class="btn btn-primary" href="{{route('categories.create')}}">اضافة منتج</a></span>

                </div>
                <div class="table-responsive">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الرقم التعريفي</th>
                            <th>اسم التصنيف</th>
                            <th>صورة التصنيف</th>
                            <th>تاريح الاضافة</th>
                            <th>الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr id="row_{{$category->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->id}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->image}}</td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('categories.edit',$category->id)}}" style="display: inline-block" class="btn btn-info btn-sm">
                                            <i data-feather="edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm " style="display: inline-block"  data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $category->id }}">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                        <!-- Delete confirmation modal -->
                                        <div class="modal fade modal-danger text-start text-capitalize" id="delete-modal-{{ $category->id }}" tabindex="-1" aria-labelledby="delete-modal-label-{{ $category->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete-modal-label-{{ $category->id }}">تأكيد الحذف</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    هل انت متأكد من حذف المنتج
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
                <div class="card-footer colo align-content-center">
                    <div class="d-flex align-self-center mx-0 row m-2 ">
                        <div class="pagination">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection


@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-user-list.js') }}"></script>
@endsection


