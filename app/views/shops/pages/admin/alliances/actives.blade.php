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
    @include('shops.layouts.partials.left_menu')
    <div class="col-md-9">
        @include('shops.pages.admin.alliances.partials.tabs')
        <div  class="row">
            <div class="col-xs-12">
                @include('layouts.partials.errors')
                <div  class="row">
                    <div class="col-xs-12">
                        @if(!empty($activeAlliances))
                            <table class="table table-bordered" >
                                <tr>
                                    <td>Imagen</td>
                                    <td>Establecimiento</td>
                                    <td>Estatus</td>
                                    <td>Opciones</td>

                                </tr>
                                @foreach($activeAlliances as $activeAlliance)
                                    <tr>
                                        <td>
                                            @if($activeAlliance->from==$shop->id)
                                                <img class="img-thumbnail" width="80" src="{{ $activeAlliance->shopTo->pathPreviwImage() }}">
                                            @elseif($activeAlliance->to==$shop->id)
                                                <img class="img-thumbnail" width="80" src="{{ $activeAlliance->shopFrom->pathPreviwImage() }}">
                                            @endif
                                        </td>
                                        <td class="col-xs-2">
                                            @if($activeAlliance->from==$shop->id)
                                                {{ $activeAlliance->shopTo->name }}
                                            @elseif($activeAlliance->to==$shop->id)
                                                {{ $activeAlliance->shopFrom->name }}
                                            @endif
                                        </td>
                                        <td>Activa</td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('active_alliance_path',[$shop->link,$activeAlliance->id]) }}">Ver detalles</a>
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