@extends('shops.layouts.default')

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
            <div class="col-md-12">
                @include('layouts.partials.errors')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-10">
                <a href="{{ URL::route('stock_path',$shop->link) }}" class="btn btn-primary" title=""><i class="fa fa-reply"></i> Volver atras</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h3 class="no-margin"> Histórico: {{ $stock->name }}  <span class="pull-right">{{ $stock->total_amount.' '. $stock->unit->name }}</span></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Cantidad</td>
                            <td>Descripcion</td>
                            <td>fecha</td>
                        </tr>
                            @foreach($historicals as $historical)
                                <tr>
                                    <td>
                                        {{ $historical->amount }}
                                    </td>
                                     <td>
                                        {{ $historical->description }}
                                    </td>
                                     <td>
                                        {{ $historical->created_at }}
                                    </td>
                                </tr>
                        @endforeach
                    </thead>

                </table>
                 {{ $historicals->links(); }}
            </div>
        </div>
    </div>
</div>

@stop