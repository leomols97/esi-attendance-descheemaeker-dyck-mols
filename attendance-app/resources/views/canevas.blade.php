<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <img id="logo" src="/img/he2b-esi.jpg" alt="HE2B-ESI"/>
        <h1>PRJG5 - Attendance</h1>
        <ul>
            <li><a href="/student">Student List</a></li>
            <li><a href="/course">Course List</a></li>
        </ul>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>