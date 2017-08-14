@extends('admin.Layouts.Layout')

@section('content')
    <section class="content-header">
        <h1>
            <span style="text-transform: capitalize"> Photo</span> Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Photo</a></li>
            <li class="active">Index</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 addPromo">
                <!-- general form elements -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h2 class="box-title" style="text-transform: uppercase">
                            Index Photo
                        </h2>
                        <a href="{{ url('/admin/photo/create') }}" class="btn btn-success btn-sm" title="Add New Photo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/photo', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    
                    
                    <div class="table-responsive" style="padding: 2%">
    
                        <ul class="products-list product-list-in-box">
                            @foreach($photo as $item)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{$item->url. '?w=100&h=75&fit=crop'}}" alt="Product Image" style="width: auto;height: auto;margin-right: 1%">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title"> {{ $item->titre ? $item->titre : $item->description }}</a>
                                        <span class="label pull-right"><a href="{{ url('/admin/photo/' . $item->id) }}" title="View Medium">
                                            <button class="btn btn-info btn-xs"><i class="fa fa-eye"
                                                                                   aria-hidden="true"></i> View
                                            </button>
                                        </a>
                                        <a href="{{ url('/admin/photo/' . $item->id . '/edit') }}" title="Edit Medium">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                                      aria-hidden="true"></i> Edit
                                            </button>
                                        </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/photo', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete Medium',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                            {!! Form::close() !!}</span>
                                    <span class="product-description">
                         {{ $item->description }}
                        </span>
                                </div>
                            </li>
                            
                            @endforeach
                        </ul>
                        
                        <div class="pagination-wrapper"> {!! $photo->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection


