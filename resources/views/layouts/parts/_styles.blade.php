<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{asset('assets/plugins/global/plugins.bundle.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/style.bundle.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{asset('assets/css/themes/layout/header/base/light.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/themes/layout/header/menu/light.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/themes/layout/brand/dark.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/themes/layout/aside/dark.'.($dir=='rtl'?'rtl.':'').'css?v=7.0.3')}}" rel="stylesheet" type="text/css" />
<!--end::Layout Themes-->
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />


@if($lang=='ar')
    <link rel="stylesheet" href="{{asset('assets/fonts/J-flat-font/font.css')}}">
    <style>
        * {
            font-family: "JF Flat Regular";
        }
    </style>
@endif

<style>
    .aside-minimize .brand .brand-logo span.logo{
        display: none
    }
    *  {
    font-size : large  }

</style>




@yield('css')
