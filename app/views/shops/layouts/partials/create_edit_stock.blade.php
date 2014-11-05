<div class="row">
    <div class="col-md-10 ">
        <br>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Name Form Input -->
        <div class="form-group">
            {{ Form::label('name','Nombre:') }}
            {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
         </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Unit_id Form Input -->
        <div class="form-group">
            {{ Form::label('unit_id','Unidad:') }}
            {{ Form::select('unit_id',$array_units,null,['class'=>'form-control']) }}
         </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Trigger Form Input -->
        <div class="form-group">
            {{ Form::label('trigger','Umbral:') }}
            {{ Form::text('trigger',null,['class'=>'form-control']) }}
         </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 ">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    {{ Form::submit('Enviar',['class'=>'btn btn-primary btn-block']) }}
                </div>
            </div>
        </div>
    </div>
</div>

