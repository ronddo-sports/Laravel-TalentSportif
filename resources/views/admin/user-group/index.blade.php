@extends('layouts.admin.Layout')

@section('content')
    <section class="content-header">
        <h1>
            <span style="text-transform: capitalize"> UserGroup</span> Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UserGroup</a></li>
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
                            Index UserGroup
                        </h2>
                       <a href="{{ url('/admin/user-group/create') }}" class="btn btn-success btn-sm" title="Add New UserGroup">
                                                   <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                               </a>
                    </div>


                        {!! Form::open(['method' => 'GET', 'url' => '/admin/user-group', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Type</th><th>Institution</th><th>User Institution Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usergroup as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->type }}</td><td>{{ $item->institution }}</td><td>{{ $item->user_institution_id }}</td>
                                        <td>
                                            <a href="{{ url('/admin/user-group/' . $item->id) }}" title="View UserGroup"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/user-group/' . $item->id . '/edit') }}" title="Edit UserGroup"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/user-group', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete UserGroup',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $usergroup->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection


