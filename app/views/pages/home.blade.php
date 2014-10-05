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
        <h1> Encuentra establecimientos afiliados cercanos</h1>
        <div class="container">
            @include('layouts.partials.search')
        </div>
    </div>
</div>



<section class="section section-center section-cta">
    <div class="container">
        <h2 class="section-title"><span>Listo para comenzar?</span></h2>
        <p>LinkingShops es una red de tiendas aliadas para ofrecer descuentos exclusivos a sus clientes.       
        </p>
        <div class="main-action row">
            <div class="col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-2"><a href="#" class="smooth-scroll btn btn-lg btn-block btn-danger">Registrarme</a></div>
            <div class="col-md-3 col-sm-4"><a href="#" class="smooth-scroll btn btn-lg btn-block btn-default">Establecimientos afiliados</a></div>
        </div>
    </div>
</section>

<section id="features" class="section section-center section-hilite section-features">
    <div class="container">
        <h2 class="section-title"><span>Como funciona?</span></h2>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-bag-flat.png') }}" alt=""></div>
                <h4>Comprando</h4>
                <p>Por cada compra que realices en nuestros establecimientos afiliados recibiras puntos, los cuales podras utilizar en compras futuras.</p> 
            </div>
            <!-- los mismos establecimientos-->
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/offer.png') }}" alt=""></div>
                <h4>Descuentos</h4>
                <p>A través de LinkingShops podrás obtener descuentos exclusivos al comprar en las tiendas de nuestra red.</p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-ticket-flat.png') }}" alt=""></div>
                <h4>Tiendas</h4>
                <p>Conoce nuestra red de tiendas, sus alianzas, <br> promociones, y localización. </p>
<!--                <p>Cada establecimiento afiliado tiene su página web donde puedes encontrar sus productos/servicios, valoraciones de los usuarios y localización. </p>
                Cada establecimiento afiliado tiene su respectiva página web en la cual puedes encontrar todo tipo de información como fotos de los productos/servicios, valoraciones de los usuarios, localización. -->
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
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-delivery-flat.png') }}" alt=""></div>
                <h4>A domicilio</h4>
                <p>Podrás ordernar a domicilio en las tiendas afiliadas que presten el servicio. </p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-comments-flat.png') }}" alt=""></div>
                <h4>Valoraciones</h4>
                <p>Podras conocer la opinión de los demás usuarios y valorar tus productos preferidos.</p>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="icon-wrap"><img src="{{ asset('assets/images/icon-easel-flat.png') }}" alt=""></div>
                <h4>Estadisticas</h4>
                <p>Recommendaciones ajustadas a tu estilo, basados en estadisticas de uso.</p>
            </div>
        </div>
    </div>
</div>
</section>

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

<section id="testimonials" class="section section-center section-hilite section-testimonial">
    <div class="container">
        <h2 class="section-title"><span>Que opinan los usuarios?</span></h2>
        <i class="fa fa-quote-left fa-3x"></i>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
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
