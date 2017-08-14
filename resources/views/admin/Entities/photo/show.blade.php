@extends('admin.Layouts.Layout')

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
                            Photo
                        </h2>

                         <a href="{{ url('/admin/photo') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                         <a href="{{ url('/admin/photo/' . $photo->id . '/edit') }}" title="Edit Photo"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
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

                    </div>
                    <div class="box-body">
                            <div class="user-block">
                                <img class="img-circle" src="/dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#">{{$photo->username}}</a></span>
                                <span class="description">Ajouter a {{$photo->created_at}}</span>
                            </div>
                        </div>
    
                
                    <img class="img-responsive pad" src="{{$photo->url}}" alt="Photo" style="height: 300px">
        
                    <h3 style="color: blue">{{$photo->titre}}</h3>
                    <h4>{{$photo->description}}</h4>
                    <br>
                </div>

                

                
            </div>
            <!--/.col (right) -->
        </div>
    
    
        
        <!-- /.box-header -->
       
        <!-- /.box-body -->
        <div class="box-footer box-comments">
            <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
            
                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.box-comment -->
            <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">
            
                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
            </div>
            <!-- /.box-comment -->
        </div>
        <!-- /.box-footer -->
        <div class="box-footer">
            <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <input class="form-control input-sm" placeholder="Press enter to post comment" type="text">
                </div>
            </form>
        </div>
        <!-- /.box-footer -->
    
        <!-- /.row -->
    </section>
@endsection

