@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Vista Reporte</h3>
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
                            <a class="btn btn-danger" href="#"><i class="fa fa-file-pdf-o"></i>PDF</a>
                            <a class="btn btn-success" href="#"><i class="fa fa-file-excel-o"></i>XLSX</a>

                            <form action="{{route('reports.patients')}}" method="get" class="form-inline my-2 my-lg-0 float-right">
                                <input name="texto" class="form-control mr-sm-2" type="text" placeholder="Ingrese Campo" aria-label="Search">
                                <button class="btn btn btn-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Buscar</button>
                            </form>
                        </div>
                        <br>
                        <table class="table table-striped mt-2">
                            <thead style="background-color: #6777ef">
                                <th style="display: none">ID</th>
                                <th style="color: #fff">Expediente</th>
                                <th style="color: #fff">Nombre</th>
                                <th style="color: #fff">Apellido</th>
                                <th style="color: #fff">Dirección</th>
                                <th style="color: #fff">Telefono</th>
                            </thead>
                            {{-- <tbody>
                                @if (count($pacientes)<=0) <tr>
                                    <td colspan="5">No hay registros de pacientes.</td>
                                    </tr>
                                    @else
                                    @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td style="display: none">{{ $paciente->id_Paciente }}</td>
                                        <td>{{ $paciente->no_expediente}}</td>
                                        <td>{{ $paciente->Nombre_1." ".$paciente->Nombre_2 }}</td>
                                        <td>{{ $paciente->Apellido_1." ".$paciente->Apellido_2 }}</td>
                                        <td>{{ $paciente->Direccion }}</td>
                                        <td>{{ $paciente->Celular_1 }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                            <div class="pagination justify-content-end">
                                {{ $pacientes->links() }}
                            </div> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection