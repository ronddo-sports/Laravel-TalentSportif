<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('head')
    
    @yield('styles')
    
    @yield('customStyles')

</head>
<body class="hold-transition skin-blue sidebar-mini">

@yield('body')

@yield('scripts')

@yield('customScripts')
</body>
</html>
