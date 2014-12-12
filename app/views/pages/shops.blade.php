@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/select2/select2.css') }}
{{ HTML::style('assets/libs/select2/select2-bootstrap.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/select2/select2.js') }}
{{ HTML::script('assets/js/search.js') }}
{{ HTML::script('assets/libs/TimeCircles.js') }}
<script>
$(function($) {
    /* ---------------------------------------------- /*
     * TimeCicles
     /* ---------------------------------------------- */

    var countdown = $('.countdown-time');

    createTimeCicles();

    $(window).on('resize', windowSize);

    function windowSize() {
        countdown.TimeCircles().destroy();
        createTimeCicles();
        countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function () {
            countdown.removeClass('animated bounceIn');
        });
    }

    function createTimeCicles() {
        countdown.addClass('animated bounceIn');
        countdown.TimeCircles({
            fg_width: 0.013,
            bg_width: 0.6,
            circle_bg_color: '#ffffff',
            time: {
                Days: { "text": "Dias",color: '#19B5FE'},
                Hours: { "text": "Horas",color: '#19B5FE'},
                Minutes: { "text": "Minutos",color: '#19B5FE'},
                Seconds: { "text": "Segundos",color: '#19B5FE'}
            }
        });
        countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function () {
            countdown.removeClass('animated bounceIn');
        });
    }
});
</script>
@stop



@section('content')

