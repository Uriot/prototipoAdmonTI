@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pacientes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-patient')
                                <div class="pull-right">
                                    <a class="btn btn-outline-warning" href="{{ route('patients.create') }}">Nuevo</a>                                </div>
                                <div class="d-md-flex justify-content-md-end">
                                    <input type="text" name="busqueda" class="form-control">
                                    <input type="submit" value="Buscar Paciente" class="btn btn-info">
                                </div>
                                <br>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef" >
                                    <th style="display: none" >ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Apellidos</th>
                                    <th style="color: #fff">DPI</th>
                                    <th style="color: #fff">Dirección</th>
                                    <th style="color: #fff">Telefono</th>
                                    <th style="color: #fff">Estado</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td style="display: none">{{ $patient->id }}</td>
                                            <td>{{ $patient->nombre_1 }}</td>
                                            <td>{{ $patient->apellido_1 }}</td>
                                            <td>{{ $patient->dpi }}</td>
                                            <td>{{ $patient->direccion }}</td>
                                            <td>{{ $patient->telefono }}</td>
                                            <td><select name="dowpdown" class="btn btn-warning">
                                                <option value="1">Activo</option>
                                                <option value="2">Inactivo</option>
                                              </select></td>

                                            <td>
                                                @can('editar-patient')
                                                    <a class="btn btn-primary" href="{{ route('patients.edit', $patient->id) }}">Editar</a>
                                                @endcan

                                                @csrf
                                                @can('borrar-patient')
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id], 'style' => 'display:inline']) }}
                                                        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
                                                @endcan
                                                </td>
                                        </tr>
                                    @endforeach
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