@extends('shops.layouts.default')
@section('content')
@include('shops.layouts.partials.title_page',['showTour'=>true])
<div class="row">
    @include('shops.layouts.partials.left_menu')
  	<div class="col-md-9">


<div id="carousel-1" class="carousel slide one" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    @if($shop->covers->count()>1)
        @for ($i = 0; $i < $shop->covers->count(); $i++)
            <li data-target="#carousel-1" data-slide-to="{{ $i }}" class="{{ $i==0 ? 'active' : '';}}"></li>
        @endfor
    @endif

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @for ($i = 0; $i < $shop->covers->count(); $i++)
        <div class="item {{ $i==0 ? 'active' : '';}}">
            <img src="{{ $shop->covers[$i]->pathImage($shop->id) }}" alt="...">
            @if( $shop->covers[$i]->caption!="")
                <div class="carousel-caption">
                    <h3>{{ $shop->covers[$i]->caption }}</h3>
                </div>
            @endif
        </div>
        @endfor

    </div>
    @if($shop->covers->count()>1)
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    @endif
</div>


    <div class="section row">
        @if($shop->about)
            <br>
            <div class="col-lg-12">
                <h2 class="section-title"><span>Acerca</span></h2>
            </div>
            <div class="col-lg-12">
                <p>{{ $shop->about }}</p>
            </div>
        @endif
    </div>


    <div class="section row two">
        <div class="col-lg-12">
            <h2 class="section-title"><span>Lo más destacado</span></h2>
        </div>


            @foreach($popular_products as $product)
            <div class="product col-sm-4 col-lg-4 col-md-4">
                @include('shops.layouts.partials.preview_product',['category'=>$product->category])
            </div>
            @endforeach


    </div>
    </div>
</div>
@stop
