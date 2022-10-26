<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            border: 1px solid #000;
            width: 100%;
            color: inherit;
            margin-bottom: 1rem;
            text-indent: initial;
            border-spacing: 2px;
            border-color: grey;
        }
        thead {
            background-color: #6777ef;
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }

        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }

        th {
            text-align: center;
        }
        td {
            text-align: center;
        }
        th, td {
            border: solid 0.5px #000;
            border-collapse: collapse;

        }

        </style>
</head>
<body>
    <header>
        <img src="https://assets.isu.pub/document-structure/211001183401-548b00c800c629e0914cc4d7c6ada899/v1/c02fe897b24f9531407087cbbf8de3a4.jpeg"  width="200" alt="logo">
        <h1>Reporte de Pacientes</h1>
    </header>

    <table class="table table-striped mt-2">
        <thead style="background-color: #6777ef">
            <th style="color: #fff">Expediente</th>
            <th style="color: #fff">Nombre</th>
            <th style="color: #fff">Apellido</th>
            <th style="color: #fff">Apellido Casada</th>
            <th style="color: #fff">Edad</th>
            <th style="color: #fff">Estado Civil</th>
            <th style="color: #fff">DPI</th>
            <th style="color: #fff">Estado DPI</th>
            <th style="color: #fff">IGSS</th>
            <th style="color: #fff">Nacionalidad</th>
            <th style="color: #fff">Dirección</th>
            <th style="color: #fff">Zona</th>
            <th style="color: #fff">Telefono</th>

        </thead>
        <tbody>
            @if (count($patients)<=0) <tr>
                <td colspan="5">No hay registros de pacientes.</td>
                </tr>
                @else
                @foreach ($patients as $patient)
                @if ($dpi == false && $patient->dpi->ESTADO_DPI != 'Vigente')
                    <?php continue; ?>
                @endif
                <tr>
                    <td>{{$patient->no_expediente}}</td>
                    <td>{{ $patient->Nombre_1." ".$patient->Nombre_2 }}</td>
                    <td>{{ $patient->Apellido_1." ".$patient->Apellido_2 ?? ''}}</td>
                    <td>{{ $patient->Apellido_de_Casada ?? 'N/A' }}</td>
                    <td>{{ $patient->Edad }}</td>
                    <td>{{ $patient->Estado_Civil }}</td>
                    <td>{{ $patient->dpi->DPI }}</td>
                    <td>{{ $patient->dpi->ESTADO_DPI }}</td>
                    <td>{{ $patient->Acceso_al_Igss ?? 'N/D'}}</td>
                    <td>{{ $patient->Nacionalidad }}</td>
                    <td>{{ $patient->Direccion }}</td>
                    <td>{{ $patient->Zona }}</td>
                    <td>{{ $patient->Celular_1 }}</td>

                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>