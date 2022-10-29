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
                            </button>s
                        </div>
                        @endif -->
                        {{ Form::model($infopacientes, ['method' => 'POST','route' => ['expediente.store']]) }}

                        <ul class="nav nav-tabs left-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="InfoMedica-tab" data-toggle="tab" href="#InfoMedica" role="tab" aria-controls="InfoMedica" aria-selected="true">Informacion Medica</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="InfoVi-tab" data-toggle="tab" href="#InfoVi" role="tab" aria-controls="InfoVi" aria-selected="false">Informacion de Vivienda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="IngFam-tab" data-toggle="tab" href="#IngFam" role="tab" aria-controls="IngFam" aria-selected="false">Ingreso de Familiar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="EgrFam-tab" data-toggle="tab" href="#EgrFam" role="tab" aria-controls="EgrFam" aria-selected="false">Egreso de Familiar</a>
                            </li>
                        </ul>
                        <!--Tabla de contenidos-->
                        <div class="tab-content" id="myTabContent">

                            <!--Informacion Medica-->
                            <div class="tab-pane fade show active" id="InfoMedica" role="tabpanel" aria-labelledby="InfoMedica-tab">
                                <div class="row gap-2">

                                    <div class="form-group">
                                        <input type="hidden" name="id_expediente" value="{{$infopacientes->id_Paciente}}" class="name1 form-control">
                                        <input type="hidden" name="" value="{{$infopacientes->no_expediente}}" class="name1 form-control">
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">No. de expediente</label>
                                            <input disabled type="number" name="N" class="estimado form-control" value="{{$infopacientes->no_expediente}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Nombre</label>
                                            <input disabled type="text" name="" class="estimado form-control" value="{{$infopacientes->Nombre_1}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Apellido</label>
                                            <input disabled type="text" name="" class="estimado form-control" value="{{$infopacientes->Apellido_1}}">
                                        </div>
                                    </div>
                                

                                

                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Diagnostico*</label>
                                            <input type="date" name="fecha_diagnostico" value="2022-01-01" class=" form-control">
                                            
                                            @if ($errors->has('fecha_diagnostico'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Ingreso*</label>
                                            <input type="date" name="fecha_ingreso" value="2022-01-01" class=" form-control">
                                            
                                            @if ($errors->has('fecha_ingreso'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Hipertenso</label>
                                            <select class="form-control" name="hipertenso" value="">
                                                <option value="SI">Sí</option>
                                                <option value="NO">No</option>
                                            </select>
                                            @if ($errors->has('hipertenso'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Diabetico</label>
                                            <select class="form-control" name="diabetico" value="">
                                                <option value="SI">Sí</option>
                                                <option value="NO">No</option>
                                            </select>
                                            @if ($errors->has('diabetico'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Cardiopatia</label>
                                            <select class="form-control" name="cardiopatia" value="">
                                                <option value="SI">Sí</option>
                                                <option value="NO">No</option>
                                            </select>
                                            @if ($errors->has('cardiopatia'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Vascular</label>
                                            <select class="form-control" name="id_A_Vascular" value="">
                                                <option value="1">Fistula</option>
                                                <option value="2">Cateter</option>
                                            </select>
                                            @if ($errors->has('cardiopatia'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    



                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tipo de Sangre</label>
                                            <input type="text" name="tipo_sangre" class="edad form-control" value="no ingresado">
                                            @if ($errors->has('tipo_sangre'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tratamiento</label>
                                            <select class="form-control" name="tratamientos" value="NO TIENE">
                                            <option value="NO TIENE">NO TIENE</option>
                                                <option value="HEMODIALIS">HEMODIALISIS</option>                                               
                                                <option value="DIALISIS PERITONEAL">DIALISIS PERITONEAL</option>
                                                <option value="TRASPLANTE DE RIÑON">TRASPLANTE DE RIÑON</option>
                                                <option value="TRATAMIENTO CONSERVADOR">TRATAMIENTO CONSERVADOR</option>
                                            </select>
                                            @if ($errors->has('tratamientos'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Peso (Lb)</label>
                                            <input type="number" name="peso" class="peso form-control" value="1">
                                            @if ($errors->has('peso'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Otros</label>
                                            <input type="text" name="Otros" value="no contiene" class="Otros form-control">                       
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Observaciones</label>
                                            <input type="text" name="Observacion" value="no contiene observaciones" class="lastName1 form-control">
                                        </div>
                                    </div>
                                <!--Botones-->  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                <label class="font-weight-bold" style="font-size: 1rem;">Volver a tabla Expedientes</label>
                                    <div class="text-center mb-1">
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                </div>
                                <!--Botones-->     
                                    
                                    
                                    
                                </div>                              
                            </div>
                            <!--Fin InfoMedica-->

                            <!--Informacion Vivienda-->
                            <div class="tab-pane fade" id="InfoVi" role="tabpanel" aria-labelledby="InfoVi-tab">
                            <div class="row gap-2">
                                     <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tipo Vivienda</label>
                                            <select class="form-control" name="tipo_vivienda" value="">
                                                <option value="PROPIA">Propia</option>
                                                <option value="ALQUILER">Alquiler</option>
                                            </select>
                                            @if ($errors->has('tipo_vivienda'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Vehiculo Propio</label>
                                            <select class="form-control" name="vehiculo_propio" value="">
                                                <option value="SI">Sí</option>
                                                <option value="NO">No</option>
                                            </select>
                                            @if ($errors->has('vehiculo'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tipo de Vehiculo</label>
                                            <select class="form-control" name="tipo_vehiculo" value="">
                                                <option value="PARTICULAR">CARRO PARTICULAR</option>
                                                <option value="MOTOCICLETA">MOTOCICLETA</option>
                                            </select>
                                            @if ($errors->has('tipo_vehiculo'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Numero de hijos en la familia</label>
                                            <input type="number" name="no_hijos" value="0" class="lastName1 form-control">
                                            @if ($errors->has('no_hijos'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Total del nucleo familiar</label>
                                            <input type="number" name="total_nucleo_familiar" value="0" class="lastName1 form-control">
                                            @if ($errors->has('total_nucleo_familiar'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>



                            <!--Botones-->  

                            <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="text-center mb-1">
                                    <label class="font-weight-bold" style="font-size: 1rem;">Volver a tabla Expedientes</label>
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                   
                            </div>
                            <!--Botones-->

                                    
                                   
                                      
                            </div>
                            </div>
                            <!--Fin InfoVivienda-->

                            <!--Ingreso Familia-->
                             <div class="tab-pane fade" id="IngFam" role="tabpanel" aria-labelledby="IngFam-tab">
                              
                              <div class="row gap-2">
                                

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Personas que laboran en el hogar del paciente</label>
                                            <input type="number" name="personas_laboran" class="edad form-control" value="0">
                                            @if ($errors->has('personas_laboran'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Sector Publico</label>
                                            <select class="form-control" value="" name="sector_publico">
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @if ($errors->has('sector_publico'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Sector Privado</label>
                                            <select class="form-control" value="" name="sector_privado">
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @if ($errors->has('sector_privado'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tiene negocio propio</label>
                                            <select class="form-control" value="" name="negocio_propio">
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @if ($errors->has('negocio_propio'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Recibe remesas</label>
                                            <select class="form-control" value="" name="remesas">
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @if ($errors->has('remesas'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Recibe ayuda social</label>
                                            <select class="form-control" value="" name="ayuda_social">
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            @if ($errors->has('ayuda'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="total_aproximado_i" class="edad form-control" value="0">
                                            @if ($errors->has('total_aproximado_i'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                <!--Botones-->  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                <label class="font-weight-bold" style="font-size: 1rem;">Volver a tabla Expedientes</label>
                                    <div class="text-center mb-1">
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                    
                                </div>
                                <!--Botones-->
                                  
                                  
                              </div>        
                            </div>
                          <!--Fin InFamilia-->
                          
                          <!--Egreso Familia-->

                          <div class="tab-pane fade" id="EgrFam" role="tabpanel" aria-labelledby="EgrFam-tab">
                              
                              <div class="row gap-2">

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;" >Estimado economico en Alimentacion por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="alimentacion" id = "estimado1" class="estimado form-control" value="0" oninput="sumar()">
                                            @if ($errors->has('alimentacion'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;" >Estimado economico en Educacion por mes por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="educacion" id = "estimado2" class="estimado form-control" value="0" oninput="sumar()">
                                            @if ($errors->has('educacion'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;" >Estimado economico en Arrendamiento por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="arrendamiento" id = "estimado3" class="estimado form-control" value="0" oninput="sumar()"> 
                                            @if ($errors->has('arrendamiento'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico en Servicios por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="servicios" id = "estimado4" class="estimado form-control" value="0" oninput="sumar()">
                                            @if ($errors->has('servicios'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico en Salud por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="salud" id = "estimado5" class="estimado form-control" value="0" oninput="sumar()">
                                            @if ($errors->has('salud'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico en Renta por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="renta" id = "estimado6" class="estimado form-control" value="0" oninput="sumar()">
                                            @if ($errors->has('renta'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Costos de traslado (aprox.) en Quetzales </label>
                                            <input type="number" name="costos_traslado" id = "estimado7" class="estimado form-control" value="0" oninput="sumar()">
                                            @if ($errors->has('costos_traslado'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Total Aproximado</label>
                                            <input readonly type="number" name="total_aproximado_e" id ="total" class="total_aproximado form-control" value="0" placeholder="Ingrese un valor para realizar suma" change="">
                                            @if ($errors->has('total_aproximado_e'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                </div>
                                    

                                <!--Botones-->  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="text-center mb-1">
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">Actualizar <i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                                <!--Botones-->
                                  
                                  
                              </div>        
                          </div>
                          <!--Fin EgFamilia-->
                            <!--Botones-->
                                
                                <!-- <div class="col-xs-8 col-sm-8 col-md-9 text-center pt-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">GUARDAR PACIENTE</button>
                                </div> -->
                                <!--Botones-->
                            </div>
                            
                            <!--Tabla de contenidos-->
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


                                <!--Sumatoria Script-->
                                
                                <script type="text/javascript">
                                // si la respuesta que se espera es sumar
                                
                                function sumar() {
                                    try {
                                    var a = parseInt(document.getElementById("estimado1").value) || 0,
                                    b = parseInt(document.getElementById("estimado2").value) || 0,
                                    c = parseInt(document.getElementById("estimado3").value) || 0,
                                    d = parseInt(document.getElementById("estimado4").value) || 0,
                                    e = parseInt(document.getElementById("estimado5").value) || 0,
                                    f = parseInt(document.getElementById("estimado6").value) || 0,
                                    g = parseInt(document.getElementById("estimado7").value) || 0;


                                    

                                    document.getElementById("total").value = a + b + c + d + e + f + g ;
                                        } catch (e) {}
                                                }
                                </script>

                                <!--FIN Sumatoria Script-->


                                <!--Sumatoria Script-->
                                
                                <script type="text/javascript">
                                // si la respuesta que se espera es sumar
                                
                                function cambios() {
                                    try {
                                    var a = parseInt(document.getElementById("total").value) || 0;
                                    document.getElementById("total").value = a;
                                        } catch (e) {}
                                                }
                                </script>

                                <!--FIN Sumatoria Script-->

@endsection