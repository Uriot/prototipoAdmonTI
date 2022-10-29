<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/users">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link" href="/roles">

        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    <a class="nav-link" href="/pacientes">
        <i class="fas fa-user-injured"></i><span>Pacientes</span>

    </a>
    <a class="nav-link" href={{ route('reports.patients') }}>
        <i class="fa fa-list" ></i><span>Reporte Pacientes</span>
    <a class="nav-link" href="/expediente">
        <i class="fas fa-user-edit"></i><span>Expediente</span>
    </a>
</li>