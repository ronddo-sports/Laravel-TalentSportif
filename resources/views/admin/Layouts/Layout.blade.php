@extends('admin.Layouts.secondLayout')


@section('body')
    
    <div class="wrapper">
        
        @include('admin.Layouts.header')
        
        @include('admin.Layouts.sideBar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
            
            
            @yield('content')
        
        
        
        </div>
        <!-- /.content-wrapper -->
        
       @include('admin.Layouts.footer')
    
    </div>
    <!-- ./wrapper -->

@endsection