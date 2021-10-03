<!DOCTYPE html>
<html>
    <head>
        <title>smartOffice</title>
        <link href="{{asset("/css/mainLayout.css")}}" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <header>
            <h3>smartOffice</h3>
            <nav>
                <button onclick="window.location='/regEmployee'" class="selected">Register Employee</button>
                <button onclick="window.location='/regOffice'">Register Office</button>
                <button onclick="window.location='/offices'">Book Seat</button>
            </nav>
        </header>
        @yield('main')
        <footer>
            <p>by Garo Kaikchiyan</p>
        </footer>
    </body>
</html>