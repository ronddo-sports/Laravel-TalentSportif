@extends('layouts.admin.Layout')

@section('content')
    <section class="content-header">
        <h1>
            <span style="text-transform: capitalize"> Message</span> Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Message</a></li>
            <li class="active">Index</li>
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
                            Index Message
                        </h2>
                       <a href="{{ url('/admin/message/create') }}" class="btn btn-success btn-sm" title="Add New Message">
                                                   <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                               </a>
                    </div>


                        {!! Form::open(['method' => 'GET', 'url' => '/admin/message', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Content</th><th>Exped Id</th><th>Recep Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($message as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->content }}</td><td>{{ $item->exped_id }}</td><td>{{ $item->recep_id }}</td>
                                        <td>
                                            <a href="{{ url('/admin/message/' . $item->id) }}" title="View Message"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/message/' . $item->id . '/edit') }}" title="Edit Message"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/message', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Message',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $message->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection


