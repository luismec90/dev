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
                    {{ Form::open(['route'=>['statistics_path',$shop->link],'method'=>'GET','class'=>'form-submit']) }}
                        <div class="col-md-2">
                            <div class="form-group">
                                {{ Form::label('since','Desde:') }}
                                {{ Form::text('since',Input::has('since') ? Input::get('since') : '',['id'=>'since','class'=>'form-control datepicker']) }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                {{ Form::label('until','Hasta:') }}
                                {{ Form::text('until',Input::has('until') ? Input::get('until') : '',['id'=>'until','class'=>'form-control datepicker']) }}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <br>
                                <button type="submit" title="Buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <br>
                                <a class="btn btn-default" title="Limpiar formulario" href="{{ route('statistics_path',$shop->link) }}"><i class="fa fa-refresh"></i></a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>

         <div class="row">
            <div id="piechart" class="chart"></div>
         </div>

    </div>
</div>

@stop