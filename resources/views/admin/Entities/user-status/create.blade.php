@extends('admin.Layouts.Layout')

@section('content')
    <section class="content-header">
        <h1>
            <span style="text-transform: capitalize"> UserStatus</span> Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UserStatus</a></li>
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
                            Creation UserStatus
                        </h2>
                        <a href="{{ url('/admin/status') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/admin/status', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('admin.Entities.user-status.form')

                    {!! Form::close() !!}
                 
                    <div class="box-header with-border">
                        <h2 class="box-title" style="text-transform: uppercase">
                            Indications *
                        </h2>
                    </div>
                    <div>
                        <ul style="display: inline-block">
                            <h2>Acteurs</h2>
                            <li>Journaliste Sportif</li>
                            <li>Medecin Sportif</li>
                            <li>Supporteur</li>
                            <li>Arbitres Sportif</li>
                            <li>Coach/Manager</li>
                            <li>Directeur Sportif</li>
                            <li>Entreprise Sportif</li>
                        </ul>
                        <ul style="display: inline-block">
                            <h2>Centre</h2>
                            <li>Centre de formation</li>
                            <li>Clubs</li>
                            <li>Association sportive</li>
                            <li>Fondation Sportive</li>
                        </ul>
                        <ul style="display: inline-block">
                            <h2>Sportif</h2>
                            <li>Amateurs</li>
                            <li>professionels</li>
                            <li>Veterents</li>
                        </ul>
                        <ul style="display: inline-block">
                            <h2>Agent</h2>
                            <li>Agent Sportif</li>
                            <li>Agence Sportif</li>
                        </ul>
                        <ul style="display: inline-block">
                            <h2>Organisation</h2>
                            <li>Organisme Sportif</li>
                        </ul>
                        <ul style="display: inline-block">
                            <h2>Federation</h2>
                            <li>Federation Sportif</li>
                        </ul>
                        <ul style="display: inline-block">
                            <h2>Intitut</h2>
                            <li>Institution Sportif</li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <!--/.col (right) -->
            
        </div>
        <!-- /.row -->
    </section>
    
@endsection

