@extends('layouts.admin.secondLayout')


@section('body')
    
    <div class="wrapper">
        
        @include('layouts.admin.header')
        
        @include('layouts.admin.sideBar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            
            
            @yield('content')
        
        
        
        </div>
        <!-- /.content-wrapper -->
        
       @include('layouts.admin.footer')
    
    </div>
    <!-- ./wrapper -->

@endsection