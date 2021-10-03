<!DOCTYPE html>
<head>
</head>
<body>
    @foreach ($office_seats as $seat)
        <article> {{$seat->name}}  </a></article>
    @endforeach
</body>