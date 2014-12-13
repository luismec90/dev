<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Broken - 404 Error Page</title>

        <!-- Load Lato font from Google Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>

        <!-- Force mobile devices to turn fullscreen mode -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Stylesheet assets -->
        <link rel="stylesheet" href="{{  asset('assets/errors/404/css/reset.css') }}">
	    <link rel="stylesheet" href="{{  asset('assets/errors/404/css/skeleton.css') }}">
        <!-- /Stylesheet assets -->

        <!-- Template stylesheet -->
        <link href=" {{ asset('assets/errors/404/css/style.css') }}" rel="stylesheet">
        <!-- /Template stylesheet -->

        <!-- Color scheme stylesheet -->
        <link href=" {{ asset('assets/errors/404/css/colors-blue.css') }}" rel="stylesheet" id="color_stylesheet">


    </head>

    <!-- Body has to have "broken-animated" or "broken-static" class to do the magic -->
    <body class="broken-animated">
        <div class="container">

            <!-- /HEADER -->


            <!-- /NAVIGATION -->


            <!-- ADDITIONAL MESSAGE -->
            <div id="message">
                <p class="ultrabold">OOPS!</p>
                <p>Página no encontrada<br><br>
                <a href="{{ route('home') }}" style="display: inline-block; margin-bottom: 0; font-weight: 400; text-align: center; vertical-align: middle; cursor: pointer; background-image: none; border: 1px solid transparent; white-space: nowrap; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; border-radius: 4px; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; color: #fff; background-color: #e74c3c; border-color: #e74c3c; text-decoration: none; font-size:30px">LLevame a casa!</a>
                </p>
            </div>
            <!-- /ADDITIONAL MESSAGE -->

            <!-- ERROR MESSAGE -->
            <h1 id="error">
                <span id="error-code">404</span>
                <span id="error-text">NOT<br>FOUND</span>
            </h1>
            <!-- /ERROR MESSAGE -->

        </div>
    </body>
</html>