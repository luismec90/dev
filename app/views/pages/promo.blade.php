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

<div id="carousel-1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <img src="http://www.autobodyconcept.com/sites/default/files/choosing_3.jpg" alt="First slide">
        </div>
        <div class="item">
            <img src="http://4.bp.blogspot.com/-ArtLfiVq6VM/Tt997t_10UI/AAAAAAAABJw/XErHAFEn5SQ/s1600/cropped11.jpg" alt="Second slide">
        </div>
        <div class="item">
            <img src="http://oldrichmondinn.com/wp-content/uploads/2012/08/cheesecake.jpg" alt="Third slide">
        </div>
    </div>
</div>

<div class="main-text hidden-xs">
    <div class="col-md-12 text-center">
        <div class="container">
            <h1> Si eres un establecimiento comercial te invitamos a ser pionero de nuestra red totalmente gratis!</h1>
            <div class="row">
                <br>
                <h4>Solo debes ponerte en contacto con nosotros </h4>
                <br>
                <div class="col-xs-2 col-xs-offset-5 text-center">
                    <a href="{{ route('contact_path') }}" class="btn btn-primary btn-lg btn-block">Contactar</a>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="section section-center section-cta">
    <div class="container">
        <h2 class="section-title"><span>Listo para comenzar?</span></h2>

        <p>LinkingShops es una red de tiendas aliadas para ofrecer descuentos exclusivos a sus clientes.

        </p>
        <div class="main-action row text-center">
            <div class="col-md-3 col-md-offset-3"><a href="{{ route('register_path') }}" class="smooth-scroll btn btn-lg btn-block btn-danger">Registrate de forma gratuita</a></div>
         <div class="col-md-3 col-sm-4"><a href="{{ route('listshops_path') }}" class="smooth-scroll btn btn-lg btn-block btn-default">Establecimientos afiliados</a></div>
        </div>
    </div>
</section>

<section id="features" class="section section-center section-hilite section-features">
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
            <!-- los mismos establecimientos-->
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/offer.png') }}" alt=""></div>
                <h4>Descuentos</h4>
                <p>Con LinkingShops obtendrás <br>descuentos exclusivos al comprar <br> en las tiendas de nuestra red.</p>
            </div>

        </div>


        <!--            <div class="col-md-4 col-sm-6">
                        <div class="icon-wrap"><img src="{{ asset('assets/images/icon-chrome-flat.png') }}" alt=""></div>
                        <h4>Página web</h4>
                        <p>Cada establecimiento afiliado tiene su página web donde puedes encontrar sus productos/servicios, valoraciones de los usuarios y localización. </p>
                        Cada establecimiento afiliado tiene su respectiva página web en la cual puedes encontrar todo tipo de información como fotos de los productos/servicios, valoraciones de los usuarios, localización.
                    </div>-->
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-ticket-flat.png') }}" alt=""></div>
                <h4>Tiendas</h4>
                <p>Conoce nuestra red de tiendas <br>con sus alianzas, promociones y localización. </p>
<!--                <p>Cada establecimiento afiliado tiene su página web donde puedes encontrar sus productos/servicios, valoraciones de los usuarios y localización. </p>
                Cada establecimiento afiliado tiene su respectiva página web en la cual puedes encontrar todo tipo de información como fotos de los productos/servicios, valoraciones de los usuarios, localización. -->
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
{{--
<section id="portfolio" class="section section-portfolio">
    <div class="container">
        <h2 class="section-title"><span>Establcimientos afiliados destacados.</span></h2>
        <ul id="filters">
            <li><a href="#" data-filter="*">Todo</a></li>
            <li>/</li>
            <li><a href="#" data-filter=".motion">Comidas</a></li>
            <li>/</li>
            <li><a href="#" data-filter=".web">Calzado</a></li>
            <li>/</li>
            <li><a href="#" data-filter=".photography">Ropa</a></li>
            <li>/</li>
            <li><a href="#" data-filter=".graphic">Tecnologia</a></li>
            <li>/</li>
            <li><a href="#" data-filter=".branding">Deportes</a></li>
        </ul>

        <div class="portfolio-isotope row">
            <article class="col-md-3 col-sm-6 portfolio-item branding photography web">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/noma.jpg') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item motion graphic">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-2.jpg') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item branding web">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-3.png') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item photography graphic">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-4.png') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item motion web">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-5.png') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item branding graphic">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-6.jpg') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item motion photography web">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-8.jpg') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
            <article class="col-md-3 col-sm-6 portfolio-item photography motion branding graphic">
                <div class="entry-thumbnail">
                    <a href="#" class="hover-effect" data-toggle="modal" data-target="#project-modal">
                        <img src="{{ asset('assets/images/project-7.jpg') }}" alt="" />
                        <span class="overlay"><i class="fa fa-plus"></i></span>
                    </a>
                </div>
            </article>
        </div>

    </div>
</section>

<!-- Project Modal -->
<div class="modal fade" id="project-modal" tabindex="-1" role="dialog" aria-labelledby="project-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="project-modal-label">Restaurante Noma</h4>
            </div>
            <div class="modal-body">
                <article class="single-project">
                    <div class="project-thumbnail">
                        <div id="project-thumbnail-carousel-1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active"><img src="{{ asset('assets/images/noma2.jpg') }}" /></div>
                                <div class="item"><img src="{{ asset('assets/images/noma1.jpg') }}" /></div>
                                <div class="item"><img src="{{ asset('assets/images/noma3.jpg') }}" /></div>
                            </div>
                            <ol class="carousel-indicators">
                                <li data-target="#project-thumbnail-carousel-1" data-slide-to="0" class="active"></li>
                                <li data-target="#project-thumbnail-carousel-1" data-slide-to="1"></li>
                                <li data-target="#project-thumbnail-carousel-1" data-slide-to="2"></li>
                            </ol>
                            <a class="left carousel-control" href="#project-thumbnail-carousel-1" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                            <a class="right carousel-control" href="#project-thumbnail-carousel-1" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="http://dev.app:8000/restaurantenoma" class="btn btn-block btn-primary">Ver página web</a>
                            <ul class="list-unstyled project-info">
                                <li><strong>Tipo</strong> <span class="pull-right">Comidas</span></li>
                                <li><strong>Clientes afiliados</strong> <span class="pull-right">420</span></li>
                            </ul>

                        </div>
                        <div class="col-md-8">
                            <p>Suspendisse varius nisl nunc. Aenean in dictum nibh. Nullam congue facilisis purus porta ullamcorper. Aenean in consequat sapien. Cras orci augue, ultricies at luctus congue, dapibus sed magna. Vivamus consequat commodo pharetra. Maecenas sed tincidunt mi, quis accumsan nisi. Praesent ac porttitor massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur in bibendum tellus, vitae imperdiet mauris.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
--}}

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
