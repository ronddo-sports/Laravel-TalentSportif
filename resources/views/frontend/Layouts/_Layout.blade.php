@extends('frontend.Layouts.secondLayout')

{{-- Premier side bar First --}}
    


    {{--Le contenu principale --}}
    @section('contentContainer')
    
        <!-- Content Wrapper. Contains page content -->
            <div id="main-content" class="container-fluid" style="width: 94%;margin: 0 3%;">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
    @stop

    
    
    <!-- ./wrapper -->


@section('customScripts')
   <script>
       $(document).ready(function () {
           $("#wrapper").toggleClass("toggled");
       });
   </script>
    @stop

