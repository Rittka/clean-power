@extends('layouts.master')



@section('title', 'edit project')
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.' . ($dir == 'rtl' ? 'rtl.' : '') . 'css?v=7.0.3') }}" rel="stylesheet"
        type="text/css" />
        <style>
            .select2-container--default .select2-selection--single{line-height:32px; height:40px;background-color:#F3F6F9;border:1px solid #3699FF;border-radius:4px}
            .table-wrapper {
                width: 200%;
                margin: 30px auto;
                background: #fff;
                padding: 20px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }
    
            .table-title {
                padding-bottom: 10px;
                margin: 0 0 10px;
            }
    
            .table-title h2 {
                margin: 6px 0 0;
                font-size: 22px;
            }
    
            .table-title .add-new {
                background-color: #3699FF;
                border-color: #3699FF;
                float: right;
                height: 30px;
                font-weight: bold;
                font-size: 17px;
                text-shadow: none;
                min-width: 100px;
                border-radius: 50px;
                line-height: 13px;
                position: relative;
                left: -160px;
            }
    
            .table-title .add-new i {
                margin-right: 4px;
            }
    
            table.table {
                table-layout: fixed;
            }
    
            table.table tr th,
            table.table tr td {
                border-color: #837c7c;
            }
    
            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }
    
            table.table th:last-child {
                width: 100px;
            }
    
            table.table td a {
                cursor: pointer;
                display: inline-block;
                margin: 0 5px;
                min-width: 24px;
            }
    
            table.table td a.add {
                color: #27C46B;
            }
    
            table.table td a.edit {
                color: #FFC107;
            }
    
            table.table td a.delete {
                color: #E34724;
            }
    
            table.table td i {
                font-size: 19px;
            }
    
            table.table td a.add i {
                font-size: 24px;
                margin-right: -1px;
                position: relative;
                top: 3px;
            }
    
            table.table .form-control {
                height: 40px;
                line-height: 32px;
                box-shadow: none;
                border-radius: 2px;
            }
    
            table.table .form-control.error {
                border-color: #f50000;
            }
    
            table.table td .add {
                display: none;
            }
    
        </style>
