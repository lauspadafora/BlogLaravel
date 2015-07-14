@extends('app')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Crear Post</h1>
            <form method="POST" action="{{ url('/posts/store') }}">            
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">           
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Título</label>
						<input required="required" value="{{ old('title') }}" placeholder="Título del post" type="text" name="title" class="form-control" required data-validation-required-message="Por favor ingrese un título válido." />                                        
                        <p class="help-block text-danger"></p>
                    </div>
                </div>                
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">                    	
                        <label>Post</label>
                        <textarea name='body' class="form-control">{{ old('body') }}</textarea>			 	                        
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">                    	 
                        <button type="submit" class="btn btn-success">Publicar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection