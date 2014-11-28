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
                                    <div class="panel-body">
                                        <ul class="chat">
                                            @foreach($pendingAlliance->allianceRecords as $allianceRecord)
                                            <li class="{{ $allianceRecord->shop_id==$shop->id ? "right" : "left" }} clearfix">
                                            <span class="chat-img {{ $allianceRecord->shop_id==$shop->id ? "pull-right" : "pull-left" }}">
                                            <img src="{{ $allianceRecord->shop->pathPreviwImage()  }}" width="80" alt="{{ $allianceRecord->shop->name }}" class="img-thumbnail">
                                            </span>
                                            <div class="chat-body clearfix row">
                                                <div class="col-xs-12">
                                                    <div class="header">
                                                        <strong class="{{ $allianceRecord->shop_id==$shop->id ? "pull-right" : "" }} primary-font">{{ $allianceRecord->shop->name }}</strong> <small class="{{ $allianceRecord->shop_id==$shop->id ? "" : "pull-right" }} text-muted">
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
                                                                        <b>{{ (float) $allianceRecord->from_retribution_per_user_granted }} %</b>
                                                                    </td>
                                                                    <td>
                                                                        <b>$ {{ (float) $allianceRecord->from_limit_per_user_granted }}</b>
                                                                    </td>
                                                                    <td>
                                                                        <b>$ {{ (float) $allianceRecord->from_limit_total_granted }}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ $allianceRecord->alliance->shopTo->name }}</td>
                                                                    <td>
                                                                        <b>{{ (float) $allianceRecord->to_retribution_per_user_granted }} %</b>
                                                                    </td>
                                                                    <td>
                                                                        <b>$ {{ (float) $allianceRecord->to_limit_per_user_granted }}</b>
                                                                    </td>
                                                                    <td>
                                                                        <b>$ {{ (float) $allianceRecord->to_limit_total_granted }}</b>
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
                                        <div class="input-group">
                                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here...">
                                            <span class="input-group-btn">
                                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                            Send</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @foreach($pendingAlliance->allianceRecords as $allianceRecord)
                        <div class="row">
                            <div class="col-xs-12">
                                {{ $allianceRecord->note }}
                            </div>
                        </div>
                        @endforeach
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop