@extends('layouts.master')


@section('name', 'إضافة طلبية ')
@section('title', 'Add project')
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('assets/css/pages/wizard/wizard-4.' . ($dir == 'rtl' ? 'rtl.' : '') . 'css?v=7.0.3') }}" rel="stylesheet"
        type="text/css" />
        <style>
  .select2-container--default .select2-selection--single {
            line-height: 32px;
            height: 40px;
            background-color: #F3F6F9;
            border: 1px solid #3699FF;
            border-radius: 4px
        }            .table-wrapper {
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
                            <div class="card-toolbar" style="position: absolute; left:500px;top:22px">
                                <a href="{{url('region/create')}}" class="btn btn-primary font-weight-bolder">
                                    <span class="svg-icon  svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>  </span>
                                إضافة منطقة
                                </a>
                            </div>
                            <div class="card-toolbar" style="position: absolute; left:700px;top:22px">
                                <a href="{{url('person/create')}}" class="btn btn-primary font-weight-bolder" >
                                    <span class="svg-icon  svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>  </span>
                                إضافة زبون
                                </a>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">3</div>
                                    <div class="wizard-label">
                                        <div class="wizard-desc">تفاصيل الكفالة</div>
                                    </div>
                                </div>
                            </div>

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
                                    <form class="form" id="kt_form" method="POST" action="/project">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <!--begin::Wizard Step 1-->
                                                <div class="my-5 step" data-wizard-type="step-content"
                                                    data-wizard-state="current">
                                                    <h5 class="text-dark font-weight-bold mb-10">بيانات الطلبية</h5>


                                                    <!--begin::Group :: first_name-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">رمز المشروع</label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <div
                                                            class="input-group input-group-solid input-group-lg border border-primary">

                                                            <input id="input4" type="text"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="name" value="" />
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: last_name-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">اسم الزبون</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select style="width:100%; " class="Department"  id="client_name" name="customer_id">
                                                                @foreach ($customers as $customer )
                                                                    <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>

                                                                @endforeach


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
                                                                <select style="width:100%; " name="gener"
                                                                    class="form-control form-control-solid form-control-lg">
                                                                    <option value="شارع" >إنارة شارع</option>
                                                                    <option value="منزل" >إنارة منزل</option>
                                                                    <option value="منشأة تجارية" >إنارة منشأة تجارية</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label class="col-xl-2 col-lg-2 col-form-label">عدد الابراج</label>
                                                        <div class="col-lg-3 col-xl-3">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">

                                                                <input id="input4" type="number"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="num_tower" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                    <!--begin::Group :: mobile-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">المنطقة</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select style="width:100%; " class="Department" name="region_id" id="region_name">
                                                                @foreach ($regions as $region)
                                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>

                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">موظفي
                                                            تركيب المشروع</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select style="width:100%; " name="staffs_ids[]" class="Department"
                                                            id="staff_project" multiple>
                                                            @foreach ($staffs as  $staff)
                                                                <option value="{{ $staff->id }}">{{ $staff->fname . " " . $staff->lname }}</option>
                                                            @endforeach


                                                        </select>

                                                        </div>

                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                                <!--end::Wizard Step 1-->




                                                <!--begin::Wizard Step 3-->
                                                <div class="my-5 step" data-wizard-type="step-content">
                                                    <h5 class="mb-10 font-weight-bold text-dark">تفاصيل الكفالة وإجمالي
                                                        التكلفة</h5>
                                                    <!--begin::Group :: level's student-->
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-xl-3 col-lg-3">التاريخ
                                                            المتوقع</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">
                                                                <
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="expected_delivery" type="date"  />
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

                                                                </div>
                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="actualdelivery" type="date" value="" />
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

                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="date_of_check" type="date" value="" />
                                                            </div>
                                                        </div>
                                                        <label class="col-xl-3 col-lg-3 col-form-label">مدة دورة
                                                            الكشف</label>
                                                        <div class="col-lg-3 col-xl-3">
                                                            <div
                                                                class="input-group input-group-solid input-group-lg border border-primary">

                                                                <input id="input18"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="period_of_warranty" type="date" value="" />
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
                                                                    name="cost" type="number" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
                                                <!--end::Wizard Step 3-->




                                                <!--begin::Wizard Actions-->
                                                <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                    <div class="mr-2">
                                                        <button id="prev-step"
                                                            class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                            data-wizard-type="action-prev">السابق</button>
                                                    </div>
                                                    <div>
                                                        <button type="submit" id="submit"
                                                            class="btn btn-success font-weight-bolder px-9 py-4"
                                                            data-wizard-type="action-submit">حفظ</button>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>

       });

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




    <script>
        $(function() {
            $('#project_code').select2()

        });
        $(function() {
            $('#client_name').select2();

        });
        $(function() {
            $('#region_name').select2();

        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection
