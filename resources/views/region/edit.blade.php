@extends('layouts.master')
@section('title', 'edit teacher')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ url('region') }}">  جميع المناطق</a></li>
<li class="breadcrumb-item active" aria-current="page"> تعديل منطقة </li>
@endsection
@section('content')
    <form method="post" action="/region/{{ $region->id }}">
        @csrf
        @method('patch')

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">تعديل بيانات المنطقة</h3>
            </div>
        </div>
        <div class="card-body px-0">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">المنطقة</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="text"
                                class="form-control form-control-lg form-control-solid border border-primary"
                                name="name" value="{{ $region->name }}" placeholder="المنطقة " required />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right">المكان</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text"
                                class="form-control form-control-lg form-control-solid border border-primary"
                                name="street" value="{{ $region->street }}" placeholder="الشارع " required />
                        </div>
                    </div>
                </div>

                <div class="card-footer row">
                    <div class="col-5"></div>
                    <button type="submit" class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ التغييرات</button>
                    <button type="reset" class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                </div>

            </div>
        </div>


    </form>
@endsection
