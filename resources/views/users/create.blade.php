@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Whoops!</strong> Verifique los campos.<br><br>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge alert-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{ Form::open(['route' => 'users.store','method'=>'POST']) }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong> <label for="name">Nombre:</label></strong>
                                        {{ Form::text('name', null, ['placeholder' => 'Nombre','class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {{ Form::text('email', null, ['placeholder' => 'Email','class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contraseña:</strong>
                                        {{ Form::password('password', ['placeholder' => 'Contraseña','class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirmar Contraseña:</strong>
                                        {{ Form::password('confirm-password', ['placeholder' => 'Confirmar Contraseña','class' => 'form-control']) }}
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Roles:</strong>
                                        {{ Form::select('roles[]', $roles,[], ['class' => 'form-control']) }}
                                    </div>
                                </div> 
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
