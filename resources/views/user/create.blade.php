@extends('layouts.master')
@section('title','إنشاء حساب جديد')
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">إنشاء حساب جديد</h3>
    </div>
    <form  method="post" action="{{url('user')}}">
        @csrf
        <!--begin::Card body-->
        <div class="card-body card-custom">
            <!--begin::Row-->
            <div class="row">
                <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group :: level-->
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">البريد الالكتروني</label>
                            <div class="col-9 ">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Mail-at.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg form-control-solid "   />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">كلمة المرور</label>
                            <div class="col-9 ">
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Lock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <mask fill="white">
                                                    <use xlink:href="#path-1"/>
                                                </mask>
                                                <g/>
                                                <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg form-control-solid "   />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">السماحيات</label>
                            <div class="col-9">
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-medal text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}" name="role_id" >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end::Group-->
                        <div class="separator my-10"></div>
                        <div class="card-footer pb-0">    
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button class="btn btn-primary" type="submit">{{ trans('main.save') }}</button>
                                            <button class="btn btn-secondary" type="reset">{{ trans('main.cancel') }}</button>        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
@endsection