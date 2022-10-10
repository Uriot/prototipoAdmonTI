@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingresar Paciente Nuevo</h3>
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

                            {{ Form::open(['route' => 'patients.store','method'=>'POST']) }}
                                <di class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nombres</label>   
                                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos</label>   
                                            {{ Form::text('lastName', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono</label>   
                                            {{ Form::text('cellphone', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Dirección</label>   
                                            {{ Form::text('address', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">DPI</label>   
                                            {{ Form::text('dpi', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Edad</label>   
                                            {{ Form::number('age', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-6 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Nacimiento</label>  
                                            {{ Form::date('fechaNacimiento', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6  col-md-12">
                                        <div class="form-group">
                                           </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-block btn-primary">GUARDAR PACIENTE</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

