<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="luismec90@gmail.com">
        <link href="{{ asset('assets/images/general/favicon.png') }}" rel="icon" type="image/x-icon">

        <title>
            @section('title')
            App
            @show
        </title>
        {{ HTML::style('assets/libs/animate/animate.css') }}
        {{-- HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') --}}
        {{-- HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') --}}
        {{ HTML::style('assets/libs/jqueryui/jquery-ui.min.css') }}
        {{ HTML::style('assets/themes/one/css/template.css') }}
        {{ HTML::style('assets/themes/one/css/main.css') }}

        @section('css')
        @show

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="page">
            @include('shops.layouts.partials.header')

            <main id="main" class="site-main">
                <div id="contenedor" class="container">
                @yield('content')
                </div>
            </main>

            @include('layouts.partials.footer')
        </div>

        <div class="scroll-to-top" data-spy="affix" data-offset-top="200">
            <a href="#page" class="smooth-scroll"><i class="fa fa-arrow-up"></i></a>
        </div>

        {{ HTML::script('//code.jquery.com/jquery-2.1.1.min.js') }}
        {{ HTML::script('assets/libs/jqueryui/jquery-ui.min.js') }}
        {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/jquery.isotope.min.js?v=1.5.26') }}
        {{ HTML::script('assets/js/jquery.singlePageNav.min.js') }}
        {{ HTML::script('assets/libs/bootstrap-growl/bootstrap-growl.min.js') }}
        {{ HTML::script('assets/themes/one/js/localization.js') }}
        {{ HTML::script('assets/themes/one/js/main.js') }}

        @section('js')
        @show

        @include('layouts.partials.notify');
    </body>
</html>