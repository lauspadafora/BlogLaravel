@extends('app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1>Editar Post</h1>
            <form method="POST" action="{{ url('/posts/update') }}">            
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="post_id" value="{{ $post->id }}">           
              <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">
                      <label>Título</label>
                      <input required="required" value="{{$post->title}}" placeholder="Título del post" type="text" name="title" class="form-control" required data-validation-required-message="Por favor ingrese un título válido." />                                        
                      <p class="help-block text-danger"></p>
                  </div>
              </div>                
              <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">                     
                      <label>Post</label>
                      <textarea name='body' style="height: 300px;" class="form-control">{{ $post->body }}</textarea>                               
                      <p class="help-block text-danger"></p>
                  </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="row">
                  <div class="form-group col-xs-12">                       
                      <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection