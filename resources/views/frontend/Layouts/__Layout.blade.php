@extends('frontend.Layouts.secondLayout')



@section('sideBarFirst')
    
    @include('frontend.Layouts.sideBars.sideBar_lecture_video')

@stop

@section('contentContainer')
    <!-- Content Wrapper. Contains page content -->
    <div id="__main-content" class="" >
        <a href="#menu-toggle" class="onContent" id="menu-toggl">Menu <i class="fa fa-caret-right" aria-hidden="true"></i></a>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

@stop


<!-- ./wrapper -->

