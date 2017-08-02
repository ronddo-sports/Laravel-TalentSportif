<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('head')
    
    @yield('styles')

</head>
<body class="hold-transition skin-blue sidebar-mini">

@yield('body')

@yield('scripts')
</body>
</html>
