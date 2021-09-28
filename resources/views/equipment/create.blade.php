@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'add mainetnance')
@section('content')

    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">أضف معدة جديدة</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->

            <form class="box" method="post" action="/equipment">
                {{ csrf_field() }}
                <div class="card-body">


                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right">اسم المعدة</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="name"  placeholder="الاسم " required />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> الطاقة\السعة</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="capacity"  placeholder="الطاقة " required />
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> النوع</label>
                        <div class="col-lg-9 col-xl-6 ">

                            <select class="form-control  form-control-lg form-control-solid border border-primary " name="type">
                                <option value="صناعي">صناعي </option>
                                <option value="منزلي"> منزلي </option>
                                <option value="تجاري"> تجاري</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> الكمية</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="number" class="form-control form-control-lg form-control-solid border border-primary"
                                name="quantity"  placeholder="الكمية " required />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> السعر</label>
                        <div class="col-lg-9 col-xl-6 input-group ">

                            <input type="number" class="form-control form-control-lg form-control-solid border border-primary "  name="price"  placeholder="السعر "  required />

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



@endsection
