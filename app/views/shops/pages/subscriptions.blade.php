@extends('shops.layouts.default')

@section('js')
<script src="http://maps.google.com/maps/api/js?sensor=false&callback=iniciar"></script>

<script>
function iniciar() {

    var myLatlng = new google.maps.LatLng( {{ $shop->lat }}, {{ $shop->lng }} );

    var mapOptions = {
        center: myLatlng,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // To add the marker to the map, use the 'map' property
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "{{ $shop->name }}"
    });
}
</script>
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
        <div class="col-xs-12">
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
                        <td>{{ $suscribed_user->first_name }}</td>
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