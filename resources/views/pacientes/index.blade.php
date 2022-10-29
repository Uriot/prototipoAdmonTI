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
                        <!-- Comentar linea 14 y 22 para pruebas porque son permisos -->
                        <!-- @can('crear-paciente')  -->
                        <!-- @endcan -->
                        <div class="pull-right">
                            <a class="btn btn-warning" href="{{ route('pacientes.create') }}">Nuevo</a>
                            <form action="{{route('pacientes.index')}}" method="get" class="form-inline my-2 my-lg-0 float-right">
                                <input name="texto" class="form-control mr-sm-2" type="text" placeholder="Ingrese Paciente" aria-label="Search">
                                <button class="btn btn btn-info my-2 my-sm-0" type="submit">Buscar Paciente</button>
                            </form>
                        </div>
                        <br>
                        <table class="table table-striped mt-2">
                            <thead style="background-color: #6777ef">
                                <th style="display: none">ID</th>
                                <th style="color: #fff">Nombre</th>
                                <th style="color: #fff">Apellido</th>
                                <th style="color: #fff">Dirección</th>
                                <th style="color: #fff">Telefono</th>
                                <th style="color: #fff">Estado</th>
                                <th style="color: #fff">Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($pacientes)<=0) <tr>
                                    <td colspan="5">No hay registros de pacientes.</td>
                                    </tr>
                                    @else
                                    @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td style="display: none">{{ $paciente->id_Paciente }}</td>
                                        <td>{{ $paciente->Nombre_1." ".$paciente->Nombre_2 }}</td>
                                        <td>{{ $paciente->Apellido_1." ".$paciente->Apellido_2 }}</td>
                                        <td>{{ $paciente->Direccion }}</td>
                                        <td>{{ $paciente->Celular_1 }}</td>
                                        <td><select name="estadosUpdate" id="estadosUpdate" onchange="myFunction(this.value,  <?=$paciente->id_Paciente?>)" class="btn btn-warning">
                                            @foreach ($estados as $estado)
                                            <option value="{{$estado->id}}" {{$estado->id== $paciente->id_estado_paciente? 'selected' : ''}}>{{$estado->nombre}}</option>
                                            @endforeach
                                            </select></td>
                                        <td>
                                            <div class="btn-group" roel="group" aria-lavel="Basic exame">
                                                <a href="{{ '/reportes/paciente/expediente/' . $paciente->id_Paciente }}" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                                                <a href="{{ route('pacientes.show', $paciente->id_Paciente) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('pacientes.edit', $paciente->id_Paciente) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="" class="btn btn-danger" onclick="myFunction(0,  <?=$paciente->id_Paciente?>)"><i class="fas fa-trash"></i></a>
                                                {{-- <a href="{{ route('asistencia.show', $paciente->id_Paciente) }}"  class="btn btn-success"><i class="fas fa-vote-yea"></i></a> --}}
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

@section('scripts')
<script>

    function myFunction(estado, id) {
        $.getJSON(`updateState/paciente/${id}/estado/${estado}`, function(response) {
            console.log(response)

         })
    }


    //   document.getElementById('estadosUpdate').addEventListener('change', (e) => {
    //     const id_estado = e.target.value;
    //     console.log(id_estado)
    //     $.getJSON(`updateState/${id_estado}`, function(response) {
    //         console.log(response)
    //     //     let htmlOptionsMunicipios = '';
    //     //     municipiosData.length === 0 ? htmlOptionsMunicipios += `<option value="">no hay municipios disponibles</option>` :
    //     //         municipiosData.forEach(function(datamunicipiosoptions) {
    //     //             htmlOptionsMunicipios += `<option value="${datamunicipiosoptions.ID_MUNICIPIO}">${datamunicipiosoptions.MUNICIPIO}</option>`
    //     //         })

    //     //     $("#muniOrigen").html(htmlOptionsMunicipios);
    //      })
    // })
</script>
@endsection