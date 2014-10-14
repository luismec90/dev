<div class="row">
    <div class="col-md-10 ">
        <br>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-12">
                <div id="photo-cover" class="img-thumbnail" {{ isset($cover) ? "style='background-image:url({$cover->pathImage($shop->id)})'":"" }}></div>
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
                    <div><b>Nota:</b> Se recomienda que la foto tenga el triple de ancho que de alto, con una resolución recomendada de 900x300 pixeles </div>
                    <div class="input-group">
                        <input type="text" value="{{ isset($cover) ? $cover->image :"" }}" class="form-control" readonly="">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Cover
                                {{ Form::file('photo',['id'=>'file-photo','accept'=>'image/*']) }}
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
            {{ Form::label('caption','Mensaje:') }}
            {{ Form::text('caption',null,['class'=>'form-control','required'=>'required']) }}
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

