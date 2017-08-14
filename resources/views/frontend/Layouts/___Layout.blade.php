@extends('frontend.Layouts.secondLayout')



@section('sideBarFirst')
    
    @include('frontend.Layouts.sideBars._sideBar')
    
    @stop
    
   @section('contentContainer')
       <!-- Content Wrapper. Contains page content -->
       <div id="main-content" class="container-fluid" style="">
           
           @yield('content')
       </div>
       <!-- /.content-wrapper -->

   @stop

    @section('sideBarSecond')
    
        @include('frontend.Layouts.sideBars.sideBar')
        
        @stop
    
    
    <!-- ./wrapper -->




