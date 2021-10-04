@extends('layouts.master')
@section('title', 'تعديل كشف')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> الكشف</li>
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ url('check') }}"> جميع الكشوفات</a></li>

<li class="breadcrumb-item active" aria-current="page">تعديل كشف</li>

@endsection
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">{{ $check->project->name }}</h3>
    </div>
    <form  method="post" action="/check/{{ $check->id }}">
        @csrf
        @method('PATCH')
        <!--begin::Card body-->
        <div class="card-body card-custom">
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group :: level-->
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">اسم المشروع</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <select name="project_id" class="selecet2 " id="project_id" style="width: 100%">
                                        @foreach ($projects as $project)
                                            <option value="{{$project->id}}" @if($check->project_id == $project->id) selected @endif>{{$project->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">الملاحظات</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">


                                    <input type="text" name="remarks" value="{{ $check->remarks }}" class="form-control form-control-lg form-control-solid "  placeholder="  ادخل الملاحظات" />

                                </div>
                            </div>
                        </div>
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
                        <!--end::Group-->
                        <!--begin::Group :: year-->
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">التاريخ</label>
                            <div class="col-9 ">
                                <div class="input-group input-group-lg input-group-solid border border-primary">

                                    <input type="date" value="{{ $check->date_of_check }}" name="date_of_check" class="form-control form-control-lg form-control-solid "
                                        placeholder="تاريخ الكشف" />
                                </div>

                            </div>
                        </div>

                        <div class="card-footer pb-0">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button class="btn btn-primary" type="submit">حفظ التغييرات</button>
                                            <button class="btn btn-secondary" type="reset">إلغاء</button>
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

@endsection
