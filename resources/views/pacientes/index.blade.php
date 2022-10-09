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
                            <!-- @can('crear-paciente') -->
                                <div class="pull-right">
                                    <a class="btn btn-warning" href="{{ route('pacientes.create') }}">Nuevo</a>
                                </div>
                            <!-- @endcan -->
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef" >
                                    <th style="display: none" >ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Apellido</th>
                                    <th style="color: #fff">Fecha Ingreso</th>
                                    <th style="color: #fff">Estado</th>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td style="display: none">{{ $paciente->id }}</td>
                                            <td>{{ $paciente->name }}</td>
                                            <td>{{ $paciente->email }}</td>
                                            <td>{{ $paciente->content }}</td>
                                            <td>
                                                @can('editar-paciente')
                                                    <a class="btn btn-primary" href="{{ route('pacientes.edit', $paciente->id) }}">Activo</a>
                                                @endcan

                                                @can('eliminar-paciente')
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['pacientes.destroy', $paciente->id], 'style' => 'display:inline']) }}
                                                        {{ Form::submit('Inactivo', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
                                                @endcan
                                    @endforeach
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
