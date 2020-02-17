<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Welcome to {{ $accountName }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />

    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
    <script src='fullcalendar/timegrid/main.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'timeGrid' ],
            defaultView: 'timeGridWeek'
        });

        calendar.render();
      });

    </script>

    <meta name="theme-color" content="#fafafa">
</head>

<body>
  <p>Welcome to <strong>{{ $accountName }}!</strong>.</p>

  <p>A bunch of text here that talks about selecting a date and time for the business need.</p>
  
  <div id="calendar"></div>

</body>

</html>

