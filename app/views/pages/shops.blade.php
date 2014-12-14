@extends('layouts.default')

@section('js')
{{ HTML::script('assets/libs/TimeCircles.js') }}
{{ HTML::script('assets/js/shops.js') }}
<script>
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 5000
    })
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
                        <li>Alianzas estratégicas entre establecimientos</li>
                        <li>Fidelización de clientes</li>
                        <li>Presencia en buscadores</li>
                        <li>Base de datos de los clientes</li>
                        <li>Sistema de inventarios</li>
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
                    <p>Fácil de entender, con un flujo de acciones intuitivo e información de cada una de las funciones.</p>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /headerwrap -->
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
            <div class="col-xs-6 text-left"><a id="btn-recommend" class="smooth-scroll btn btn-lg btn-default">Recomienda esto a un amigo</a></div>
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
        <hr>
        <br><br>
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
                            </tbody>
                        </table>
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
                            </tbody>
                        </table>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('register_path') }}" class="btn btn-default" role="button">Proceder</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
{{--<section  class="section section-center section-hilite ">
    <div class="container">
         <div class="row">
        		<div class="col-md-12">
                        <div id="Carousel" class="carousel slide">


                        <!-- Carousel items -->
                        <div class="carousel-inner">

                        <div class="item active">
                        	<div class="row">
                        	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        	</div><!--.row-->
                        </div><!--.item-->

                        <div class="item">
                        	<div class="row">
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        	</div><!--.row-->
                        </div><!--.item-->

                        <div class="item">
                        	<div class="row">
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                        	</div><!--.row-->
                        </div><!--.item-->

                        </div><!--.carousel-inner-->
                          <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                          <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                        </div><!--.Carousel-->

        		</div>
        	</div>
    </div>
</section>
--}}


<div class="modal fade" id="modal-recommend">
	<div class="modal-dialog">
	{{ Form::open(['id'=>'form-recommend','route'=>'recommend_path']) }}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Recomendar a un amigo</h4>
			</div>
			<div class="modal-body">

				
				    <!--  Form Input -->
				    <div class="form-group">
				        {{ Form::label('name','Tu nombre completo:') }}
				        {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
				    </div>

				    <!--  Form Input -->
				    <div class="form-group">
				        {{ Form::label('email','Email de tu amigo:') }}
				        {{ Form::email('email',null,['class'=>'form-control','required'=>'required']) }}
				    </div>

				    <!--  Form Input -->
				    <div class="form-group">
				        {{ Form::label('note','Mensaje (Opcional):') }}
				        {{ Form::textarea('note',null,['class'=>'form-control','required'=>'required','rows'=>3]) }}
				    </div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{{ Form::button('Enviar',['id'=>'btn-modal-redemmed','class'=>'btn btn-primary']) }}
			</div>
		</div><!-- /.modal-content -->
		{{ Form::close() }}
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop