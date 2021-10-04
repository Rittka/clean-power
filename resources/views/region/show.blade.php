@extends('layouts.master')
@section('title', 'show subject')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ url('region') }}">  جميع المناطق</a></li>
<li class="breadcrumb-item active" aria-current="page"> تفاصيل منطقة </li>
@endsection
@section('content')
    <form method="get">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">إضافة منطقة جديد</h3>
            </div>
        </div>
        <div class="card-body px-0">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">المنطقة</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                                value="level_id" name="level_id" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">المكان</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                                value="section_id" name="section_id" readonly />
                        </div>
                    </div>

                    <div class="card-footer row">
                        <div class="col-5"></div>
                        <button type="submit" class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ</button>
                        <button type="reset" class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
