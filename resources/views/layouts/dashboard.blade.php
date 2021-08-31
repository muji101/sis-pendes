<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @stack('prepend-style')

    @include('includes.dashboard.style')
    
    @stack('addon-style')

</head>

<body>
    <div id="app">
            @include('includes.dashboard.sidebar')
        <div id="main">
            @include("includes.dashboard.navbar")
            
            @yield('content')

            @include("includes.dashboard.footer")
        </div>
    </div>

    @stack('prepend-script')

    @include('includes.dashboard.script')
    
    @stack('addon-script')
</body>

</html>