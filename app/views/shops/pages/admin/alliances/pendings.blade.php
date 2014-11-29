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
                        @if(!empty($pendingAlliances))
                            <table class="table table-bordered" >
                                <tr>
                                    <td>Imagen</td>
                                    <td>Establecimiento</td>
                                    <td>Estatus</td>
                                    <td>Opciones</td>

                                </tr>
                                @foreach($pendingAlliances as $pendingAlliance)
                                    <tr>
                                        <td class="col-xs-2">
                                            @if($pendingAlliance->from==$shop->id)
                                                <img class="img-thumbnail " src="{{ Shop::findOrFail($pendingAlliance->to)->pathPreviwImage() }}">
                                            @elseif($pendingAlliance->to==$shop->id)
                                                <img class="img-thumbnail " src="{{ Shop::findOrFail($pendingAlliance->from)->pathPreviwImage() }}">
                                            @endif
                                        </td>
                                        <td class="col-xs-2">
                                            @if($pendingAlliance->from==$shop->id)
                                                {{ Shop::findOrFail($pendingAlliance->to)->name }}
                                            @elseif($pendingAlliance->to==$shop->id)
                                                {{ Shop::findOrFail($pendingAlliance->from)->name }}
                                            @endif
                                        </td>
                                        <td>Pendiente</td>
                                        <td>
                                            @if($pendingAlliance->from==$shop->id)
                                                <a class="btn btn-danger" href="{{ route('pending_alliance_path',[$shop->link,$pendingAlliance->id]) }}">Ver detalles</a>
                                                <br>
                                                <br>
                                                <a href="{{ route('localization_path',Shop::findOrFail($pendingAlliance->to)->link) }}" class="btn btn-default" target="_blank">Ver localización </a>
                                            @elseif($pendingAlliance->to==$shop->id)
                                                <button class="btn btn-danger">Solicitar alianza </button>
                                                <br>
                                                <br>
                                                <a href="{{ route('localization_path',Shop::findOrFail($pendingAlliance->from)->link) }}" class="btn btn-default" target="_blank">Ver localización </a>
                                            @endif
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