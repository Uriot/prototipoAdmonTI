@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Paciente</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Ups!</strong> Verifique los campos.<br><br>
                            @foreach ($errors->all() as $error)
                            <span class="badge alert-danger m-1">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif -->


                        {{ Form::model($pacientes, ['method' => 'PUT','route' => ['pacientes.update', $pacientes->id]]) }}
                        <ul class="nav nav-tabs left-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Personal-tab" data-toggle="tab" href="#Personal" role="tab" aria-controls="Personal" aria-selected="true">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="General-tab" data-toggle="tab" href="#General" role="tab" aria-controls="General" aria-selected="false">General</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Personal" role="tabpanel" aria-labelledby="Personal-tab">
                                <div class="row gap-2">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Primer Nombre*</label>
                                            <!-- {{ Form::text('primer_Nombre', null, ['placeholder' => 'Nombre','class' => 'form-control']) }} -->
                                            <input type="text" name="name1" value="{{$pacientes->nombre_1}}" class="name1 form-control">
                                            @if ($errors->has('name1'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Segundo Nombre</label>
                                            <input type="text" name="name2" value="{{$pacientes->nombre_2}}" class="name2 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tercer Nombre</label>
                                            <input type="text" name="name3" value="{{$pacientes->nombre_3}}" class="name3 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Primer Apellido*</label>
                                            <input type="text" name="lastName1" value="{{$pacientes->apellido_1}}" class="lastName1 form-control">
                                            @if ($errors->has('lastName1'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Segundo Apellido</label>
                                            <input type="text" name="lastName2" value="{{$pacientes->apellido_2}}" class="lastName2 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellido de Casada</label>
                                            <input type="text" name="lastName3" value="{{$pacientes->apellido_de_casada}}" class="lastName3 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Género</label>
                                            <select class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'F'  ? 'selected' : ''}}>Femenino</option>
                                                <option value="M" {{$pacientes->genero == 'M'  ? 'selected' : ''}}>Masculino</option>
                                            </select>
                                            @if ($errors->has('genero'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estado Civil</label>
                                            <select class="form-control" value="{{$pacientes->estado_civil}}" name="estadoCivil">
                                                <option value="Soltero (a)" {{$pacientes->estado_civil == 'Soltero (a)'  ? 'selected' : ''}}>Soltero (a)</option>
                                                <option value="Casado (a)" {{$pacientes->estado_civil == 'Casado (a)'  ? 'selected' : ''}}>Casado (a)</option>
                                                <option value="Divorciado (a)" {{$pacientes->estado_civil == 'Divorciado (a)'  ? 'selected' : ''}}>Divorciado (a)</option>
                                                <option value="Viudo (a)" {{$pacientes->estado_civil == 'Viudo (a)'  ? 'selected' : ''}}>Viudo (a)</option>
                                            </select>
                                            @if ($errors->has('estadoCivil'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nacionalidad</label>
                                            <input type="text" name="nacionalidad" value="{{$pacientes->nacionalidad}}" class="nacionalidad form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Nacimiento*</label>
                                            <input type="date" name="fechaNacimiento" value="{{$pacientes->fecha_nacimiento}}" class=" form-control">
                                            <!-- {{ Form::date('fechaNacimiento', $pacientes->fecha_nacimiento, ['class' => 'form-control']) }} -->
                                            @if ($errors->has('fechaNacimiento'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Edad</label>
                                            <input type="number" name="edad" class="edad form-control" value="{{$pacientes->edad}}">
                                            @if ($errors->has('edad'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Acceso al IGSS</label>
                                            <select class="form-control" name="accesoIGSS" value="{{$pacientes->acceso_al_igss}}">
                                                <option value="1" {{$pacientes->acceso_al_igss == '1' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$pacientes->acceso_al_igss == '0' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('accesoIGSS'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">DPI/CUI</label>
                                            <input type="text" name="dpi" class="dpi form-control" value="{{$pacientes->dpi}}">
                                        </div>
                                    </div>
                                    <div class=" col-xs-12 col-sm-6 col-md-4 ">
                                        <div class=" form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Vencimiento DPI</label>
                                            <input type="date" name="dpiFechaVencimiento" value="{{$pacientes->fecha_vencimiento_dpi}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estado del DPI</label>
                                            <select class="form-control" name="estadoDPI" value="{{$pacientes->estado_dpi}}">
                                                <option value="0" {{$pacientes->estado_dpi == '0'  ? 'selected' : ''}}>No tramitado</option>
                                                <option value="1" {{$pacientes->estado_dpi == '1'  ? 'selected' : ''}}>Vigente</option>
                                                <option value="2" {{$pacientes->estado_dpi == '2'  ? 'selected' : ''}}>En trámite</option>
                                            </select>
                                            @if ($errors->has('estadoDPI'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Departamento de Origen</label>
                                            <select class="form-control" name="deptoOrigen" id="deptoOrigen" value="{{$pacientes->id_departamento_dpi}}">
                                                @foreach ($depto as $deptos)
                                                <option value="{{$deptos->ID_DEPARTAMENTO}}" {{$pacientes->id_departamento_dpi == $deptos->ID_DEPARTAMENTO  ? 'selected' : ''}}>{{$deptos->DEPARTAMENTO}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('deptoOrigen'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Municipio de Origen</label>
                                            <select class="form-control" name="muniOrigen" id="muniOrigen">
                                                <option value="{{$pacientes->id_municipio_dpi}}">{{$pacientes->municipio_dpi}}</option>
                                            </select>
                                            @if ($errors->has('muniOrigen'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Dirección*</label>
                                            <input type="text" name="address" class="address form-control" value="{{$pacientes->direccion}}">
                                            @if ($errors->has('address'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Zona</label>
                                            <select class="form-control" name="zona" value="{{$pacientes->zona}}">
                                                @for($i = 0; $i <= 20; $i++) <option value="{{$i}}" {{$pacientes->zona == $i  ? 'selected' : ''}}>{{$i}}</option>
                                                    @endfor
                                            </select>
                                            @if ($errors->has('zona'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Colonia / Barrio / Aldea*</label>
                                            <input type="text" name="coloniaBarrioAldea" value="{{$pacientes->colonia_barrio_aldea}}" class="coloniaBarrioAldea form-control">
                                            @if ($errors->has('coloniaBarrioAldea'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Referencia de la Vivienda</label>
                                            <input type="text" name="refVivienda" class="refVivienda form-control" value="{{$pacientes->referencia_vivienda}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Departamento Actual</label>
                                            <select class="form-control" name="deptoActual" id="deptoActual" value="{{$pacientes->id_departamento_actual}}">
                                                @foreach ($depto as $deptos)
                                                <option value="{{$deptos->ID_DEPARTAMENTO}}" {{$pacientes->id_departamento_actual == $deptos->ID_DEPARTAMENTO  ? 'selected' : ''}}>{{$deptos->DEPARTAMENTO}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('deptoActual'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Municipio Actual</label>
                                            <select class="form-control" name="muniActual" id="muniActual">
                                                <option value="{{$pacientes->id_municipio_actual}}">{{$pacientes->municipio_actual}}</option>

                                            </select>
                                            @if ($errors->has('muniActual'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono Casa*</label>
                                            <input type="text" name="telefonoCasa" class="telefonoCasa form-control" value="{{$pacientes->telefono_casa}}">
                                            @if ($errors->has('telefonoCasa'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 1*</label>
                                            <input type="text" name="telefono1" class="telefono form-control" value="{{$pacientes->celular_1}}">
                                            @if ($errors->has('telefono1'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 2</label>
                                            <input type="text" name="telefono2" class="telefono form-control" value="{{$pacientes->Celular_2}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between px-3 align-items-center">
                                    <div class="text-center mb-1">
                                        <a href="/pacientes" class="btn btn-block btn-lg btn-danger text-uppercase"><i class="fas fa-user-injured"></i> REGRESAR</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="#" id="v-pills-next-tab" class="btn btn-block btn-lg btn-primary text-uppercase">Continuar <i class="fas fa-arrow-right" style="font-size: 1rem;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="General" role="tabpanel" aria-labelledby="General-tab">
                                <div class="row pt-2">
                                    <div class="col">
                                        <h4 class="font-weight-bold text-uppercase">Padre</h4>
                                    </div>
                                </div>
                                <div class="row gap-2">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nombres</label>
                                            <input type="text" name="namePadre" value="{{$generalPaciente->nombrePadre}}" class="namePadre form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos</label>
                                            <input type="text" name="lastNamePadre" value="{{$generalPaciente->apellidoPadre}}" class="lastNamePadre form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-between px-3 align-items-center">
                                        <div class="form-group m-0" style="margin: auto !important;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioOpPadre" id="radioPadre1" value="Fallecido" {{$generalPaciente->estadoPadre == 0  ? 'checked' : ''}}>
                                                <label class="form-check-label" for="radioPadre1">Fallecido</label>

                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioOpPadre" id="radioPadre2" value="Encargado" {{$generalPaciente->estadoPadre == 1  ? 'checked' : ''}}>
                                                <label class="form-check-label" for="radioPadre2">Encargado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col">
                                        <h4 class="font-weight-bold text-uppercase">Madre</h4>
                                    </div>
                                </div>
                                <div class="row gap-2">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nombres</label>
                                            <input type="text" name="nameMadre" class="nameMadre form-control" value="{{$generalPaciente->nombreMadre}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos</label>
                                            <input type="text" name="lastNameMadre" class="lastNameMadre form-control" value="{{$generalPaciente->apellidoMadre}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-between px-3 align-items-center">
                                        <div class="form-group m-0" style="margin: auto !important;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioOpMadre" id="radioMadre2" value="Fallecido" {{$generalPaciente->estadoMadre == 0  ? 'checked' : ''}}>
                                                <label class="form-check-label" for="radioMadre2">Fallecido</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioOpMadre" id="radioMadre2" value="Encargado" {{$generalPaciente->estadoMadre == 1  ? 'checked' : ''}}>
                                                <label class="form-check-label" for="radioMadre2">Encargado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col">
                                        <h4 class="font-weight-bold text-uppercase">Encargado</h4>
                                    </div>
                                </div>
                                <div class="row gap-2">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nombres*</label>
                                            <input type="text" name="nameEncargado" class="nameEncargado form-control" value="{{$generalPaciente->nombreEncargado}}">
                                            @if ($errors->has('nameEncargado'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos*</label>
                                            <input type="text" name="lastNameEncargado" class="lastNameEncargado form-control" value="{{$generalPaciente->apellidoEncargado}}">
                                            @if ($errors->has('lastNameEncargado'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Parentesco*</label>
                                            <select class="form-control" name="parentescoGeneral">
                                                @foreach ($parentesco as $parent)
                                                <option value="{{$parent->id_parentesco}}" {{$generalPaciente->idParentesco == $parent->id_parentesco  ? 'selected' : ''}}>{{$parent->tipo_parentesco}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('parentescoGeneral'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Especifique</label>
                                            <input type="text" name="especifiqueGeneral" class="especifiqueGeneral form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Dirección*</label>
                                            <input type="text" name="addressGeneral" class="addressGeneral form-control" value="{{$generalPaciente->direccion}}">
                                            @if ($errors->has('addressGeneral'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Zona*</label>
                                            <select class="form-control" name="zonaGeneral">
                                                @for($i = 0; $i <= 20; $i++) <option value="{{$i}}" {{$generalPaciente->zona == $i  ? 'selected' : ''}}>{{$i}}</option>
                                                    @endfor
                                            </select>
                                            @if ($errors->has('zonaGeneral'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Colonia / Barrio / Aldea*</label>
                                            <input type="text" name="coloniaBarrioAldeaGeneral" class="coloniaBarrioAldeaGeneral form-control" value="{{$generalPaciente->coloniaBarrioAldea}}">
                                            @if ($errors->has('coloniaBarrioAldeaGeneral'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Departamento Actual*</label>
                                            <select class="form-control" name="deptoActualGeneral" id="deptoActualGeneral">
                                                @foreach ($depto as $deptos)
                                                <option value="{{$deptos->ID_DEPARTAMENTO}}" {{$generalPaciente->ID_DEPARTAMENTO == $deptos->ID_DEPARTAMENTO  ? 'selected' : ''}}>{{$deptos->DEPARTAMENTO}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('deptoActualGeneral'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Municipio Actual*</label>
                                            <select class="form-control" name="muniActualGeneral" id="muniActualGeneral">
                                                <option value="{{$generalPaciente->ID_MUNICIPIO}}">{{$generalPaciente->MUNICIPIO}}</option>

                                            </select>
                                            @if ($errors->has('muniActualGeneral'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 1*</label>
                                            <input type="text" name="telefono1General" class="telefono form-control" value="{{$generalPaciente->telefono_1}}">
                                            @if ($errors->has('telefono1General'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 2</label>
                                            <input type="text" name="telefono2General" class="telefono form-control" value="{{$generalPaciente->telefono_2}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-between px-3 align-items-center">
                                    <div class="text-center mb-1">
                                        <a href="#" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">GUARDAR <i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                                <!-- <div class="col-xs-8 col-sm-8 col-md-9 text-center pt-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">GUARDAR PACIENTE</button>
                                </div> -->
                            </div>
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
@section('scripts')
<script>
    $(document).ready(function() {
        $('.telefonoCasa').inputmask('9999-9999');
        $('.telefono').inputmask('9999-9999');
        $('.dpi').inputmask('9999 99999 9999');
    });

    window.addEventListener("load", function() {
        let tabs = document.querySelectorAll(".left-tabs a");

        let nextTab = document.getElementById("v-pills-next-tab");

        let i = 0;

        nextTab.addEventListener("click", function() {

            // i = (i == (tabs.length - 1)) ? 0 : i + 1;
            tabs[1].click();

        }, false);
    }, false);

    window.addEventListener("load", function() {
        let tabs = document.querySelectorAll(".left-tabs a");

        let nextTab = document.getElementById("v-pills-back-tab");

        nextTab.addEventListener("click", function() {

            tabs[0].click();

        }, false);
    }, false);

    document.getElementById('deptoOrigen').addEventListener('change', (e) => {
        const idDepartamento = e.target.value;
        $.getJSON(`municipiosGet/${idDepartamento}`, function(municipiosData) {
            let htmlOptionsMunicipios = '';
            municipiosData.length === 0 ? htmlOptionsMunicipios += `<option value="">no hay municipios disponibles</option>` :
                municipiosData.forEach(function(datamunicipiosoptions) {
                    htmlOptionsMunicipios += `<option value="${datamunicipiosoptions.ID_MUNICIPIO}">${datamunicipiosoptions.MUNICIPIO}</option>`
                })

            $("#muniOrigen").html(htmlOptionsMunicipios);
        })
    })

    document.getElementById('deptoActual').addEventListener('change', (e) => {
        const idDepartamento = e.target.value;
        $.getJSON(`municipiosGet/${idDepartamento}`, function(municipiosData) {
            let htmlOptionsMunicipios = '';
            municipiosData.length === 0 ? htmlOptionsMunicipios += `<option value="">no hay municipios disponibles</option>` :
                municipiosData.forEach(function(datamunicipiosoptions) {
                    htmlOptionsMunicipios += `<option value="${datamunicipiosoptions.ID_MUNICIPIO}">${datamunicipiosoptions.MUNICIPIO}</option>`
                })

            $("#muniActual").html(htmlOptionsMunicipios);
        })
    })

    document.getElementById('deptoActualGeneral').addEventListener('change', (e) => {
        const idDepartamento = e.target.value;
        $.getJSON(`municipiosGet/${idDepartamento}`, function(municipiosData) {
            let htmlOptionsMunicipios = '';
            municipiosData.length === 0 ? htmlOptionsMunicipios += `<option value="">no hay municipios disponibles</option>` :
                municipiosData.forEach(function(datamunicipiosoptions) {
                    htmlOptionsMunicipios += `<option value="${datamunicipiosoptions.ID_MUNICIPIO}">${datamunicipiosoptions.MUNICIPIO}</option>`
                })

            $("#muniActualGeneral").html(htmlOptionsMunicipios);
        })
    })
</script>
@endsection