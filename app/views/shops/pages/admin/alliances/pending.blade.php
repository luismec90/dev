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
        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-primary" href="{{ route('pending_alliances_path',$shop->link) }}">Ir atrás</a>
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
                                            <?php $t=$pendingAlliance->allianceRecords->count(); $i=0; ?>
                                            @foreach($pendingAlliance->allianceRecords as $allianceRecord)
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
                                                                    <tr class="{{ ($allianceRecord->alliance->from==$shop->id) ? "success":"warning"}}">
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
                                                                    <tr class="{{ ($allianceRecord->alliance->to==$shop->id) ? "success":"warning"}}">
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
                                            @if($allianceRecord->shop_id==$shop->id)
                                             <h4 class="text-center">Esperando la respuesta de
                                                @if($pendingAlliance->from!=$shop->id)
                                                    {{ $pendingAlliance->shopFrom->name }}
                                                @elseif($pendingAlliance->to!=$shop->id)
                                                     {{ $pendingAlliance->shopTo->name }}
                                                @endif
                                             </h4>
                                            @else
                                                <div class="col-xs-6">
                                                {{ Form::open(["route"=>["accept_request_alliance_path",$shop->link,$pendingAlliance->id],'autocomplete'=>'off']) }}
                                                    <button type="submit" class="btn btn-primary btn-block">Aceptar propuesta</button>
                                                {{ Form::close() }}
                                                </div>
                                                <div class="col-xs-6">
                                                    <button id="btn-contra-request-alliance" class="btn btn-danger btn-block"
                                                    data-from-retribution-per-user-granted="{{  Currency::toFront($allianceRecord->from_retribution_per_user_granted*100,'') }}"
                                                    data-from-limit-per-user-granted="{{  Currency::toFront($allianceRecord->from_limit_per_user_granted,'') }}"
                                                    data-from-limit-total-granted="{{  Currency::toFront($allianceRecord->from_limit_total_granted,'') }}"
                                                    data-to-retribution-per-user-granted="{{ Currency::toFront($allianceRecord->to_retribution_per_user_granted*100,'') }}"
                                                    data-to-limit-per-user-granted="{{  Currency::toFront($allianceRecord->to_limit_per_user_granted,'') }}"
                                                    data-to-limit-total-granted="{{  Currency::toFront($allianceRecord->to_limit_total_granted,'') }}"
                                                    data-shop-name="@if($pendingAlliance->from!=$shop->id)
                                                                        {{ $pendingAlliance->shopFrom->name }}
                                                                    @elseif($pendingAlliance->to!=$shop->id)
                                                                         {{ $pendingAlliance->shopTo->name }}
                                                                    @endif">Contra proponer</button>
                                                </div>
                                            @endif
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

<!-- Solicitar alianza Modal -->
@include('shops.pages.admin.alliances.partials.modal_request_alliance',['title'=>'Contra propuesta','route'=>["contra_request_alliance_path",$shop->link,$pendingAlliance->id]])
@stop