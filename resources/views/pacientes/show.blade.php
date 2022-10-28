@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Información del Paciente</h3>
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
                                    <div class="form-group">
                                        <input type="hidden" name="idPaciente" value="{{$pacientes->id}}" class="name1 form-control">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Número de Expendiente*</label>
                                            <input type="text" disabled name="noExpediente" value="{{$pacientes->noExpediente}}" class="noExpediente form-control">
                                            @if ($errors->has('noExpediente'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Primer Nombre*</label>
                                            <!-- {{ Form::text('primer_Nombre', null, ['placeholder' => 'Nombre','class' => 'form-control']) }} -->
                                            <input type="text" disabled name="name1" value="{{$pacientes->nombre_1}}" class="name1 form-control">
                                            @if ($errors->has('name1'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Segundo Nombre</label>
                                            <input type="text" disabled name="name2" value="{{$pacientes->nombre_2}}" class="name2 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tercer Nombre</label>
                                            <input type="text" disabled name="name3" value="{{$pacientes->nombre_3}}" class="name3 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Primer Apellido*</label>
                                            <input type="text" disabled name="lastName1" value="{{$pacientes->apellido_1}}" class="lastName1 form-control">
                                            @if ($errors->has('lastName1'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Segundo Apellido</label>
                                            <input type="text" disabled name="lastName2" value="{{$pacientes->apellido_2}}" class="lastName2 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellido de Casada</label>
                                            <input type="text" disabled name="lastName3" value="{{$pacientes->apellido_de_casada}}" class="lastName3 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Género</label>
                                            <select disabled class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'F'  ? 'selected' : ''}}>Femenino</option>
                                                <option value="M" {{$pacientes->genero == 'M'  ? 'selected' : ''}}>Masculino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estado Civil</label>
                                            <input type="text" disabled name="estadoCivil" value="{{$pacientes->estado_civil}}" class="lastName3 form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nacionalidad</label>
                                            <input type="text" disabled name="nacionalidad" value="{{$pacientes->nacionalidad}}" class="nacionalidad form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Nacimiento*</label>
                                            <input type="date" disabled name="fechaNacimiento" value="{{$pacientes->fecha_nacimiento}}" class=" form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Edad</label>
                                            <input type="number" disabled name="edad" class="edad form-control" value="{{$pacientes->edad}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Acceso al IGSS</label>
                                            <input type="text" disabled name="accesoIGSS" value="{{$pacientes->acceso_al_igss}}" class="nacionalidad form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">DPI/CUI</label>
                                            <input type="text" disabled name="dpi" class="dpi form-control" value="{{$pacientes->dpi}}">
                                        </div>
                                    </div>
                                    <div class=" col-xs-12 col-sm-6 col-md-4 ">
                                        <div class=" form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Vencimiento DPI</label>
                                            <input type="date" disabled name="dpiFechaVencimiento" value="{{$pacientes->fecha_vencimiento_dpi}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estado del DPI</label>
                                            <input type="text" disabled name="estadoDPI" value="{{$pacientes->estado_dpi}}" class="nacionalidad form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Departamento de Origen</label>
                                            <select disabled class="form-control" name="deptoOrigen" id="deptoOrigen" value="{{$pacientes->id_departamento_dpi}}">
                                                @foreach ($depto as $deptos)
                                                <option value="{{$deptos->ID_DEPARTAMENTO}}" {{$pacientes->id_departamento_dpi == $deptos->ID_DEPARTAMENTO  ? 'selected' : ''}}>{{$deptos->DEPARTAMENTO}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Municipio de Origen</label>
                                            <select disabled class="form-control" name="muniOrigen" id="muniOrigen">
                                                <option value="{{$pacientes->id_municipio_dpi}}">{{$pacientes->municipio_dpi}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Dirección*</label>
                                            <input type="text" disabled name="address" class="address form-control" value="{{$pacientes->direccion}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Zona</label>
                                            <select disabled class="form-control" name="zona" value="{{$pacientes->zona}}">
                                                @for($i = 0; $i <= 20; $i++) <option value="{{$i}}" {{$pacientes->zona == $i  ? 'selected' : ''}}>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Colonia / Barrio / Aldea*</label>
                                            <input type="text" disabled name="coloniaBarrioAldea" value="{{$pacientes->colonia_barrio_aldea}}" class="coloniaBarrioAldea form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Referencia de la Vivienda</label>
                                            <input type="text" disabled name="refVivienda" class="refVivienda form-control" value="{{$pacientes->referencia_vivienda}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Departamento Actual</label>
                                            <select disabled class="form-control" name="deptoActual" id="deptoActual" value="{{$pacientes->id_departamento_actual}}">
                                                @foreach ($depto as $deptos)
                                                <option value="{{$deptos->ID_DEPARTAMENTO}}" {{$pacientes->id_departamento_actual == $deptos->ID_DEPARTAMENTO  ? 'selected' : ''}}>{{$deptos->DEPARTAMENTO}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Municipio Actual</label>
                                            <select disabled class="form-control" name="muniActual" id="muniActual">
                                                <option value="{{$pacientes->id_municipio_actual}}">{{$pacientes->municipio_actual}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono Casa*</label>
                                            <input type="text" disabled name="telefonoCasa" class="telefonoCasa form-control" value="{{$pacientes->telefono_casa}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 1*</label>
                                            <input type="text" disabled name="telefono1" class="telefono form-control" value="{{$pacientes->celular_1}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 2</label>
                                            <input type="text" disabled name="telefono2" class="telefono form-control" value="{{$pacientes->Celular_2}}">
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
                                            <input type="text" disabled name="namePadre" value="{{$generalPaciente->nombrePadre}}" class="namePadre form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos</label>
                                            <input type="text" disabled name="lastNamePadre" value="{{$generalPaciente->apellidoPadre}}" class="lastNamePadre form-control">
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
                                            <input type="text" disabled name="nameMadre" class="nameMadre form-control" value="{{$generalPaciente->nombreMadre}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos</label>
                                            <input type="text" disabled name="lastNameMadre" class="lastNameMadre form-control" value="{{$generalPaciente->apellidoMadre}}">
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
                                            <input type="text" disabled name="nameEncargado" class="nameEncargado form-control" value="{{$generalPaciente->nombreEncargado}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellidos*</label>
                                            <input type="text" disabled name="lastNameEncargado" class="lastNameEncargado form-control" value="{{$generalPaciente->apellidoEncargado}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Parentesco*</label>
                                            <select disabled class="form-control" name="parentescoGeneral">
                                                @foreach ($parentesco as $parent)
                                                <option value="{{$parent->id_parentesco}}" {{$generalPaciente->idParentesco == $parent->id_parentesco  ? 'selected' : ''}}>{{$parent->tipo_parentesco}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Especifique</label>
                                            <input type="text" disabled name="especifiqueGeneral" class="especifiqueGeneral form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Dirección*</label>
                                            <input type="text" disabled name="addressGeneral" class="addressGeneral form-control" value="{{$generalPaciente->direccion}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Zona*</label>
                                            <select disabled class="form-control" name="zonaGeneral">
                                                @for($i = 0; $i <= 20; $i++) <option value="{{$i}}" {{$generalPaciente->zona == $i  ? 'selected' : ''}}>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Colonia / Barrio / Aldea*</label>
                                            <input type="text" disabled name="coloniaBarrioAldeaGeneral" class="coloniaBarrioAldeaGeneral form-control" value="{{$generalPaciente->coloniaBarrioAldea}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Departamento Actual*</label>
                                            <select disabled class="form-control" name="deptoActualGeneral" id="deptoActualGeneral">
                                                @foreach ($depto as $deptos)
                                                <option value="{{$deptos->ID_DEPARTAMENTO}}" {{$generalPaciente->ID_DEPARTAMENTO == $deptos->ID_DEPARTAMENTO  ? 'selected' : ''}}>{{$deptos->DEPARTAMENTO}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Municipio Actual*</label>
                                            <select disabled class="form-control" name="muniActualGeneral" id="muniActualGeneral">
                                                <option value="{{$generalPaciente->ID_MUNICIPIO}}">{{$generalPaciente->MUNICIPIO}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 1*</label>
                                            <input type="text" disabled name="telefono1General" class="telefono form-control" value="{{$generalPaciente->telefono_1}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Teléfono 2</label>
                                            <input type="text" disabled name="telefono2General" class="telefono form-control" value="{{$generalPaciente->telefono_2}}">
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
                                        <a href="/pacientes" class="btn btn-block btn-lg btn-danger text-uppercase"><i class="fas fa-user-injured"></i> REGRESAR</a>
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