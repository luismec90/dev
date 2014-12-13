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
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-primary" href="{{ route('active_alliances_path',$shop->link) }}">Ir atrás</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>
        <div  class="row">
            <div class="col-xs-12">
                @include('layouts.partials.errors')
                <div  class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <span class="glyphicon glyphicon-comment"></span> Historial de propuestas
                                    </div>
                                    <div id="panel-history-alliances" class="panel-body">
                                        <ul class="chat">
                                            <?php $t=$activeAlliance->allianceRecords->count(); $i=0; ?>
                                            @foreach($activeAlliance->allianceRecords as $allianceRecord)
                                            <?php $i++; ?>
                                            <li class="{{ $allianceRecord->shop_id==$shop->id ? "right" : "left" }} clearfix">
                                                <span class="chat-img {{ $allianceRecord->shop_id==$shop->id ? "pull-right" : "pull-left" }}">
                                                    <img src="{{ $allianceRecord->shop->pathPreviwImage()  }}" width="80" alt="{{ $allianceRecord->shop->name }}" class="img-thumbnail">
                                                </span>
                                                <div class="chat-body clearfix row">
                                                    <div class="col-xs-12">
                                                        <div class="header">
                                                            <strong class="{{ $allianceRecord->shop_id==$shop->id ? "pull-right" : "" }} primary-font">{{ $allianceRecord->shop->name }} <span class="last-request badge">{{ $i==$t ? "Propuesta actual":"" }}</span></strong> <small class="{{ $allianceRecord->shop_id==$shop->id ? "" : "pull-right" }} text-muted">
                                                            <span class="glyphicon glyphicon-time"></span>{{ $allianceRecord->created_at->diffForHumans(); }}</small>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <table class="table table-bordered table-striped table-condensed table-records">
                                                                    <tr>
                                                                        <td>Establecimiento</td>
                                                                        <td>Retribución por usuario</td>
                                                                        <td>Límite por usuario:</td>
                                                                        <td>Límite total:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ $allianceRecord->alliance->shopFrom->name }}</td>
                                                                        <td>
                                                                            <b> {{ Currency::toFront($allianceRecord->from_retribution_per_user_granted*100,'') }} %</b>
                                                                        </td>
                                                                        <td>
                                                                            <b> {{ Currency::toFront($allianceRecord->from_limit_per_user_granted) }}</b>
                                                                        </td>
                                                                        <td>
                                                                            <b> {{ Currency::toFront($allianceRecord->from_limit_total_granted) }}</b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ $allianceRecord->alliance->shopTo->name }}</td>
                                                                        <td>
                                                                            <b> {{ Currency::toFront($allianceRecord->to_retribution_per_user_granted*100,'') }} %</b>
                                                                        </td>
                                                                        <td>
                                                                            <b> {{ Currency::toFront($allianceRecord->to_limit_per_user_granted) }}</b>
                                                                        </td>
                                                                        <td>
                                                                            <b> {{ Currency::toFront($allianceRecord->to_limit_total_granted) }}</b>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="col-xs-12">
                                                            <div class="well well-sm">
                                                                <b>Nota:</b> {{ $allianceRecord->note }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <buuton class="btn btn-danger" data-toggle="modal" data-target="#modal-suspend-alliance">Cancelar alianza</buuton>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-suspend-alliance">
	<div class="modal-dialog">
        {{ Form::open(["route"=>["cancel_alliance_path",$shop->link,$activeAlliance->id],'autocomplete'=>'off']) }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cancelar alianza</h4>
                </div>
                <div class="modal-body">
                    ¿Realmente desea cancelar esta alianza?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div><!-- /.modal-content -->
        {{ Form::close() }}
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop