<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.0.3')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.3')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js?v=7.0.3')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.3')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/widgets.js?v=7.0.3')}}"></script>
<!--end::Page Scripts-->


<script type="text/javascript">

$(document).on('click', '#logoutBtn', function() {
    $.ajax({
                url: '/logout',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                method: 'POST',


                success: function(data) {
                    console.log("Response: " + data.data);



                }
            });



            });
    	//----------------------------------------------------------//
	toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.timeOut = 10000;
    toastr.options.extendedTimeOut = 3000;
	//----------------------------------------------------------//
	function _confirm(title, message, type="warning", confirmText="Yes", cancelText="Cancel", confirmCallback=function(){}, cancelCallback=function(){}){
		 Swal.fire({
	        title: title,
	        text: message,
	        icon: type,
	        showCancelButton: true,
	        confirmButtonText: confirmText,
	        cancelButtonText: cancelText,
	        reverseButtons: true
	    }).then(function(result) {
	        if (result.value) {
	           confirmCallback();
	        } else if (result.dismiss === "cancel") {
	            cancelCallback();
	        }
	    });
	}
	//----------------------------------------------------------//
</script>

@yield('js')
