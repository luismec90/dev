@extends('layouts.default')

@section('css')
{{ HTML::style('assets/libs/bootstrapvalidator/css/bootstrapValidator.min.css') }}
{{ HTML::style('assets/css/registro.css') }}
@stop

@section('js')
{{ HTML::script('assets/libs/bootstrapvalidator/js/bootstrapValidator.js') }}
{{ HTML::script('assets/libs/bootstrapvalidator/js/language/es_ES.js') }}
{{ HTML::script('assets/js/validation.js') }}
@stop

@section('content')
<section id="contact" class="section section-center section-contact">
    <div class="container">
        <h2 class="section-title"><span>Contacto</span></h2>
        <p> Deja tu mensaje y te contactaremos a la brevedad.</p>
        <div class="main-action">
            <form method="post" action="contact.php" name="contactform" id="contactform">
                <div class="results"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="sr-only">Mensaje</label>
                            <textarea name="message" class="form-control" placeholder="Mensaje" style="height: 181px" rows="6" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="sr-only">Asunto</label>
                            <input name="subject" type="text" class="form-control" placeholder="Asunto" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Nombre</label>
                            <input name="name" type="text" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <button id="submit" type="submit" class="btn btn-primary btn-block">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@stop