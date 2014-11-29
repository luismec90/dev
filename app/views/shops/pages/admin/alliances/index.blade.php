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
                <div class="row">
                    {{ Form::open(['method'=>'GET']) }}
                        <div class="col-xs-5">
                            <label>Seleccione una ciudad:</label>
                            <select id="town" name="town" class="form-control">
                                <option></option>
                                @foreach($towns as $town)
                                    <option value="{{ $town->id }}" {{ $selectedTown==$town->id ? 'selected':''; }}>{{ $town->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-5">
                            <label>Seleccionar una categoría:</label>
                            <select id="activity" name="activity" class="form-control">
                                <option></option>
                                @foreach($activities as $activity)
                                    <option value="{{ $activity->id }}" {{ $selectedActivity==$activity->id ? 'selected':''; }}>{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <br>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <br>
                    </div>
                </div>
                @include('layouts.partials.errors')
                <div  class="row">
                    <div class="col-xs-12">
                        @if(!empty($shops))
                            <table class="table table-bordered" >
                                <tr>
                                    <td>Imagen</td>
                                    <td>Nombre</td>
                                    <td>Descripción</td>
                                    <td>Opciones</td>
                                </tr>
                                @foreach($shops as $row)
                                    <tr>
                                        <td>
                                            <img class="img-thumbnail" width="80" src="{{ $row->pathPreviwImage() }}">
                                        </td>
                                        <td> {{ $row->name }} </td>
                                        <td> {{ $row->about }} </td>
                                        <td>
                                            <button class="btn btn-danger btn-request-alliance" data-shop-name="{{ $row->name }}" data-shop-id="{{ $row->id }}">Solicitar alianza </button>
                                            <br>
                                            <br>
                                            <a href="{{ route('localization_path',$row->link) }}" class="btn btn-default" target="_blank">Ver localización </a>
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

<!-- Solicitar alianza Modal -->
@include('shops.pages.admin.alliances.partials.modal_request_alliance',['title'=>'Solicitar alianza','route'=>["request_alliance_path",$shop->link]])
@stop