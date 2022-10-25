@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Reporte de Pacientes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-8 align-items-start">
                                    <form action="{{route('reports.patients')}}" method="get" class="form-inline my-2 my-lg-0 center">
                                        <h5 class="mr-2">Filtros:</h5>
                                        <input name="filter[]" class="form-control mr-2" type="number" placeholder="Desde Edad" aria-label="Search">
                                        <input name="filter[]" class="form-control mr-2" type="number" placeholder="Hasta Edad" aria-label="Search">
                                        <input name="filter[]" class="form-control mr-2" type="text" placeholder="Nombre o expediente" aria-label="Search">
                                        <label class="mr-2"><input name="filter[]" class="form-control mr-2" type="checkbox"  id="dpi" value="true" aria-label="Search"> DPI vencido </label>
                                        <button class="btn btn btn-info my-2 my-sm-0 mr-2" type="submit"><i class="fa fa-search"></i>Buscar</button>
                                    </form>
                                </div>
                                <div class="col align-items-end">
                                    <a class="btn btn-danger mr-2" href="#"><i class="fa fa-file-pdf-o"></i>PDF</a>
                                    <a class="btn btn-success mr-2" href="#"><i class="fa fa-file-excel-o"></i>XLSX</a>
                                </div>
                            </div>
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
                                <th style="color: #fff">Edad</th>
                            </thead>
                            <tbody>
                                @if (count($patients)<=0) <tr>
                                    <td colspan="5">No hay registros de pacientes.</td>
                                    </tr>
                                    @else
                                    @foreach ($patients as $patient)
                                    <tr>
                                        <td style="display: none">{{ $patient->id_Paciente }}</td>
                                        <td>{{ $patient->no_expediente}}</td>
                                        <td>{{ $patient->Nombre_1." ".$patient->Nombre_2 }}</td>
                                        <td>{{ $patient->Apellido_1." ".$patient->Apellido_2 }}</td>
                                        <td>{{ $patient->Direccion }}</td>
                                        <td>{{ $patient->Celular_1 }}</td>
                                        <td>{{ $patient->Edad }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                            <div class="pagination justify-content-end">
                                {{ $patients->links() }}
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection