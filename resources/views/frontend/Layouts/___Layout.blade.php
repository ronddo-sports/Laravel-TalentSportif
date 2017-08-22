@extends('frontend.Layouts.secondLayout')



@section('sideBarFirst')
    
    @include('frontend.Layouts.sideBars._sideBar')
    
    @stop
    
   @section('contentContainer')
       <!-- Content Wrapper. Contains page content -->
       <div id="main-content" class="container-fluid" style="">
           <a href="#menu-toggle" class="onContent" id="menu-toggl">Menu <i class="fa fa-caret-right" aria-hidden="true"></i></a>
           @yield('content')
       </div>
       <!-- /.content-wrapper -->

   @stop

    @section('sideBarSecond')
    
        @include('frontend.Layouts.sideBars.sideBar')
        
        @stop
    
    
    <!-- ./wrapper -->




