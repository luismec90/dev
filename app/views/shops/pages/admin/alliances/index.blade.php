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
                <br>
            </div>
        </div>
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
                                @foreach($shops as $shop)
                                    <tr>
                                        <td class="col-xs-2">
                                            <img class="img-thumbnail " src="{{ $shop->pathPreviwImage() }}">
                                        </td>
                                        <td> {{ $shop->name }} </td>
                                        <td> {{ $shop->about }} </td>
                                        <td>
                                            <button class="btn btn-danger btn-request-alliance" data-shop-name="{{ $shop->name }}" data-shop-id="{{ $shop->id }}">Solicitar alianza </button>
                                            <br>
                                            <br>
                                            <a href="{{ route('localization_path',$shop->link) }}" class="btn btn-default" target="_blank">Ver localización </a>
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
<div class="modal fade" id="modal-request-alliance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::open(["id"=>"form-request-alliance","route"=>["request_alliance_path",$shop->link]]) }}
            {{ Form::hidden('to',null,['id'=>'to','required'=>'required']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" id="modal-request-alliance-label">Solicitar alianza</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 id="shop-name" class="text-center"></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well well-sm">
                                <fieldset>
                                    <legend>Propuesta a enviar:</legend>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('from_retribution_per_user_granted','Retribución por usuario:') }}
                                                <div class="input-group">
                                                    {{ Form::number('from_retribution_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 5','required'=>'required','step'=>'0.001']) }}
                                                    <div class="input-group-addon">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('from_limit_per_user_granted','Límite por usuario:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::number('from_limit_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 20000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('from_limit_total_granted','Límite total:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::number('from_limit_total_granted',null,['class'=>'form-control','placeholder'=>'Ej: 800000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well well-sm">
                                <fieldset>
                                    <legend>Propuesta esperada a recibir:</legend>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('to_retribution_per_user_granted','Retribución por usuario:') }}
                                                <div class="input-group">
                                                    {{ Form::number('to_retribution_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 5','required'=>'required','step'=>'0.001']) }}
                                                    <div class="input-group-addon">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('to_limit_per_user_granted','Límite por usuario:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::number('to_limit_per_user_granted',null,['class'=>'form-control','placeholder'=>'Ej: 20000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                {{ Form::label('to_limit_total_granted','Límite total:') }}
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    {{ Form::number('to_limit_total_granted',null,['class'=>'form-control','placeholder'=>'Ej: 800000','required'=>'required']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                {{ Form::label('note','Notas adicionales:') }}
                                <textarea name="note" class="form-control" rows="3" placeholder="Me gustaría que fuéramos aliados porque..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    {{ Form::submit('Enviar',['class'=>'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop