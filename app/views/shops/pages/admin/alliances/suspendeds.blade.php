@extends('shops.layouts.default')

@section('css')
{{ HTML::style('assets/libs/select2/select2.css') }}
{{ HTML::style('assets/libs/select2/select2-bootstrap.css') }}
{{ HTML::style('assets/themes/one/css/alliances.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/select2/select2.js') }}
{{ HTML::script('assets/themes/one/js/alliances.js') }}

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
        @include('shops.pages.admin.alliances.partials.tabs')
        <div  class="row">
            <div class="col-xs-12">
                @include('layouts.partials.errors')
                <div  class="row">
                    <div class="col-xs-12">
                        @if(!empty($suspendedAlliances))
                            <table class="table table-bordered" >
                                <tr>
                                    <td>Imagen</td>
                                    <td>Establecimiento</td>
                                    <td>Estatus</td>
                                    <td>Opciones</td>

                                </tr>
                                @foreach($suspendedAlliances as $suspendAlliance)
                                    <tr>
                                        <td>
                                            @if($suspendAlliance->from==$shop->id)
                                                <img class="img-thumbnail" width="80" src="{{ $suspendAlliance->shopTo->pathPreviwImage() }}">
                                            @elseif($suspendAlliance->to==$shop->id)
                                                <img class="img-thumbnail" width="80" src="{{ $suspendAlliance->shopFrom->pathPreviwImage() }}">
                                            @endif
                                        </td>
                                        <td class="col-xs-2">
                                            @if($suspendAlliance->from==$shop->id)
                                                {{ $suspendAlliance->shopTo->name }}
                                            @elseif($suspendAlliance->to==$shop->id)
                                                {{ $suspendAlliance->shopFrom->name }}
                                            @endif
                                        </td>
                                        <td>Pendiente</td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('suspended_alliance_path',[$shop->link,$suspendAlliance->id]) }}">Ver detalles</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop