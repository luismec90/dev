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
<section id="contact" class="section section-center section-contact">
    <div class="container">
        <h2 class="section-title"><span>Búsqueda</span></h2>
        <div class="main-action">
            <div class="row">
                <div class="col-md-12 text-center">
                    @include('layouts.partials.search')
                </div>
            </div>
            <div class="row">
                <br><br>
                <div class="col-xs-12">
                    @if(!empty($shops) && $shops->count())
                        <fieldset>  <legend>Resultados</legend>
                        @foreach($shops as $shop)
                            @if($shop->id!=1)

                            <div class="row">
                                <img class="col-sm-2" src="{{ $shop->pathPreviwImage() }}">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="text-left">
                                            {{ $shop->name }}
                                            <a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página web </a>
                                            <a href="{{ route('localization_path',$shop->link) }}" class="btn btn-primary btn-sm">Localización </a>
                                            @if($shop->delivery_service)
                                                <a href="{{ route('delivery_path',$shop->link) }}"class="btn btn-primary btn-sm">Domicilios </a>
                                            @endif
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-left">
                                            {{ $shop->about }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @endif
                        @endforeach

                        {{-- <table class="table table-striped">
                        <tr>
                        <td>Tienda</td>
                        <td>info</td>
                        <td>Sitio web</td>
                        </tr>
                        @foreach($shops as $shop)
                        <tr>
                        <td>{{ $shop->name }}</td>
                        <td></td>
                        <td>{{ link_to_route('shop_path','Ver',[$shop->link]) }}</td>
                        </tr>
                        @endforeach
                        </table> --}}
                        </fieldset>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@stop