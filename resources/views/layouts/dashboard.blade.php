<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/dist/assets/images/logo.png" type="image/x-icon">
    <title>@yield('title')</title>

    @stack('prepend-style')

    @include('includes.dashboard.style')
    
    @stack('addon-style')

</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
            @include('includes.dashboard.sidebar')
        <div id="main">
            @include("includes.dashboard.navbar")
            
            @yield('content')
    <div class="main-content container-fluid">
        @include("includes.dashboard.footer")
    </div>

        </div>
    </div>

    @stack('prepend-script')

    @include('includes.dashboard.script')
    
    @stack('addon-script')
</body>

</html>