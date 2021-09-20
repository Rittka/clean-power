<!DOCTYPE html>
<html lang="{{$lang}}" direction="{{$dir}}" dir="{{$dir}}" style="direction: {{$dir}}">
	<head>
		@include('layouts.parts._meta')
		<title>{{trans('main.app_name')}} | @yield('title')</title>
		@include('layouts.parts._styles')
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

        @include('layouts.parts._header_mobile')

        <div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
                @include('layouts.parts._sidebar')

                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    @include('layouts.parts._header')

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        {{-- @include('layouts.parts._sub_header') --}}

                         {{-- <div class="d-flex flex-column-fluid"> --}}
                            @yield('content')
                        {{-- </div> --}}

                    </div>

                    @include('layouts.parts._footer')
                </div>
            </div>
        </div>
        
        @include('layouts.parts._scroll_top')

        @include('layouts.parts._scripts')
    </body>
</html>