@extends('admin.Layouts.Layout')

@section('content')
    <section class="content-header">
        <h1>
            <span style="text-transform: capitalize"> Medium</span> Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Medium</a></li>
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
                            Creation Medium
                        </h2>

                        <a href="{{ url('/admin/media') }}" title="Back">
                            <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <a href="{{ url('/admin/media/' . $medium->id . '/edit') }}" title="Edit Medium">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Edit
                            </button>
                        </a>

                    </div>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/media', $medium->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Medium',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $medium->id }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ $video->type }}</td>
                            </tr>
                            <tr>
                                <th> Titre</th>
                                <td> {{ $medium->titre }} </td>
                            </tr>
                            <tr>
                                <th> Description</th>
                                <td> {{ $medium->description }} </td>
                            </tr>
                            <tr>
                                <th> Discr</th>
                                <td> {{ $medium->discr }} </td>
                            </tr>
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

