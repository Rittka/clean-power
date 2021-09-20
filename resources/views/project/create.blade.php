@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'add project')
@section('content')

    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">أضف طلبية جديدة</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->

            <form class="box" method="post" action="/staff">
                {{ csrf_field() }}
                <div class="card-body">


                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right">اسم المعدة</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="full_name" value="{{ old('full_name') }}" placeholder="الاسم " required />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> الطاقة</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="full_name" value="{{ old('full_name') }}" placeholder="الطاقة " required />
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> المنشأ</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="full_name" value="{{ old('full_name') }}" placeholder="المنشأ " required />
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> الكمية</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="number"
                                class="form-control form-control-lg form-control-solid border border-primary"
                                name="full_name" value="{{ old('full_name') }}" placeholder="الكمية " required />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> السعر</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="number"
                                class="form-control form-control-lg form-control-solid border border-primary"
                                name="full_name" value="{{ old('full_name') }}" placeholder="السعر " required />
                        </div>
                    </div>
                </div>
                <div class="card-footer row">
                    <div class="col-5"></div>
                    <button type="submit" class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ</button>
                    <button type="reset" class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                </div>

            </form>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('#department').select2({
                placeholder: "اختر موظفي الكشف؟",
            });
        });
    </script>

@endsection