@endsection
@section('content')
    <div class="container">
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin::Wizard-->
                <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav">
                        <div class="wizard-steps">
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">1</div>
                                    <div class="wizard-label">

                                        <div class="wizard-desc">بيانات الطلبية</div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">2</div>
                                    <div class="wizard-label">

                                        <div class="wizard-desc">تفاصيل الابراج </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">3</div>
                                    <div class="wizard-label">
                                        <div class="wizard-desc">تفاصيل الكفالة</div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">4</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">{{ trans('main.submission') }}</div>
                                        <div class="wizard-desc">{{ trans('main.review_submit') }}</div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!--end::Wizard Nav-->
                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-10">
                                    <!--begin::Wizard Form-->
                                    <form class="form" id="kt_form" method="POST" action="/student">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <!--begin::Wizard Step 1-->
                                                <div class="my-5 step" data-wizard-type="step-content"
                                                    data-wizard-state="current">
                                                    <h5 class="text-dark font-weight-bold mb-10">تعديل بيانات الطلبية</h5>
                                                    <!--begin::Group :: personal_picture-->
                                                    {{-- <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">{{ trans('main.personal_picture') }}</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline" id="kt_user_add_avatar">
                                                                <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_6.jpg)"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <!--end::Group-->
                                                    <!--begin::Group :: first_name-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">رمز المشروع</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            
                                                               
                                                            <select style="width:100%; " class="Department"  id="project_code">
                                                                
                                                                <option value="AL">طاهر</option>
                                                                <option value="fs">علي</option>
                                                                <option value="z">يوسف</option>
                                                                <option value="WY">سامر</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: last_name-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">اسم الزبون</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select style="width:100%; " class="Department"  id="client_name">
                                                                
                                                                <option value="AL">طاهر</option>
                                                                <option value="fs">علي</option>
                                                                <option value="z">يوسف</option>
                                                                <option value="WY">سامر</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: gender , birth-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">النوع</label>
                                                        <div class="col-lg-4 col-xl-4 col-form-label"
                                                            style="margin-top:-7px ">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <select style="width:100%; "
                                                                    class="form-control form-control-solid form-control-lg">
                                                                    <option>منزلية</option>
                                                                    <option>صناعية</option>
                                                                    <option>تجارية</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label class="col-xl-2 col-lg-2 col-form-label">عدد الابراج</label>
                                                        <div class="col-lg-3 col-xl-3">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">

                                                                <input id="input4" type="number"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="tower_num" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: mobile-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">المنطقة</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select style="width:100%; " class="Department"  id="region_name">
                                                                
                                                                <option value="AL">طاهر</option>
                                                                <option value="fs">علي</option>
                                                                <option value="z">يوسف</option>
                                                                <option value="WY">سامر</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: address , rent-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">تاريخ
                                                            الطلبية</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i
                                                                            class="fas fa-calendar-alt text-primary icon-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <input id="input6" type="text"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="date" value="" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <select style="width:100%; " class="Department"
                                                    id="staff_project">

                                                    <option value="AL">طاهر</option>
                                                    <option value="fs">علي</option>
                                                    <option value="z">يوسف</option>
                                                    <option value="WY">سامر</option>
                                                </select>
                                                      
                                                    <!--end::Group-->
                                                </div>
                                                <!--end::Wizard Step 1-->


                                                <!--begin::Wizard Step 2-->
                                                <div class="my-5 step" id="details_tower" data-wizard-type="step-content">
                                                    <h5 class="text-dark font-weight-bold mb-10 mt-5"> تعديل بيانات الابراج</h5>
                                                    <div class="d-flex flex-row-reverse bd-highlight">
                                                        <div class="d-flex flex-row bd-highlight mb-3">
                                                            <div class="table-wrapper">
                                                                <div class="table-title">
                                                                    <div class="row">
                                                                        <div class="col-sm-8"><h2><b>تفاصيل</b> البرج </h2></div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i>إضافة </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>رمز البرج</th>
                                                                            <th>اسم المعدة</th>
                                                                            <th>العدد</th>
                                                                                                  <th>الشارع</th>
                                                    
                                                                            <th>خيارات</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>002 </td>
                                                                            <td>لوح</td>
                                                                                                  <td>4</td>
                                                    
                                                                            <td>كلاس</td>
                                                                            <td>
                                                                                <a class="add" title="إضافة" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                                <a class="edit" title="تعديل" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                                <a class="delete" title="حذف" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>003 </td>
                                                                            <td>بطارية </td>
                                                                                                  <td>5 </td>
                                                    
                                                                            <td>اسرة السعيدة</td>
                                                                            <td>
                                                                                <a class="add" title="إضافة" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                                <a class="edit" title="تعديل" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                                <a class="delete" title="حذف" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>004 </td>
                                                                                                  <td>سلك </td>
                                                    
                                                                            <td>2 </td>
                                                                            <td>الاكسبريس</td>
                                                                            <td>
                                                                                <a class="add" title="إضافة" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                                <a class="edit" title="تعديل" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                                <a class="delete" title="حذف" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                            </td>
                                                                        </tr>      
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>     
                                                </div>
                                                   
                                                </div>
                                                <!--end::Wizard Step 2-->


                                                <!--begin::Wizard Step 3-->
                                                <div class="my-5 step" data-wizard-type="step-content">
                                                    <h5 class="mb-10 font-weight-bold text-dark">تعديل تفاصيل الكفالة وإجمالي
                                                        التكلفة</h5>
                                                    <!--begin::Group :: level's student-->
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-xl-3 col-lg-3">التاريخ
                                                            المتوقع</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-calendar text-primary icon-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="payment" type="text" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: payment-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">تاريخ
                                                            التنفيذ</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i
                                                                            class="fas fa-calendar text-primary icon-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="payment" type="text" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: visit-->
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-xl-3 col-lg-3"
                                                            for="visited_from">تاريخ انتهاء الكفالة</label>
                                                        <div class="col-xl-3 col-lg-3">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i
                                                                            class="fas fa-calendar text-primary icon-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="payment" type="text" value="" />
                                                            </div>
                                                        </div>
                                                        <label class="col-xl-3 col-lg-3 col-form-label">مدة دورة
                                                            الكشف</label>
                                                        <div class="col-lg-3 col-xl-3">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa- text-primary icon-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="payment" type="number" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-xl-3 col-lg-3"> التكلفة
                                                            الإجمالية</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i
                                                                            class="fas fa-dollar-sign text-primary icon-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="payment" type="number" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                                <!--end::Wizard Step 3-->


                                                <!--begin::Wizard Step 4-->
                                                {{-- <div class="my-5 step" data-wizard-type="step-content">
                                                    <h5 class="mb-10 font-weight-bold text-dark">{{ trans('main.review_submit_information') }}</h5>
                                                    <!--begin::Item-->
                                                    <div class="border-bottom mb-5 pb-5">
                                                        <div class="font-weight-bolder mb-3">
                                                            {{ trans('main.student_personal_info') }}
                                                        </div>
                                                        <div class="line-height-xl">
                                                            <label id="first-name-label">{{ trans('main.first_name') }}</label>
                                                            <br />
                                                            <label id="last-name-label">{{ trans('main.last_name') }}</label>
                                                            <br />
                                                            <label id="gender-label">{{ trans('main.gender') }}</label>
                                                            <br />
                                                            <label id="birth-label">{{ trans('main.birth') }}</label>
                                                            <br />
                                                            <label id="mobile-label">{{ trans('main.mobile') }}</label>
                                                            <br />
                                                            <label id="address-label">{{ trans('main.address') }}</label>
                                                        </div>
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="border-bottom mb-5 pb-5">
                                                        <div class="font-weight-bolder mb-3">
                                                            {{ trans('main.parents_personal_info') }}
                                                        </div>
                                                        <div class="line-height-xl">
                                                            <label id="father-name-label">{{ trans('main.father_name') }}</label>   - <label id="mother-name-label">{{ trans('main.mother_name') }}</label>
                                                            <br />
                                                            <label id="father-birth-label">{{ trans('main.father_birth') }}</label>   - <label id="mother-birth-label">{{ trans('main.mother_birth') }}</label>
                                                            <br />
                                                            <label id="father-education-level-label">{{ trans('main.father_education_level') }}</label>   - <label id="mother-education-level-label">{{ trans('main.mother_education_level') }}</label>
                                                            <br />
                                                            <label id="father-job-label">{{ trans('main.father_job') }}</label>    - <label id="mother-job-label">{{ trans('main.mother_job') }}</label>
                                                            <br />
                                                            <label id="father-salary-label">{{ trans('main.father_salary') }}</label>   - <label id="mother-salary-label">{{ trans('main.mother_salary') }}</label>
                                                        </div>
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div>
                                                        <div class="font-weight-bolder">
                                                            {{ trans('main.registration_detail') }}
                                                        </div>
                                                        <div class="line-height-xl">
                                                            <label id="level-label">{{ trans('main.level') }}</label>
                                                            <br />
                                                            <label id="payment-label">{{ trans('main.payment') }}</label>
                                                            <br />
                                                            <label id="visited-from-label">{{ trans('main.visited_from') }}</label>
                                                            <br />
                                                            <label id="visited-date-label">{{ trans('main.visited_date') }}</label>
                                                        </div>
                                                    </div>
                                                    <!--end::Item-->
                                                </div> --}}
                                                <!--end::Wizard Step 4-->


                                                <!--begin::Wizard Actions-->
                                                <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                    <div class="mr-2">
                                                        <button id="prev-step"
                                                            class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                            data-wizard-type="action-prev">السابق</button>
                                                    </div>
                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-success font-weight-bolder px-9 py-4"
                                                            data-wizard-type="action-submit">حفظ التغييرات</button>
                                                        <button id="next-step"
                                                            class="btn btn-primary font-weight-bolder px-9 py-4"
                                                            data-wizard-type="action-next">التالي</button>
                                                    </div>
                                                </div>
                                                <!--end::Wizard Actions-->
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Wizard Form-->
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Wizard-->
            </div>
        </div>
        <!--end::Card-->
    </div>

    @include('errors')
@endsection
@section('js')
    <script>
        "use strict";

        // Class Definition
        var KTAddUser = function() {
            // Private Variables
            var _wizardEl;
            var _formEl;
            var _wizard;
            var _avatar;
            var _validations = [];

            // Private Functions
            var _initWizard = function() {
                // Initialize form wizard
                _wizard = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: true // allow step clicking
                });

                // Validation before going to next page
                _wizard.on('beforeNext', function(wizard) {
                    _validations[wizard.getStep() - 1].validate().then(function(status) {
                        if (status == 'Valid') {
                            _wizard.goNext();
                            KTUtil.scrollTop();
                            // if(_wizard.islaststep())
                            // {
                            //      //step 4
                            //     var form_data = $('#kt_form').serializeArray();
                            //         for(var i=0; i<form_data.length; i++){
                            //             var name = form_data[i]['name'];
                            //             var value = form_data[i]['value'];

                            //             document.write(('#'+name+'-label').text(value));
                            //         }

                            // }
                        } else {
                            Swal.fire({
                                text: "عذراً ، هناك حقول فارغة ، يرجى إدخال كافة البيانات ",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسناً!!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold  btn-primary"
                                }
                            }).then(function() {
                                KTUtil.scrollTop();
                            });
                        }
                    });

                    _wizard.stop(); // Don't go to the next step
                });

                // Change Event
                _wizard.on('change', function(wizard) {
                    KTUtil.scrollTop();
                });
            }

            var _initValidations = function() {
                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

                // Validation Rules For Step 1
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            firstname: {
                                validators: {
                                    notEmpty: {
                                        message: 'First_Name_is_required'
                                    }
                                }
                            },
                            lastname: {
                                validators: {
                                    notEmpty: {
                                        message: 'Last_Name_is_required'
                                    }
                                }
                            },
                            birth: {
                                validators: {
                                    notEmpty: {
                                        message: 'birth_isrequired'
                                    }
                                }
                            },
                            mobile: {
                                validators: {
                                    notEmpty: {
                                        message: 'mobile_is_required'
                                    },
                                    mobile: {
                                        country: 'Syria',
                                        message: 'Enter valid Syrian phone number(e.g: 0992765431).'
                                    }
                                }
                            },
                            address: {
                                validators: {
                                    notEmpty: {
                                        message: 'address_is_required'
                                    }
                                }
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            // Step 2
                            father_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'father name is required'
                                    }
                                }
                            },
                            father_birth: {
                                validators: {
                                    notEmpty: {
                                        message: 'birth is required'
                                    }
                                }
                            },
                            father_job: {
                                validators: {
                                    notEmpty: {
                                        message: 'job is required'
                                    }
                                }
                            },
                            father_salary: {
                                validators: {
                                    notEmpty: {
                                        message: 'salary is required'
                                    }
                                }
                            },
                            mother_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'mother name is required'
                                    }
                                }
                            },
                            mother_birth: {
                                validators: {
                                    notEmpty: {
                                        message: 'birth is required'
                                    }
                                }
                            },
                            mother_job: {
                                validators: {
                                    notEmpty: {
                                        message: 'job is required'
                                    }
                                }
                            },
                            mother_salary: {
                                validators: {
                                    notEmpty: {
                                        message: 'salary is required'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            //step 3
                            payment: {
                                validators: {
                                    notEmpty: {
                                        message: 'payment is required'
                                    }
                                }
                            },
                            visited_date: {
                                validators: {
                                    notEmpty: {
                                        message: 'visit date is required'
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));
            }



            // var _initAvatar = function() {
            //     _avatar = new KTImageInput('kt_user_add_avatar');
            // }

            return {
                // public functions
                init: function() {
                    _wizardEl = KTUtil.getById('kt_wizard');
                    _formEl = KTUtil.getById('kt_form');

                    _initWizard();
                    _initValidations();
                    // _initAvatar();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTAddUser.init();
        });
       
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
            '<td>  <select  class="form-control " id="kt_select2_1" name="param"> <option value="AK">Alaska</option> <option value="HI">Hawaii</option><option value="CA">California</option></select></td>' +
              '<td>  <select class="form-control " id="kt_select2_1" name="param"> <option value="AK">لوح</option> <option value="HI">برج</option><option value="CA">بطارية</option></select></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
      
			'<td>' + actions + '</td>' +
        '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function() {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function() {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function() {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function() {
                $(this).parents("tr").find("td:not(:last-child)").each(function() {
                    $(this).html('<input type="text" class="form-control" value="' + $(this)
                    .text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function() {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
    </script>
   
 
        <script>
               $(function() {
            $('#project_code').select2();
         
        });
        $(function() {
            $('#client_name').select2();
         
        });
        $(function() {
            $('#region_name').select2();
         
        });
        $(function() {
            $('#staff_project').select2();
         
        });
         
                   </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
