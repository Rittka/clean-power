
@extends('layouts.master')
@section('title', 'Add NotWorking_equipment')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> اضافة معدة معطلة </li>
@endsection
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('assets/css/pages/wizard/wizard-4.' . ($dir == 'rtl' ? 'rtl.' : '') . 'css?v=7.0.3') }}"
        rel="stylesheet" type="text/css" />
    <style>
        
        .select2-container--default .select2-selection--single {
            line-height: 32px;
            height: 40px;
            background-color: #F3F6F9;
            border: 1px solid #3699FF;
            border-radius: 4px
        }

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
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">إضافة معدة معطلة </h3>
        </div>
    </div>
    <div class="card-body px-0">
        <div style="background-color: white">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                    <form class="form" method="post" action="/region">
                        @csrf
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">رمز المشروع</label>
                            <div class="col-lg-9 col-xl-6">
                                <select style="width:100%; " class="Department"
                                id="project_code">

                                <option value="AL">طاهر</option>
                                <option value="fs">علي</option>
                                <option value="z">يوسف</option>
                                <option value="WY">سامر</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">رمز البرج </label>
                            <div class="col-lg-9 col-xl-6">
                                <select style="width:100%; " class="Department"
                                id="tower_code">

                                <option value="AL">طاهر</option>
                                <option value="fs">علي</option>
                                <option value="z">يوسف</option>
                                <option value="WY">سامر</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-right"> اسم المعدة</label>
                            <div class="col-lg-9 col-xl-6">

                                <select style="width:100%; " class="Department"
                                id="equipment_num" >

                                <option value="AL">طاهر</option>
                                <option value="fs">علي</option>
                                <option value="z">يوسف</option>
                                <option value="WY">سامر</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-right">العدد</label>
                            <div class="col-lg-9 col-xl-6">

                                <div
                                class="input-group input-group-solid input-group-lg border border-primary">
                                <div class="input-group-prepend">
                                  
                                </div>
                                <input id="input2"
                                    class="form-control form-control-solid form-control-lg"
                                    name="value_total" type="year" value="" />
                            </div>
                            </div>
                        </div>
                        
                    
                       
                        <!--end::Group-->
                        <!--begin::Group :: gender , birth-->
                       
                      
                        
                        <div class="card-footer row">
                            <div class="col-5"></div>
                            <button type="submit"
                                class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ</button>
                            <button type="reset"
                                class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +

                    '<td>  <select class="form-control " id="kt_select2_1" name="param"> <option value="AK">006</option> <option value="HI">005</option><option value="CA">004</option></select></td>' +
                    '<td><select class="form-control " id="kt_select2_1" name="param"> <option value="AK">لوح</option> <option value="HI">برج</option><option value="CA">بطارية</option></select></td>' +
                    '<td><input type="text" class="form-control" name="phone" id="num"></td>' +

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
            $('#tower_code').select2();

        });
        $(function() {
            $('#project_code').select2();

        });
        $(function() {
            $('#equipment_num').select2({
               
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
