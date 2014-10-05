@extends('shops.layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
       <h2 class="shop-title section-title"><span>{{ $shop->name }}</span></h2>
    <br>
    </div>
</div>
<div class="row">
    @include('shops.layouts.partials.left_menu')
  	<div class="col-md-9">


<div id="carousel-1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    @@for ($i = 0; $i < $shop->covers->count(); $i++)
        <li data-target="#carousel-1" data-slide-to="{{ $i }}" class="{{ $shop->covers[$i]->current==1 ? 'active' : '';}}"></li>
    @endfor

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($shop->covers as $cover)
        <div class="item {{ $cover->current==1 ? 'active' : '';}}">
            <img src="{{ $cover->pathImage($shop->id) }}" alt="...">
            @if( $cover->caption!="")
                <div class="carousel-caption">
                    <h3>{{ $cover->caption }}</h3>
                </div>
            @endif
        </div>
        @endforeach

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
         <h2 class="section-title"><span>Acerca</span></h2>
        </div>
        <div class="col-lg-12">
            {{ $shop->about }}
        </div>
    </div>
    <div class="section row">
        <div class="col-lg-12">
            <h2 class="section-title"><span>Lo más destacado</span></h2>
        </div>


            @foreach($popularProducts as $product)
            <div class="product col-sm-4 col-lg-4 col-md-4">
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
</div>
@stop