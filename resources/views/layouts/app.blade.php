<!DOCTYPE html>
<html lang="zh-Hant-TW">
@include('layouts.head')
<body class="footer-fixed @yield('bodyClass')">
<div class="wrapper bg-violet-50">
    @if(!isset($login_page) && !isset($register_page))
        @include('layouts.header')
        @include('layouts.sidebar')
    @endif
    @yield('content')
    @yield('modal')
    @include('layouts.footer')
    <div class="sidebar-overlay"></div>
</div>
</body>
@yield('script')
@include('layouts.sweetAlert')
</html>
