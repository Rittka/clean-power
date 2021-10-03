@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> الكشف</li>
<li class="breadcrumb-item active" aria-current="page">كشف جديد </li>

@endsection
@section('title', 'إضافة كشف')
@section('content')
<style>
            .select2-container--default .select2-selection--single{line-height:32px; height:40px;background-color:#F3F6F9;border:1px solid border-radius:4px}

    </style>
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">أضف كشف جديد</h3>
        </div>
        <form method="post" action="{{ url('section') }}">
            @csrf
            <!--begin::Card body-->
            <div class="card-body card-custom">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group :: level-->
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">موظف الكشف</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <select name="staffs[]" class="Department" id="department" multiple style="width: 100%">
                                        @foreach ($staffs as $staff)
                                            <option value="{{$staff->id}}">{{$staff->fname . " " . $staff->lname}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">رمز المشروع</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <select name="project_id" class="selecet2 " id="project_id" style="width: 100%">
                                        @foreach ($projects as $project)
                                            <option value="{{$project->id}}">{{$project->id}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">الملاحظات</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">


                                    <input type="text" name="note" class="form-control form-control-lg form-control-solid "  placeholder="  ادخل الملاحظات" />

                                </div>
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group :: year-->
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">التاريخ</label>
                            <div class="col-9 ">
                                <div class="input-group input-group-lg input-group-solid border border-primary">

                                    <input type="year" name="date_of_check" class="form-control form-control-lg form-control-solid "
                                        placeholder="تاريخ الكشف" />
                                </div>
                                <div class="separator my-10"></div>
                                <div class="card-footer pb-0">
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7">
                                            <div class="row">
                                                <div class="col-3"></div>
                                                <div class="col-9">
                                                    <button class="btn btn-primary" type="submit">حفظ</button>
                                                    <button class="btn btn-secondary" type="reset">إلغاء</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('#department').select2({
                placeholder: "اختر موظفي الكشف؟",
            });
        });
        $(function() {
            $('#project_id').select2({
                placeholder: "اختر  رمز المشروع ؟",
            });
        });
    </script>
@endsection
