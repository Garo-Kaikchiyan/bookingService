<!DOCTYPE html>
<html>
    <head>
        <title>smartOffice</title>
        <link href="{{asset("/css/main.css")}}" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <header>
            <h3 onclick="window.location='/'"> smartOffice </h3>
            @if(isset($page))
            <nav>
                <button onclick="window.location='/regEmployee'" class={{$page == 'regEmployee' ? 'selected': ''}}>Register Employee</button>
                <button onclick="window.location='/regOffice'" class={{$page == 'regOffice' ? 'selected': ''}}>Register Office</button>
                <button onclick="window.location='/offices'" class={{$page == 'booking' ? 'selected': ''}}>Book Seat</button>
            </nav>
            @endif
        </header>
        @yield('main')
        <footer>
            <p>by Garo Kaikchiyan</p>
        </footer>
    </body>
</html>