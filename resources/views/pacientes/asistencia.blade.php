<!DOCTYPE html>
<html>

<head>
    <title>Calendario de Asistencias</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/locale/es.js'></script>

    @yield('page_css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
    @yield('page_css')

    @yield('css')
</head>

<body class="bg-light">

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto" action="#">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"> </a></li>
                    </ul>
                </form>
                <div>
                    <a href="{{ route('pacientes.index') }}" class="nav-link nav-link-lg nav-link-user">

                        <div class="d-sm-none d-lg-inline-block">
                            <i class="fa-solid fa-chevron-left"></i> REGRESAR
                        </div>
                    </a>
                </div>

            </nav>
            <div class="main-content pl-0 px-1">

                <div class="container container2 pt-3 px-0">

                    <h1 class="text-left py-3 " style="color:#6c757d;">Calendario de Asistencias </h1>


                    <div class="row">
                        <div class=" col-md-9 col-sm-12 calendarDiv order-2">

                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-3 col-sm-12 cardDiv order-1 ">
                            <div class="row">
                                <div class="col">

                                    <div class="card rounded-0 shadow">
                                        <div class="card-header bg-gradient bg-primary text-light">
                                            <h5 class="card-title">Asignar asistencia</h5>
                                        </div>
                                        {{ Form::model($id_Paciente, ['method' => 'PUT', 'route' => ['asistencia.update', $id_Paciente]]) }}
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <input type="hidden" value="{{ $id_Paciente }}" name="id_Paciente"
                                                    id="id_Paciente">


                                                <div class="form-group mb-2">
                                                    <label for="start_datetime" class="control-label">Fecha y
                                                        hora</label>
                                                    <input type="datetime-local"
                                                        class="form-control form-control-sm rounded-0"
                                                        name="start_datetime" id="start_datetime" required>
                                                </div>

                                                <div class="form-group mb-2">
                                                    <label for="description" class="control-label">Observación</label>
                                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-sm rounded-0" type="submit"><i
                                                        class="fa fa-save"></i> Guardar</button>
                                                <button class="btn btn-default border btn-sm rounded-0"
                                                    type="reset"><i class="fa fa-reset"></i> Cancelar</button>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            const eventos = @json($events);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#calendar').fullCalendar({

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                locale: 'es',
                events: eventos,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {

                },
                editable: false,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },

                eventClick: null
            });

        });
    </script>

</body>

</html>
