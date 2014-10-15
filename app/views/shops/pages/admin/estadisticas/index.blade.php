@extends('shops.layouts.default')


@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
@stop

@section('js')
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Producto', 'Cantidad'],
      @foreach($data as $row)
       ['{{ $row->product_name }}',{{ $row->cantidad }}],
      @endforeach
    ]);

    var options = {
      title: 'Ventas',
       is3D: true
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
    }

    $(window).resize(function(){
      drawChart();
    });
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
            <div class="col-md-12">
                @include('layouts.partials.errors')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h3 class="no-margin"> Estadísticas</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>

         <div class="row">
            <div id="piechart" class="chart"></div>
         </div>

    </div>
</div>

@stop