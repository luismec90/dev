<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="luismec90@gmail.com">
        <link href="{{ asset('assets/images/favicon.png') }}" rel="icon" type="image/x-icon">

        <title>
            @section('title')
            {{ $shop->name }}
            @show
        </title>
        {{ HTML::style('assets/libs/animate/animate.css') }}
        {{-- HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') --}}
        {{-- HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') --}}
        {{ HTML::style('assets/libs/jqueryui/jquery-ui.min.css') }}
        {{ HTML::style('assets/themes/one/css/template.css') }}

        @if(Auth::check() && Auth::user()->isAdmin($shop->id))
            {{ HTML::style('assets/libs/bootstrap-tour/css/bootstrap-tour.min.css') }}
        @endif

        {{ HTML::style('assets/themes/one/css/main.css') }}

        @section('css')
        @show

        <!--Start of Zopim Live Chat Script-->
        <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='//v2.zopim.com/?1bQj93EplCgGfGp7KyfkACpk2TFXEiXC';z.t=+new Date;$.
        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
        </script>

        <!--End of Zopim Live Chat Script-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="page">
            @include('layouts.partials.header')

            <main id="main" class="site-main">
                <div id="contenedor" class="container">

                @include('shops.layouts.partials.title_page',['showTour'=>true])

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
        {{ HTML::script('assets/libs/bootstrap-growl/bootstrap-growl.min.js') }}

        @if(Auth::check() && Auth::user()->isAdmin($shop->id))
            {{ HTML::script('assets/libs/bootstrap-tour/js/bootstrap-tour.min.js') }}
            {{ HTML::script('assets/themes/one/js/tour.js') }}
        @endif

        {{ HTML::script('assets/themes/one/js/main.js') }}
         @if(Session::has('new_shop'))
             <script>
             $(function () {
                $("#modal-help").modal();
             });
             </script>
         @endif
        @section('js')
        @show

        @include('layouts.partials.notify')
        @include('shops.layouts.partials.modal_info_usuario')
        @include('shops.layouts.partials.modal_help')
    </body>
</html>