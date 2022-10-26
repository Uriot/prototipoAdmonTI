<style>
    thead tr th {
        background-color: #000000;
        color: #ffffff;
    }
</style>

<table>
    <thead>
    <tr>
        <th>Expediente</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Estado Civil</th>
        <th>DPI</th>
        <th>Estado DPI</th>
        <th>Fecha de Vencimiento</th>
        <th>IGSS</th>
        <th>Nacionalidad</th>
        <th>Edad</th>
        <th>Genero</th>
        <th>Fecha de Nacimiento</th>
        <th>Estado De Paciente</th>
        <th>Religion</th>
        <th>Direccion</th>
        <th>Zona</th>
        <th>Colonia/Barrio/Aldea</th>
        <th>Municipio</th>
        <th>Referencia de Vivienda</th>
        <th>Telefono de Casa</th>
        <th>Celular 1</th>
        <th>Celular 2</th>
        <th>Familiar Responable</th>
    </tr>
    </thead>
    <tbody>
    @foreach($patients as $patient)
        @if ($dpi == false && $patient->dpi->ESTADO_DPI != 'Vigente')
            <?php continue; ?>
        @endif
        <tr>
            <td>{{ $patient->no_expediente }}</td>
            <td>{{ $patient->Nombre_1 }} {{ $patient->Nombre_2 }} {{ $patient->Nombre_3 }}</td>
            <td>{{ $patient->Apellido_1 }} {{ $patient->Apellido_2 }} {{$patient->Apellido_de_Casada}}</td>
            <td>{{ $patient->Estado_Civil }}</td>
            <td>{{ $patient->dpi->DPI }}</td>
            <td>{{ $patient->dpi->ESTADO_DPI }}</td>
            <td>{{ $patient->dpi->FECHA_VENCIMIENTO  }}</td>
            <td>{{ $patient->Acceso_al_Igss ?? 'No' }}</td>
            <td>{{ $patient->Nacionalidad }}</td>
            <td>{{ $patient->Edad }}</td>
            <td>{{ $patient->Genero }}</td>
            <td>{{ $patient->Fecha_Nacimiento }}</td>
            <td>{{ $patient->Estado_de_Paciente }}</td>
            <td>{{ $patient->Religion }}</td>
            <td>{{ $patient->Direccion }}</td>
            <td>{{ $patient->Zona }}</td>
            <td>{{ $patient->Colonia_Barrio_Aldea }}</td>
            <td>{{ $patient->Municipio }}</td>
            <td>{{ $patient->Referencia_Vivienda }}</td>
            <td>{{ $patient->Telefono_Casa }}</td>
            <td>{{ $patient->Celular_1 }}</td>
            <td>{{ $patient->Celular_2 }}</td>
            <td>{{ $patient->Familiar_Responsable }}</td>
        </tr>
    @endforeach
    </tbody>
</table>