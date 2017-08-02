@extends('layouts.frontend.secondLayout')


@section('body')
    
    @include('layouts.frontend.header')
    
    <div class="content">
    
    @include('layouts.frontend.sideBar')
    <!-- Content Wrapper. Contains page content -->
        <div id="main-content" class="container" style="">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.frontend.footer')
    
    </div>
    <!-- ./wrapper -->

@endsection



