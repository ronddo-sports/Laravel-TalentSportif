@extends('layouts.frontend.Layout')

@section('content')
<div>
    <div class="row">
    
    <ul id="status">
        @foreach(\App\Model\UserStatus::where('enabled','=',true)->get() as $key => $statu)
            <form method="post" id="form{{$key}}" action="{{route('ragister.step.1')}}">
                <input type="hidden" name="status" value="{{ $statu->id }}">
                <li><a href="{{url('register/'.$statu->id  )}}" {{--onclick="form{{$key}}.submit()"--}}> <img src="{{ $statu->logo_url }}?w=591&h=402&fit=crop"><span> {{$statu->nom}} </span></a></li>
            </form>
        @endforeach
    </ul>
    </div>
</div>
    <script>
       function stepOut(formi){
           document.getElementById('#' + formi).submit();
           //formi.submit();
       }
    </script>
@endsection