<section id="home">
			<div class="headerwrap">
				<div class="container">
					<div class="row text-center">
						<div class="col-lg-12">
							<h1>Bienvenido a <b>LinkingShops</b></h1>
							<h3>La manera más fácil de llevar su negocio a la web</h3>
							<br>
						</div>

						<div class="col-lg-2 hidden-xs hidden-sm hidden-md">
							<h5>Multiples beneficios</h5>
							<ul id="lista-beneficios">
                                <li>Alianzas estrategicas entre establecimientos</li>
                                <li>Fidelización de clientes</li>
                                <li>Presencia en buscadores</li>
                                <li>Base de datos de los clientes</li>
                                <li>Sistema inventarios</li>
                                <li>Sistema contable</li>
                                <li>Página web</li>
							</ul>
							<img src="http://demo.danielyewright.com/bootstack/assets/img/arrow-left.png" alt="">
						</div>
						<div class="col-lg-8">
							<img class="img-responsive" src="{{ asset('assets/images/app-bg2.png') }}" alt="">
							<!--<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
							<a href="#features" type="submit" class="btn btn-lg btn-theme smoothScroll">LEARN MORE</a>-->
						</div>
						<div class="col-lg-2 hidden-xs hidden-sm hidden-md">
							<br>
							<img class="pad-top" src="http://demo.danielyewright.com/bootstack/assets/img/arrow-right.png" alt="">
							<h5>Diseño Agradable y Fácil de Usar</h5>
							<p>Fácil de entender, con un flujo de acciones intuitivo y con informacion de cada una de las funciones.</p>
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
        <h2 class="section-title"><span>¿Estás listo para llevar tu negocio a la Web?</span></h2>

        <p>LinkingShops es una plataforma para la fidelización de clientes y a atracción de nuevos compradores <br> através de alianzas entre establecimientos comerciales de todos los sectores. Tambien brinda las herramientas necesarias para adminsitar y posicionar su negocio.</p>
        <div class="col-xs-12 text-center well">
                    * Los establecimientos que se registren antes del 1 de enero del 2015 recibirán un 12 meses completamente gratis en una cuenta <b>PREMIUM</b>.
                   				        <b>Sin trucos, sin letra pequeña, simplemente gratis! Registrate antes de que se acabe el tiempo. </b><br>
                   </div>
         <div class="row">
                        <div class="col-xs-12">
                            <div class="i_cicle">
                                                                     						<!-- Timer: Your date here -->
                                                                     						<div class="countdown-time animated bounceIn" data-date="2015-01-01 00:00:00" data-timer="100"></div>
                                                                     					</div>
                        </div>
                    </div>
        <div class="main-action row text-center ">
            <div class="col-xs-6 text-right"><a href="{{ route('register_path') }}" class="smooth-scroll btn btn-lg btn-danger">Registrate de forma gratuita</a></div>
             <div class="col-xs-6 text-left"><a href="{{ route('register_path') }}" class="smooth-scroll btn btn-lg btn-default">Recomienda esto a un amigo</a></div>




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
<div class="pricingwrap">
			<div class="container text-center">
				<br>
				<h2>Nuestros precios</h2>
				<hr><br><br>
				<div class="row">
				    <div class="col-xs-12">
				        * Los establecimientos que se registren antes del 1 de enero del 2015 recibirán un 12 meses completamente gratis.
				        <b>Sin trucos, sin letra pequeña, simplemente gratis!</b><br> <br> <a href="{{ route('register_path') }}" class="btn btn-danger">Entra y compruebalo</a>
				        <br>
				         <br>
				    </div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-4 col-md-of">
						<div class="panel panel-custom">
							<div class="panel-heading">
								<h3 class="panel-title">Básica</h3>
							</div>
							<div class="panel-body">
								<div class="the-price">
									<h3><b>$ 22.000</b><span class="subscript">/mes</span></h3>
									<small>El primer mes gratis</small>
								</div>
								<table class="table">
                                								<tbody>
                                								<tr>
                                                                    <td>1 Establecimiento</td>
                                                                </tr>
                                								<tr>
                                									<td>5 Cuentas por establecimiento</td>
                                								</tr>
                                                                <tr>
                                                                    <td>Sistema de fideliazión</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Base de datos de los clientes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Página web</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Reportes semanales</td>
                                                                </tr>

                                							</tbody></table>
							</div>
							<div class="panel-footer">
								<a href="{{ route('register_path') }}" class="btn btn-default" role="button">Proceder</a>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-4">
						<div class="panel panel-custom">
							<div class="panel-heading">
								<h3 class="panel-title">Standard</h3>
							</div>
							<div class="panel-body">
								<div class="the-price">
									<h3><b>$ 32.000 </b><span class="subscript">/mes</span></h3>
                                    <small>El primer mes gratis</small>
								</div>
								<table class="table">
                                                                								<tbody>
                                                                								 <tr class="success">
                                                                                                       <td>3 Establecimiento</td>
                                                                                                   </tr>
                                                                                                 <tr class="success">
                                                                                                    <td>15 Cuentas por establecimiento</td>
                                                                                                </tr>
                                                                                                 <tr>
                                                                                                                                                                    <td>Sistema de fideliazión</td>
                                                                                                                                                                </tr>
                                                                								 <tr class="success">
                                                                                                    <td>Sistema de alianzas</td>
                                                                                                </tr>

                                                                                                <tr class="success">
                                                                                                    <td>Sistema de inventarios</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Base de datos de los clientes</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Página web</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Reportes semanales</td>
                                                                                                </tr>

                                                                							</tbody></table>
							</div>
							<div class="panel-footer">
								<a href="{{ route('register_path') }}" class="btn btn-default" role="button">Proceder</a>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-4">
						<div class="panel panel-custom">
							<div class="panel-heading">
								<h3 class="panel-title">Premium</h3>
							</div>
							<div class="panel-body">
							<div class="the-price">
								<h3><b>$ 50.000 </b><span class="subscript">/mes</span></h3>
								<small>El primer mes gratis</small>
							</div>
							<table class="table">
								<tbody>
								 <tr class="success">
								<td>10 Establecimientos</td>

								</tr>
								 <tr class="success">
									<td>Cuentas ilimitadas</td>
								</tr>
								 <tr>
                                                                                                                                                                                                    <td>Sistema de fideliazión</td>
                                                                                                                                                                                                </tr>
                                                                                                								 <tr class="success">
                                                                                                                                    <td>Sistema de alianzas</td>
                                                                                                                                </tr>
                                 <tr class="success">
                                                                    <td>Sistema de inventarios</td>
                                                                </tr>
                                <tr class="success">
                                    <td>Sistema contable</td>
                                </tr>
                                <tr>
                                    <td>Base de datos de los clientes</td>
                                </tr>
                                <tr>
                                    <td>Página web</td>
                                </tr>
                                <tr>
                                    <td>Reportes semanales</td>
                                </tr>

							</tbody></table>
							</div>
							<div class="panel-footer">
								<a href="{{ route('register_path') }}" class="btn btn-default" role="button">Proceder</a>
							</div>
						</div>
					</div>


				</div><!-- /row -->
			</div><!-- /container -->
		</div>

<section id="testimonials" class="section section-center section-hilite  section-testimonial">
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