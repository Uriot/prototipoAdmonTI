@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Expedientes</h3>
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
                                <a class="nav-link active" id="Personal-tab" data-toggle="tab" href="#Personal" role="tab" aria-controls="Personal" aria-selected="true">Informacion Medica</a>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="Personal" role="tabpanel" aria-labelledby="Personal-tab">
                                <div class="row gap-2">

                                    <div class="form-group">
                                        <input type="hidden" name="idPaciente" value="{{$pacientes->id}}" class="name1 form-control">
                                    </div>



                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Diagnostico*</label>
                                            <input type="date" name="fechaNacimiento" value="" class=" form-control"> <!--{{$pacientes->fecha_nacimiento}}-->
                                            <!-- {{ Form::date('fechaNacimiento', $pacientes->fecha_nacimiento, ['class' => 'form-control']) }} -->
                                            @if ($errors->has('fechaNacimiento'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- 
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Segundo Nombre</label>
                                            <input type="text" name="name2" value="{{$pacientes->nombre_2}}" class="name2 form-control">
                                        </div>
                                    </div>


                                    -->
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Ingreso*</label>
                                            <input type="date" name="fechaNacimiento" value="" class=" form-control"> <!--{{$pacientes->fecha_nacimiento}}-->
                                            <!-- {{ Form::date('fechaNacimiento', $pacientes->fecha_nacimiento, ['class' => 'form-control']) }} -->
                                            @if ($errors->has('fechaNacimiento'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                            


                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Hipertenso </label>
                                            <select class="form-control" name="accesoIGSS" value=""> <!--{{$pacientes->acceso_al_igss}}-->
                                                <option value="1" {{$pacientes->acceso_al_igss == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$pacientes->acceso_al_igss == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('accesoIGSS'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Diabetico</label>
                                            <select class="form-control" name="accesoIGSS" value=""> <!--{{$pacientes->acceso_al_igss}}-->
                                                <option value="1" {{$pacientes->acceso_al_igss == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$pacientes->acceso_al_igss == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('accesoIGSS'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Cardiopatia</label>
                                            <select class="form-control" name="accesoIGSS" value=""> <!--{{$pacientes->acceso_al_igss}}-->
                                                <option value="1" {{$pacientes->acceso_al_igss == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$pacientes->acceso_al_igss == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('accesoIGSS'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fistula</label>
                                            <select class="form-control" name="accesoIGSS" value="{{$pacientes->acceso_al_igss}}">
                                                <option value="1" {{$pacientes->acceso_al_igss == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$pacientes->acceso_al_igss == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('accesoIGSS'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tratamientos</label>
                                            <select class="form-control" value="{{$pacientes->estado_civil}}" name="estadoCivil">
                                                
                                                <option value="Hemodialisis" {{$pacientes->estado_civil == 'Hemodialisis'  ? 'selected' : ''}}>Hemodialisis</option>
                                                
                                                <option value="Trasplante de riñón" {{$pacientes->estado_civil == 'Trasplante de riñón'  ? 'selected' : ''}}>Trasplante de riñón</option>
                                                
                                                <option value="" {{$pacientes->estado_civil == 'Divorciado (a)'  ? 'selected' : ''}}>Divorciado (a)</option>
                                                
                                                <option value="" {{$pacientes->estado_civil == 'Viudo (a)'  ? 'selected' : ''}}>Viudo (a)</option>
                                            </select>
                                            @if ($errors->has('estadoCivil'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>






                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Peso (lb) </label>
                                            <input type="number" name="edad" class="edad form-control" value=""> <!--{{$pacientes->edad}}-->
                                            @if ($errors->has('edad'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Otros</label>
                                            <input type="text" name="name3" value="{{$pacientes->nombre_3}}" class="name3 form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Observacion</label>
                                            
                                            <input type="text" name="name3" value="{{$pacientes->nombre_3}}" class="name3 form-control" >
                                        </div>
                                    </div>




                                  
                                <!--Boton regresar-->
                                <div class="row justify-content-between px-3 align-items-center">
                                    <div class="text-center mb-1">
                                        <a href="/expediente" class="btn btn-block btn-lg btn-danger text-uppercase"><i class="fas fa-user-injured"></i> REGRESAR</a>
                                    </div>

                                    <!--Boton Continuar lo cambio a Guardar-->
                                    <!--
                                    <div class="text-center">
                                        <a href="#" id="v-pills-next-tab" class="btn btn-block btn-lg btn-primary text-uppercase">Guardar<i class="fas fa-" style="font-size: 1rem;"></i></a>
                                    </div>
                                    -->
                                 <!--Boton guardar-->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">GUARDAR <i class="fas fa-save"></i></button>
                                    </div>


                                </div>
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