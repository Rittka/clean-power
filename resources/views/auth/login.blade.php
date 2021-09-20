@extends('layouts.master_logIn')
@section('title', trans('main.log_in'))
@section('content')
			<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<div>
								<img src="img\logo.png" class="max-h-105px" width="200" alt="error" />
							</div>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>{{ trans('main.sign_in') }}</h3>
								<div class="text-muted font-weight-bold">{{ trans('main.Enter_your_details_to_login_to_your_account:') }} </div>
							</div>
                            <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}" >
                                @csrf
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid border border-primary py-4 px-8" type="email" placeholder="{{trans('main.user_name')}}" name="email" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid border border-primary py-4 px-8" type="password" placeholder="{{trans('main.password')}}" name="password" />
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<label class="checkbox  m-0 text-muted">
									<input type="checkbox" name="remember_token" />{{ trans('main.remember_me') }}
									<span></span></label>
									<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">{{ trans('main.Forgotten_password?') }}</a>
								</div>
								<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4" >{{ trans('main.log_in') }}</button>
							</form>
							{{-- <div class="mt-10">
								<span class="opacity-70 mr-4">{{ trans('main.Do_not_have_an_account_yet?') }}</span>
								<a  id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">{{ trans('main.Sign_Up!') }}</a>
							</div> --}}
						</div>
						<!--end::Login Sign in form-->
					</div>
				</div>
			</div> -->
			<!--end::Login-->
		</div>
		<!--end::Main-->

@section('js')
<script>
    $(function(){
        _handleSignInForm();
    });
    function _handleSignInForm() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'اسم المسخدم مطلوب'
                            },
                            emailAddress: {
                                message: 'ادخل بريد الكتروني صحيح's
                            }
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'كلمة المرور مطلوبة'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    $('#kt_login_signin_form').submit();

				} else {
					swal.fire({
		                text: "عذراً هناك بعض الأخطاء، يرجى المحاولة مجدداً",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "حسناً!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

    }
</script>
@endsection
