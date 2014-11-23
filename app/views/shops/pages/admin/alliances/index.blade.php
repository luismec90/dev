@extends('shops.layouts.default')

@section('js')
@stop
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

        <div class="row">
            <div class="col-xs-10">
                <h3 class="no-margin">Alianzas</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <ul  class="nav nav-tabs">
                    <li class="active">
                        <a >Buscar aliados</a>
                    </li>
                    <li>
                        <a>Alianzas en proceso</a>
                    </li>
                    <li>
                        <a>Alianzas activas</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                asd
            </div>
        </div>
    </div>
</div>
<br>
@stop