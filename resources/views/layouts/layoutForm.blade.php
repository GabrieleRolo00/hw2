<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        @yield('css')

        <!-- ICONE -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        @yield('script')
        

        <title>@yield('title')</title>  

    </head>
    <body> 
        

        <div class="container">

           
            @yield('alert')

            @yield('form')
            
        </div>

        
    </body>
</html>