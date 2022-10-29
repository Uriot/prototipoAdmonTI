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
                        <!-- Comentar linea 14 y 22 para pruebas porque son permisos -->
                        <!-- @can('crear-paciente')  -->
                        <!-- @endcan -->
                        <div class="pull-right">
                            <!-- Crear un paciente nuevo "quitar" -->
                            <a class="btn btn-warning" href="/">Volver a Pacientes</a>
                            
                            <!-- Se redirecciona a expediente -->
                            <form action="{{route('expediente.index')}}" method="get" class="form-inline my-2 my-lg-0 float-right">

                                <input name="texto" class="form-control mr-sm-2" type="text" placeholder="Ingrese Paciente" aria-label="Search">

                                <button class="btn btn btn-info my-2 my-sm-0" type="submit">Buscar Paciente</button>
                            </form>
                        </div>
                        <br>
                        <table class="table table-striped mt-2">
                            <thead style="background-color: #6777ef">
                                <!--Agregar Numero de expediente no_expediente-->
                                <th style="display: none">ID</th>
                                <th style="color: #fff">No. de Expediente</th>
                                <th style="color: #fff">Nombre</th>
                                <th style="color: #fff">Apellido</th>
                                <th style="color: #fff">Dirección</th>
                                <th style="color: #fff">Telefono</th>
                                <!--<th style="color: #fff">Estado</th>-->
                                <th style="color: #fff">Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($pacientes)<=0) <tr>
                                    <td colspan="5">No hay registros de pacientes.</td>
                                    </tr>
                                    @else
                                    @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td>{{ $paciente->no_expediente}}</td>
                                        <td>{{ $paciente->Nombre_1." ".$paciente->Nombre_2 }}</td>
                                        <td>{{ $paciente->Apellido_1." ".$paciente->Apellido_2 }}</td>
                                        <td>{{ $paciente->Direccion }}</td>
                                        <td>{{ $paciente->Celular_1 }}</td>
                                        <!--
                                        <td><select name="dowpdown" class="btn btn-warning">
                                                <option value="1">Activo</option>
                                                <option value="2">Inactivo</option>
                                            </select></td>
                                        -->
                                            
                                        <td>
                                            <div class="btn-group" roel="group" aria-lavel="Basic exame">

                                                <!--Boton de Crear-->
                                                <a href="{{route('expediente.create',$paciente->id_Paciente)}}"class="btn btn-primary"><i class="fas fa-address-book"></i></a>
                                                <!--Boton de Editar-->
                                                <a href="{{route('expediente.edit',$paciente->id_Paciente)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                            <div class="pagination justify-content-end">
                                {{ $pacientes->links() }}
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection