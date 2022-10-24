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


                        {{ Form::model($expediente, ['method' => 'PUT','route' => ['expediente.update', $expediente->id]]) }}
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
                                        <input type="hidden" name="idExpediente" value="{{$expediente->id}}" class="name1 form-control">
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Diagnostico*</label>
                                            <input type="date" name="fechaDiag" value="{{$expediente->fecha_diagnostico}}" class=" form-control">
                                            
                                            @if ($errors->has('fechaDiag'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fecha de Ingreso*</label>
                                            <input type="date" name="fechaIngreso" value="{{$expediente->fecha_ingreso}}" class=" form-control">
                                            
                                            @if ($errors->has('fechaIngreso'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Hipertenso</label>
                                            <select class="form-control" name="hipertenso" value="{{$expediente->hipertenso}}">
                                                <option value="1" {{$expediente->hipertenso == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$expediente->hipertenso == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('hipertenso'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Diabetico</label>
                                            <select class="form-control" name="diabetico" value="{{$expediente->diabetico}}">
                                                <option value="1" {{$expediente->diabetico == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$expediente->diabetico == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('diabetico'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Cardiopatia</label>
                                            <select class="form-control" name="cardiopatia" value="{{$expediente->cardiopatia}}">
                                                <option value="1" {{$expediente->cardiopatia == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$expediente->cardiopatia == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('cardiopatia'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Fistula</label>
                                            <select class="form-control" name="accesoIGSS" value="{{$expediente->fistula}}">
                                                <option value="1" {{$expediente->fistula == 'SI' ? 'selected' : ''}}>Sí</option>
                                                <option value="0" {{$expediente->fistula == 'NO' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @if ($errors->has('fistula'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tipo de Sangre</label>
                                            <select class="form-control" name="tipo_sangre" value="{{$expediente->tipo_sangre}}">
                                            <option value="0" {{$expediente->tipo_sangre == 'A' ? 'selected' : ''}}>A</option>
                                                <option value="1" {{$expediente->tipo_sangre == 'B' ? 'selected' : ''}}>B</option>                                               
                                                <option value="2" {{$expediente->tipo_sangre == 'C' ? 'selected' : ''}}>C</option>
                                                <option value="3" {{$expediente->tipo_sangre == 'D' ? 'selected' : ''}}>D</option>
                                                <option value="4" {{$expediente->tipo_sangre == 'E' ? 'selected' : ''}}>E</option>
                                            </select>
                                            @if ($errors->has('tipo_sangre'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tratamiento</label>
                                            <select class="form-control" name="tratamientos" value="{{$expediente->tratamientos}}">
                                            <option value="0" {{$expediente->tratamientos == 'NO TIENE' ? 'selected' : ''}}>NO TIENE</option>
                                                <option value="1" {{$expediente->tratamientos == 'HEMODIALISIS' ? 'selected' : ''}}>HEMODIALISIS</option>                                               
                                                <option value="2" {{$expediente->tratamientos == 'DIALISIS PERITONEAL' ? 'selected' : ''}}>DIALISIS PERITONEAL</option>
                                                <option value="3" {{$expediente->tratamientos == 'TRASPLANTE DE RIÑON' ? 'selected' : ''}}>TRASPLANTE DE RIÑON</option>
                                                <option value="4" {{$expediente->tratamientos == 'TRATAMIENTO CONSERVADOR' ? 'selected' : ''}}>TRATAMIENTO CONSERVADOR</option>
                                            </select>
                                            @if ($errors->has('tratamientos'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Peso (Lb)</label>
                                            <input type="number" name="peso" class="edad form-control" value="{{$expediente->peso}}">
                                            @if ($errors->has('peso'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Otros</label>
                                            <input type="text" name="Otros" value="{{$expediente->Otros}}" class="Otros form-control">                       
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Observaciones</label>
                                            <input type="text" name="lastName1" value="{{$expediente->Observacion}}" class="lastName1 form-control">
                              
                                        </div>
                                    </div>
                                <!--Botones-->  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="text-center mb-1">
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">ACTUALIZAR <i class="fas fa-mask"></i></button>
                                    </div>
                                </div>
                                <!--Botones-->     
                                    
                                    
                                    
                                </div>                              
                            </div>
                            <!--Fin InfoMedica-->

                            <!--Informacion Vivienda-->
                            <div class="tab-pane fade" id="InfoVi" role="tabpanel" aria-labelledby="InfoVi-tab">
                              
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Vehiculo Propio</label>
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
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tipo de Vehiculo</label>
                                            <select class="form-control" name="accesoIGSS" value="{{$pacientes->acceso_al_igss}}">
                                                <option value="1" {{$pacientes->acceso_al_igss == 'PARTICULAR' ? 'selected' : ''}}>CARRO PARTICULAR</option>
                                                <option value="0" {{$pacientes->acceso_al_igss == 'MOTOCICLETA' ? 'selected' : ''}}>MOTOCICLETA</option>
                                            </select>
                                            @if ($errors->has('accesoIGSS'))
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
                                        <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">ACTUALIZAR <i class="fas fa-mask"></i></button>
                                    </div>
                            </div>
                            <!--Botones-->

                                    
                                   
                                      
                            </div>
                            <!--Fin InfoVivienda-->

                            <!--Ingreso Familia-->
                             <div class="tab-pane fade" id="IngFam" role="tabpanel" aria-labelledby="IngFam-tab">
                              
                              <div class="row gap-2">
                                

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Personas que laboran en el hogar del paciente</label>
                                            <input type="number" name="edad" class="edad form-control" value="{{$pacientes->edad}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Sector Publico</label>
                                            <select class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'SI'  ? 'selected' : ''}}>SI</option>
                                                <option value="M" {{$pacientes->genero == 'NO'  ? 'selected' : ''}}>NO</option>
                                            </select>
                                            @if ($errors->has('genero'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Sector Privado</label>
                                            <select class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'SI'  ? 'selected' : ''}}>SI</option>
                                                <option value="M" {{$pacientes->genero == 'NO'  ? 'selected' : ''}}>NO</option>
                                            </select>
                                            @if ($errors->has('genero'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Tiene negocio propio</label>
                                            <select class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'SI'  ? 'selected' : ''}}>SI</option>
                                                <option value="M" {{$pacientes->genero == 'NO'  ? 'selected' : ''}}>NO</option>
                                            </select>
                                            @if ($errors->has('genero'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Recibe remesas</label>
                                            <select class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'SI'  ? 'selected' : ''}}>SI</option>
                                                <option value="M" {{$pacientes->genero == 'NO'  ? 'selected' : ''}}>NO</option>
                                            </select>
                                            @if ($errors->has('genero'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Recibe ayuda social</label>
                                            <select class="form-control" value="{{$pacientes->genero}}" name="genero">
                                                <option value="F" {{$pacientes->genero == 'SI'  ? 'selected' : ''}}>SI</option>
                                                <option value="M" {{$pacientes->genero == 'NO'  ? 'selected' : ''}}>NO</option>
                                            </select>
                                            @if ($errors->has('genero'))
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Este campo es requerido.</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="edad" class="edad form-control" value="{{$pacientes->edad}}">
                                        </div>
                                    </div>

                                <!--Botones-->  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="text-center mb-1">
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">ACTUALIZAR <i class="fas fa-mask"></i></button>
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
                                            <input type="number" name="estimado1" id = "estimado1" class="estimado form-control" value="{{$pacientes->edad}}" oninput="sumar()">
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;" onchange="sumar();" >Estimado economico en Educacion por mes por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="estimado2" id = "estimado2" class="estimado form-control" value="{{$pacientes->edad}}" oninput="sumar()">
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;" >Estimado economico en Arrendamiento por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="estimado3" id = "estimado3" class="estimado form-control" value="{{$pacientes->edad}} " oninput="sumar()"> 
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico en Servicios por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="estimado4" id = "estimado4" class="estimado form-control" value="{{$pacientes->edad}}" oninput="sumar()">
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico en Salud por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="estimado5" id = "estimado5" class="estimado form-control" value="{{$pacientes->edad}}" oninput="sumar()">
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Estimado economico en Renta por mes (aprox.) en Quetzales</label>
                                            <input type="number" name="estimado6" id = "estimado6" class="estimado form-control" value="{{$pacientes->edad}}" oninput="sumar()">
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Costos de traslado (aprox.) en Quetzales </label>
                                            <input type="number" name="estimado7" id = "estimado7" class="estimado form-control" value="{{$pacientes->edad}}" oninput="sumar()">
                                        </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" style="font-size: 1rem;">Total Aprox</label>

                                            <input disabled type="number" name="total" id ="total" class="estimado form-control">

                                        </div>
                                </div>
                                    

                                <!--Botones-->  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="text-center mb-1">
                                        <a href="/expediente" id="v-pills-back-tab" class="btn btn-block btn-lg btn-warning text-uppercase"><i class="fas fa-arrow-left" style="font-size: 1rem;"></i> Retroceder</a>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-primary  text-uppercase">ACTUALIZAR <i class="fas fa-mask"></i></button>
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