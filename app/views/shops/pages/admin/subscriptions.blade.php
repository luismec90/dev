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
        <div class="col-xs-12">
        <a class="btn btn-primary pull-right" href="{{ route('export_subscriptions_path',$shop->link) }}">Exportar a Excel</a>
            <h3 class="no-margin">Suscripciones</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
          <h4></h> Total de usuarios suscritos: <b>{{ $suscribed_users->count() }}</b></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Nombres</td>
                    <td>Correo</td>
                    <td>Sexo</td>
                </tr>
                @foreach($suscribed_users as $suscribed_user)
                    <tr>
                        <td>{{ $suscribed_user->first_name." ".$suscribed_user->last_name }}</td>
                        <td>{{ $suscribed_user->email }}</td>
                        <td>
                        @if($suscribed_user->gender=='f')
                            Femenino
                        @elseif($suscribed_user->gender=='m')
                            Masculino
                        @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        </div>
</div>
<br>
@stop