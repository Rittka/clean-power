@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'add mainetnance')
@section('content')

    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">أضف صيانة جديدة</h3>
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
                        <div class="col-md-5">
                            <label> اسم المشروع </label>
                            <div class="input-group input-group-solid input-group-lg  border border-primary">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                    </span>
                                </div>
                                <input type="text"
                                    class="form-control  {{ $errors ?? ('')->has('full_name') ? 'is-danger' : ' ' }}"
                                    name="full_name" value="{{ old('full_name') }}" placeholder="اسم المشروع " required />
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label> اسم المعدة</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="name" placeholder="اسم المعدة" value="{{ old('mobile') }}" required />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>تاريخ الصيانة</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <input type="date"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="date_of_maintenance" value="{{ old('mobile') }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label> رمز البرج </label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="name" placeholder=" رمز البرج" value="{{ old('mobile') }}" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5" style="margin-top:-15px">
                            <div class="form-group ">
                                <label class="col-form-label col-4 text-lg-right text-left" style="margin-right: -35px"> موظف الصيانة</label>
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <select name="staffs[]" class="Department" id="department" multiple
                                        style="width: 100%">
                                        <option value="1">خالد </option>
                                        <option value="2">طاهر</option>
                                        <option value="3">محمد</option>
                                        <option value="4">زيد</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label> العدد </label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="number"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="name" placeholder=" عدد المعدات " value="{{ old('mobile') }}" required />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label> الملاحظات</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="note" placeholder="الملاحظات" value="{{ old('mobile') }}" required />
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
