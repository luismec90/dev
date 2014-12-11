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

<section id="home">
			<div class="headerwrap">
				<div class="container">
					<div class="row text-center">
						<div class="col-lg-12">
							<h1>Welcome To <b>Bootstack</b></h1>
							<h3>Show your product with confidence.</h3>
							<br>
						</div>

						<div class="col-lg-2 hidden-xs hidden-sm hidden-md">
							<h5>Automate business processes</h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							<img src="http://demo.danielyewright.com/bootstack/assets/img/arrow-left.png" alt="">
						</div>
						<div class="col-lg-8">
							<img class="img-responsive" src="{{ asset('assets/images/app-bg.png') }}" alt="">
							<!--<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
							<a href="#features" type="submit" class="btn btn-lg btn-theme smoothScroll">LEARN MORE</a>-->
						</div>
						<div class="col-lg-2 hidden-xs hidden-sm hidden-md">
							<br>
							<img class="pad-top" src="http://demo.danielyewright.com/bootstack/assets/img/arrow-right.png" alt="">
							<h5>Collaborate in the cloud</h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
				</div> <!-- /container -->
			</div><!-- /headerwrap -->



		</section>

<!--<div class="main-text hidden-xs">
    <div class="col-md-12 text-center">
        <h1> El primer sistema masivo de fidelización de clientes a través de puntos</h1>
    </div>
</div>-->

<section class="section section-center section-cta">
    <div class="container">
        <h2 class="section-title"><span>Estás listo para llevar tu establecimiento a la Web?</span></h2>
        <p>LinkingShops perimite es una plataforma para la fidelización de clientes y a atracción de nuevos compradores <br> através de alianzas entre establecimientos comerciales de todos los sectores.</p>
        <div class="main-action row text-center ">
            <div class="col-xs-12 text-center"><a href="{{ route('register_path') }}" class="smooth-scroll btn btn-lg btn-danger">Registrate de forma gratuita</a></div>
        </div>
    </div>
</section>

<section id="features" class="section section-center section-hilite section-features">
    <div class="container">
        <h2 class="section-title"><span>Como funciona?</span></h2>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/alliances.png') }}" alt=""></div>
                <!--                <h4>Tiendas</h4>
                                <p>Conoce nuestra red de tiendas <br>con sus alianzas, promociones y localización. </p>-->
                <h4>Alianzas</h4>
                <p>Desarrolla alianzas para tener establecimientos aliados con los que puedas intercambiar clientes a través de la creación de descuentos conjuntos.<br></p>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/positionB.png') }}" alt=""></div>
                <!--             <h4>Comprando</h4>
                                <p>A través de nuestra página encontrarás <br> productos y servicios de todo tipo, incluyendo<br>  comidas y vestuario a tu gusto.</p> -->
                <h4>Promocionate en la web</h4>
                <p>Aumenta tu visibilidad en el mercado. <br> Crea gratuitamente tu sitio web en nuestra página y promociona tus productos.</p>
            </div>
            <!-- los mismos establecimientos-->
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/payment4.png') }}" alt=""></div>
                <h4>Fideliza tus clientes</h4>
<!--                <p>Por cada compra que realices<br> en nuestros establecimientos recibirás<br> saldo a tu favor para compras futuras.</p> -->
                <p>Por cada venta realizada <br>podrás otorgar saldo, que tus compradores podrán utilizar en futuras visitas.</p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/sales3C.png') }}" alt=""></div>
                <!--                <h4>Descuentos</h4>
                                <p>Con LinkingShops obtendrás <br>descuentos exclusivos al comprar <br> en las tiendas de nuestra red.</p>-->
                <h4>Nuevos compradores</h4>
                <p>Encuentra nuevos compradores <br>otorgando saldo a tus establecimientos afiliados <br> para que sus clientes sean también los tuyos </p>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/data2.png') }}" alt=""></div>
                <h4>Sigue tus clientes</h4>
                <p>Base de datos de tus compradores. Podrás conocer más tus compradores, incluyendo su frecuencia de visita y preferencias.</p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/gift.png') }}" alt=""></div>
                <h4>Promocionate</h4>
                <p>Con la ayuda de nuestra plataforma podrás desarrollar estrategias promocionales via e-mail y premiar tus clientes en sus fechas especiales.</p>
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
</section>

@stop