document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('asistencia');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
  });