@extends('layouts.default')
@section('content')
<section >
    <div class="container">
        <h2 class="section-title"><span>Mis tiendas</span></h2>
        <div class="main-action">
            <div class="row">
                <br><br>
                <div class="col-xs-12">
                    @if(!empty($ownShops))
                    <legend>Como administrador</legend>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Establecimiento</th>
                            <th>Opciones</th>
                        </tr>
                        @foreach($ownShops as $shop)
                        <tr>
                            <td>{{ $shop->name }}</td>
                            <td><a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página </a></td>
                            @endforeach
                    </table>
                    <br>
                    @endif
                </div>
            </div>
            <div class="row">
                <br><br>
                <div class="col-xs-12">
                    @if(!empty($shops))
                        <legend>Por compras relizadas</legend>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Establecimiento</th>
                                <th>Opciones</th>
                                <th>Saldo</th>
                            </tr>
                            @foreach($shops as $shop)
                            <tr>
                                <td>{{ $shop->name }}</td>
                                <td><a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página </a></td>
                                <td> {{ Currency::toFront(Auth::user()->saldo($shop->id))  }}</td>
                            </tr>
                            @endforeach
                        </table>
                        <br>
                    @endif
                </div>
            </div>

            <div class="row">
                <br><br>
                <div class="col-xs-12">
                    @if(!empty($shopsByAlliances))
                        <legend>Por alianzas</legend>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Establecimiento</th>
                                <th>Opciones</th>
                                <th>Saldo</th>
                            </tr>
                            @foreach($shopsByAlliances as $shop)
                            <tr>
                                <td>{{ $shop->name }}</td>
                                <td><a href="{{ route('shop_path',$shop->link) }}" class="btn btn-primary btn-sm">Ver página </a></td>
                                <td> {{ Currency::toFront(Auth::user()->saldo($shop->id))  }}</td>
                            </tr>
                            @endforeach
                        </table>
                        <br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@stop