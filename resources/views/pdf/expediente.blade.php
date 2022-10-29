<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .titulo {
            text-align: center;
            font: 2rem;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="titulo">
        <h1>Expediente de Paciente</h1>
    </div>
    <p><b>Nombre: </b>{{$paciente->Nombre_1}}</p>
    <p><b>Apellido: </b>{{$paciente->Apellido_1}}</p>
    <p><b>Estado Civil: </b>{{$paciente->Estado_Civil}}</p>
    <p><b>DPI: </b>{{$paciente->idDatos_DPI}}</p>
    <p><b>Edad (años): </b>{{$paciente->Edad}}</p>
    <p><b>Género: </b>{{$paciente->Genero}}</p>
</body>
</html>