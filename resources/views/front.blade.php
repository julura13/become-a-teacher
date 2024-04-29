<!doctype html>
<html class="no-js" lang="en">
    @include('include.front.head')

    <body class="tw-h-screen tw-bg-gradient-to-r tw-from-jfg-darkerblue tw-to-jfg-blue">
        {{-- <body class="tw-h-screen tw-bg-jfg-blue"> --}}

    @include('include.front.header')

		@yield('content')

	@include('include.front.footer')

    </body>
</html>

