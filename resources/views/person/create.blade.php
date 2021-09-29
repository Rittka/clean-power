@extends('layouts.master')
@section('title', 'add customer')
@section('content')

    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">أضف عميل جديد</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="box" method="post" action="/person" >
                {{ csrf_field() }}
                <div class="card-body">

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right">اسم الكامل</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="fullname"  placeholder="الاسم والكنية " required />
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> العنوان</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                                name="location"  placeholder="العنوان " required />
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> النوع</label>
                        <div class="col-lg-9 col-xl-6 ">

                            <select class="form-control  form-control-lg form-control-solid border border-primary " name="type">
                                <option value="1"> موّرد</option>
                                <option value="2">زبون</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-xl-3 col-lg-3 col-form-label text-right"> رقم الهاتف</label>
                        <div class="col-lg-9 col-xl-6">

                            <input type="number" class="form-control form-control-lg form-control-solid border border-primary"
                                name="number"  placeholder="الموبايل " required />
                        </div>
                    </div>
                </div>


                <div class="card-footer row">
                    <div class="col-5"></div>
                    <button type="submit"
                        class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">{{ trans('main.save') }}</button>
                    <button type="reset"
                        class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">{{ trans('main.cancel') }}</button>
                </div>
            </form>
        </div>

    </div>

@endsection
