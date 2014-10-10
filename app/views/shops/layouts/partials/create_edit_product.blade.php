<div class="row">
    <div class="col-md-10 ">
        <br>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-12">
                <div id="photo2-product" class="img-thumbnail"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <div><b>Nota:</b> Se recomienda que la foto tenga el doble de ancho que de alto, ademas de una resolución minima de 800x400 pixeles </div>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly="">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Foto del producto
                                {{ Form::file('photo',['id'=>'file-photo2','accept'=>'image/*','required'=>'true']) }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="row">
    <div class="col-md-10 ">
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Nombre Form Input -->
        <div class="form-group">
            {{ Form::label('name','Nombre:') }}
            {{ Form::text('name',null,['class'=>'form-control','required'=>'required']) }}
         </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Precio Form Input -->
        <div class="form-group">
            {{ Form::label('price','Precio:') }}
            {{ Form::number('price',null,['class'=>'form-control','required'=>'required']) }}
         </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Servicio a domicilio -->
        <div class="checkbox">
            <label>
                {{ Form::checkbox('delivery_service', '1'); }} Servicio a domicilio
            </label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <!-- Descripción Form Input -->
        <div class="form-group">
            {{ Form::label('description','Descripción:') }}
            {{ Form::textarea('description',null,['class'=>'form-control','required'=>'required']) }}
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

