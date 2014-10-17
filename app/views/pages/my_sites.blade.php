@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')
<section id="contact" class="section  section-contact">
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
                   @if(!empty($ownShops))
                        <legend>Como cliente</legend>
                   @endif
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
                <td>$ {{ Auth::user()->saldo($shop->id)  }}</td>
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