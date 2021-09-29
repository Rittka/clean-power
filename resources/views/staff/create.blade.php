@extends('layouts.master')
@section('title', 'add staff')
@section('content')

    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">أضف موظف جديد</h3>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الاسم </label>
                                <div class="input-group input-group-solid input-group-lg  border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control "
                                        name="fname"  placeholder="الاسم الاول "
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الكنية</label>
                                <div class="input-group input-group-solid input-group-lg  border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control  "
                                        name="lname"  placeholder="الاسم الثاني"
                                        required />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>العنوان</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('address') ? 'is-danger' : ' ' }}"
                                        name="location"
                                        placeholder="العنوان الحالي" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموبايل</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone fas text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="number"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="phone"  required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                            <label class="col-2 col-form-label" style="margin-top: 30px">الجنس:</label>
                            <div class="col-4 col-form-label">
                                <div class="radio-inline"style="margin-top: 30px">
                                    <label class="radio radio-solid" >
                                        <input name="gender" value="0" type="radio" />ذكر
                                        <span></span>
                                    </label>
                                    <label class="radio radio-solid">
                                        <input name="gender" value="1" type="radio" /> أنثى
                                        <span></span>
                                    </label>
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">الحالة الاجتماعية</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-link text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" name="material" id="status">
                                        <option value="0">أعزب</option>
                                        <option value="1">متزوج</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>سنة التعيين </label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="year"
                                        class="form-control {{ $errors ?? ('')->has('date_of_appoint') ? 'is-danger' : ' ' }}"
                                        name="date_of_appoint"
                                        placeholder="سنة التعيين" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="form-group">
                                <label> الراتب</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">

                                    <input type="text"
                                        class="form-control "
                                        name="salary"
                                        placeholder=" الراتب" required />
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>سنة الميلاد</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="year"
                                        class="form-control {{ $errors ?? ('')->has('date_of_birth') ? 'is-danger' : ' ' }}"
                                        name="date_of_birth"
                                        placeholder="سنة الميلاد" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>مكان الميلاد</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">

                                    </div>
                                    <input type="text"
                                        class="form-control "
                                        name="place_of_birth"
                                        placeholder="مكان الميلاد" required />
                                </div>
                            </div>
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
