@extends('.........layouts.default')

@section('content')


<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">
            Nueva venta
        </h1>
    </div>
</div>
<div class="row">

    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        {{ Form::open(['route'=>'register_path','class'=>'validate']) }}

        <!-- Nombres Form Input -->
        <div class="form-group">
            {{ Form::label('nombres','Nombre del cliente:') }}
            {{ Form::text('nombres',null,['class'=>'form-control','required'=>'required']) }}
        </div>

        <!-- Apellidos Form Input -->
        <div class="form-group">
            {{ Form::label('apellidos','Documento:') }}
            {{ Form::text('apellidos',null,['class'=>'form-control','required'=>'required']) }}
        </div>

        <!-- Fecha de nacimiento Form Input -->
        <div class="form-group">
            {{ Form::label('fecha_nacimiento','Fecha de la venta:') }}
            {{ Form::text('fecha_nacimiento',null,['class'=>'form-control datepickerBirthday','required'=>'required']) }}
        </div>


        <!-- Email Form Input -->
        <div class="form-group">
            {{ Form::label('email','E-mail:') }}
            {{ Form::email('email',null,['class'=>'form-control','required'=>'required']) }}
        </div>

        

        <div class="form-group">
            {{ Form::submit('Enviar',['class'=>'btn btn-success']) }}
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop