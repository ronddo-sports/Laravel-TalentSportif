@extends('frontend.Layouts.secondLayout')



@section('sideBarFirst')
    
    @include('frontend.Layouts.sideBars.sideBar_lecture_video')

@stop

@section('contentContainer')
    <!-- Content Wrapper. Contains page content -->
    <div id="__main-content" class="" >
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

@stop


<!-- ./wrapper -->

