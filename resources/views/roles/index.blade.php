@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- @can('crear-rol') --}}
                                <div class="pull-right">
                                    <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>
                                </div>
                            {{-- @endcan --}}
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Rol</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                {{-- @can('editar-rol') --}}
                                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                                {{-- @endcan --}}

                                                {{-- @can('eliminar-rol') --}}
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) }}
                                                        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
                                                {{-- @endcan --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {{ $roles->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection