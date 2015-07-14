@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Crear Usuario</h1>
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <form method="POST" action="/auth/register">            
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">           
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre" required data-validation-required-message="Por favor ingrese un nombre válido.">                        
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Nombre</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required data-validation-required-message="Por favor ingrese un correo electrónico válido.">                        
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required data-validation-required-message="Por favor ingresa una contraseña válida.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Repetir Contraseña</label>
                        <input type="password" class="form-control" placeholder="Repetir Contraseña" name="password_confirmation" id="password_confirmation" required data-validation-required-message="Por favor ingresa una contraseña válida.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default">Crear Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
