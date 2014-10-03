@extends('shops.layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
       <h2 class="shop-title section-title"><span>{{ $shop->name }}</span></h2>
    <br>
    </div>
</div>

<div id="carousel-1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="http://snagovclub.ro/wp-content/uploads/2014/01/header_restaurante.jpg" alt="...">
            <div class="carousel-caption">
                <h3>Lorem ipsum dolor sit amet</h3>
            </div>
        </div>

        <div class="item">
            <img src="http://www.startoursbelize.com/wp-content/uploads/2012/12/restaurant.png" alt="...">
            <div class="carousel-caption">
                <h1>Lorem ipsum dolor sit amet</h1>
            </div>
        </div>
        <div class="item">
            <img src="http://media.dinner-deals.com/topTens/romanticRestaurant.jpg" alt="...">
            <div class="carousel-caption">
                <h1>Lorem ipsum dolor sit amet</h1>
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

    <div class="section row">
    <br>
        <div class="col-lg-12">
         <h2 class="section-title"><span>Bienvenido</span></h2>
        </div>
        <div class="col-lg-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-support"></i> Acerca de</a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-support"></i> Vision</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                    <h4>Lorem ipsum dolor</h4>
                    {{ $shop->about }}
                </div>
                <div class="tab-pane fade" id="service-two">
                    <h4>Lorem ipsum dolor</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                </div>
            </div>

        </div>
    </div>
    <div class="section row">
        <div class="col-lg-12">
            <h2 class="section-title"><span>Lo más destacado</span></h2>
        </div>


            @foreach($popularProducts as $product)
            <div class="product col-sm-3 col-lg-3 col-md-3">
                @include('shops.layouts.partials.preview_product',['category'=>$product->category])
            </div>
            @endforeach


    </div>
   {{-- <div class="section row">
        <div class="col-lg-12">
             <h2 class="section-title"><span>Servicios</span></h2>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service One</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Two</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Three</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Four</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Five</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Six</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Seven</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Eight</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Nine</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
        </div>--}}
    </div>
@stop