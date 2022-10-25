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
                        <!-- @can('crear-expediente')  -->
                        <!-- @endcan -->
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('expedientes.create') }}">Nuevo</a>
                            <form action="{{route('expedientes.index')}}" method="get" class="form-inline my-2 my-lg-0 float-right">
                                <input name="texto" class="form-control mr-sm-2" type="text" placeholder="Ingrese Nombre Paciente" aria-label="Search">
                                <button class="btn btn btn-info my-2 my-sm-0" type="submit">Buscar Expediente</button>
                            </form>
                        </div>
                        <br>
                        <table class="table table-striped mt-2">
                            <thead style="background-color: #6777ef">
                                <th style="display: none">ID</th>
                                <th style="color: #fff">Nombre</th>
                                <th style="color: #fff">Apellido</th>
                                <th style="color: #fff">DPI</th>
                                <th style="color: #fff">Sector Publico</th>
                                <th style="color: #fff">Sector Privado</th>
                                <th style="color: #fff">Total Nucleo</th>
                                <th style="color: #fff">Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($expedientes)<=0) <tr>
                                    <td colspan="5">No hay registros de expedientes.</td>
                                    </tr>
                                    @else
                                    @foreach ($expedientes as $expediente)
                                    <tr>
                                        <td style="display: none">{{ $expediente->id_Expedientes }}</td>
                                        <td>{{ $expediente->Nombre_1." ".$expediente->Nombre_2 }}</td>
                                        <td>{{ $expediente->Apellido_1." ".$expediente->Apellido_2 }}</td>
                                        <td>{{ $expediente->DPI }}</td>
                                        <td>{{ $expediente->sector_publico }}</td>
                                        <td>{{ $expediente->sector_privado }}</td>
                                        <td>{{ $expediente->total_nucleo_familiar }}</td>
                                            <div class="btn-group" roel="group" aria-lavel="Basic exame">
                                                <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('expedientes.edit', $expediente->id_Expedientes) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection