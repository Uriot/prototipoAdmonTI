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
                                    <a class="btn btn-outline-warning" href="{{ route('patients.create') }}">Nuevo</a>
                                    <form action="{{route('patients.index')}}" method="get" class="form-inline my-2 my-lg-0 float-right">
                                        <input name="texto" class="form-control mr-sm-2" type="text" placeholder="Ingrese Paciente" aria-label="Search">
                                        <button class="btn btn btn-info my-2 my-sm-0" type="submit">Buscar Paciente</button>
                                    </form>                                
                                </div>
                                <br>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef" >
                                    <th style="display: none" >ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Apellido</th>
                                    <th style="color: #fff">Dirección</th>
                                    <th style="color: #fff">Telefono</th>
                                    <th style="color: #fff">Estado</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @if(count($patients)<=0)
                                        <tr>
                                            <td colspan="5">¡El paciente no existe!</td>
                                        </tr>
                                    @else   
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td style="display: none">{{ $patient->id }}</td>
                                            <td>{{ $patient->nombre_1." ".$patient->nombre_2 }}</td>
                                            <td>{{ $patient->apellido_1." ".$patient->apellido_2 }}</td>
                                            <td>{{ $patient->direccion }}</td>
                                            <td>{{ $patient->telefono }}</td>
                                            <td><select name="dowpdown" class="btn btn-warning">
                                                <option value="1">Activo</option>
                                                <option value="2">Inactivo</option>
                                              </select></td>
                                            <td>
                                                <div class="btn-group" roel="group" aria-lavel="Basic exame">
                                                    <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                                </td>
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