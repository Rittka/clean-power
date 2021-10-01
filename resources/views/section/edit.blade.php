@extends('layouts.master')
@section('title', 'تعديل شعبة')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">{{ $section->level->name }}</h3>
    </div>
    <form  method="post" action="/section/{{ $section->id }}">
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
                            <label class="col-form-label col-3 text-lg-right text-left">رقم المشروع</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                <input type="number" name="number" class="form-control form-control-lg form-control-solid " value="{{$section->year}}"  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">المنطقة</label>
                            <div class="col-9">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                <input type="text" name="year" class="form-control form-control-lg form-control-solid " value="{{$section->year}}"  />
                                </div>
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group :: year-->
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">التاريخ</label>
                            <div class="col-9 ">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                <input type="year" name="year" class="form-control form-control-lg form-control-solid " value="{{$section->year}}"  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">الموظف</label>
                            <div class="col-9 ">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                <input type="text" name="text" class="form-control form-control-lg form-control-solid " value="{{$section->year}}"  />
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
