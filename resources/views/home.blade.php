@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5 class="m-b-20">Usuarios</h5>
                                            @php
                                                $users = DB::table('users')->count();
                                            @endphp
                                            <h2 class="text-right"><i class="fas fa-users f-left"></i><span>{{ $users }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                                <h5 class="m-b-20">Roles</h5>
                                                @php
                                                    $roles = DB::table('roles')->count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-user-lock f-left"></i><span>{{ $roles }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5 class="m-b-20">Pacientes</h5>
                                                @php
                                                    $pacientes = DB::table('tb_paciente')->count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-user-injured f-left"></i><span>{{ $pacientes }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/pacientes" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>  
                                    {{-- <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5 class="m-b-20">Asistencia</h5>
                                                @php
                                                    $pacientes = DB::table('pacientes')->count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-user-injured f-left"></i><span>{{ $pacientes }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/pacientes" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

