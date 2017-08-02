@extends('layouts.admin.Layout')

@section('content')
    <section class="content-header">
        <h1>
            <span style="text-transform: capitalize"> Photo</span> Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Photo</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 addPromo">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title" style="text-transform: uppercase">
                            Creation Photo
                        </h2>

                         <a href="{{ url('/admin/photo') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                         <a href="{{ url('/admin/photo/' . $photo->id . '/edit') }}" title="Edit Photo"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    </div>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/photo', $photo->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Photo',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $photo->id }}</td>
                                    </tr>
                                    <tr><th> Url </th><td> {{ $photo->url }} </td></tr><tr><th> Media Id </th><td> {{ $photo->media_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

