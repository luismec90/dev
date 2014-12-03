@extends('layouts.default') 

@section('css')
    {{ HTML::style('assets/libs/select2/select2.css') }}
    {{ HTML::style('assets/libs/select2/select2-bootstrap.css') }}
@stop

@section('js')
    {{ HTML::script('assets/libs/select2/select2.js') }}
    {{ HTML::script('assets/js/search.js') }}
@stop



@section('content')

<section class="section section-center section-cta">
    <div class="container">
        <h2 class="section-title"><span>Listo para comenzar?</span></h2>

        <p>LinkingShops es una plataforma para la fidelización de clientes y generación de nuevos compradores <br> através de alianzas entre establecimientos comerciales de todos los sectores.

        </p>
        <div class="main-action row text-center">
         <div class="col-md-3 col-md-offset-3"><a href="{{ route('home_buyer_path') }}" class="smooth-scroll btn btn-lg btn-block btn-danger">Personas</a></div>
         <div class="col-md-3 col-sm-4"><a href="{{ route('home_shops_path') }}" class="smooth-scroll btn btn-lg btn-block btn-default">Establecimientos</a></div>
        </div>
    </div>
</section>

<!--<section id="features" class="section section-center section-hilite section-features">
    <div class="container">
        <h2 class="section-title"><span>Como funciona?</span></h2>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/payment4.png') }}" alt=""></div>
                <h4>Puntos</h4>
                <p>Por cada compra que realices<br> en nuestros establecimientos recibirás<br> saldo a tu favor para compras futuras.</p> 
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-bag-flat.png') }}" alt=""></div>
                <h4>Comprando</h4>
                <p>A través de nuestra página encontrarás <br> productos y servicios de todo tipo, incluyendo<br>  comidas y vestuario a tu gusto.</p> 
            </div>
             los mismos establecimientos
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/offer.png') }}" alt=""></div>
                <h4>Descuentos</h4>
                <p>Con LinkingShops obtendrás <br>descuentos exclusivos al comprar <br> en las tiendas de nuestra red.</p>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-ticket-flat.png') }}" alt=""></div>
                <h4>Tiendas</h4>
                <p>Conoce nuestra red de tiendas <br>con sus alianzas, promociones y localización. </p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-delivery-flat.png') }}" alt=""></div>
                <h4>A domicilio</h4>
                <p>Podrás ordernar a domicilio <br>en las tiendas afiliadas que presten el servicio. </p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-comments-flat.png') }}" alt=""></div>
                <h4>Valoraciones</h4>
                <p>Compra los mejores productos,<br> conociendo la opinión de los demás usuarios<br>acerca de sus compras y valora también<br>tus productos preferidos.</p>
            </div>
        </div>
    </div>
</div>
</section>


<section id="testimonials" class="section section-center section-testimonial">
    <div class="container">
        <h2 class="section-title"><span>Que opinan los usuarios?</span></h2>
        <i class="fa fa-quote-left fa-3x"></i>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <blockquote>
                        <p>Excelente idea, espero que se sigan afliliando más tiendas </p>
                        <small> <cite title="Source Title">Alejandro Montoya</cite></small>
                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                         <p>Es genial que me devuelvan dinero para compras futuras </p>
                        <small> <cite title="Source Title">Juan Diego Girldo</cite></small>
                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                         <p>Suscribirme a las tiendas me ha permitido conocer las mejores promociones </p>
                        <small> <cite title="Source Title">Andres Pineda</cite></small>
                    </blockquote>
                </div>
            </div>

            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><img src="{{ asset('assets/images/avatar-1.png') }}" width="64" height="64" alt="" class="img-circle"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"><img src="{{ asset('assets/images/avatar-2.png') }}" width="64" height="64" alt="" class="img-circle"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"><img src="{{ asset('assets/images/avatar-3.png') }}" width="64" height="64" alt="" class="img-circle"></li>
            </ol>
        </div>
    </div>
</section>-->



@stop
