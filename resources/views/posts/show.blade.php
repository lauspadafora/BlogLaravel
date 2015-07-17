@extends('app')
@section('content') 
<article>
  <div class="container">
    @if($post)
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h1 class="section-heading">{!! $post->title !!}</h1>
        <p>{!! $post->body !!}</p>     
        @if (Auth::user()->hasRole('role-name') || Auth::id() == $post->author_id)
        <button class="btn" style="float: right"><a href="{{ url('posts/edit/'.$post->slug)}}">Editar</a></button> 
        @else
          <h3 class="subheading">Deja tu comentario aquí!</h3>   
          <form method="POST" action="{{ url('/comments/store') }}">            
              <input type="hidden" name="_token" value="{{ csrf_token() }}">           
              <input type="hidden" name="id_post" value="{{ $post->id }}"> 
              <input type="hidden" name="slug" value="{{ $post->slug }}"> 
              <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">                                         
                      <textarea name='body' class="form-control"></textarea>  
                  </div>
              </div>   
              <br>       
              <div class="row">
                  <div class="form-group col-xs-12">                       
                      <button type="submit" class="btn btn-success">Enviar Comentario</button>
                  </div>
              </div>            
          </form>     
          <br>   
          @if (!$comments->count())
            <p>Todavía no hay comentarios publicados.</p>
          @else
            @foreach($comments as $comment)
              <div class="post-preview">
                <blockquote>{{ $comment->body }}</blockquote>           
                <p class="post-meta">Comentario por {{ $comment->author->name }} el {{ $comment->created_at->format('d/m/y \a\ \l\a\s h:i a') }} --- <a href="{{ url('/comments/destroy/'.$comment->id) }}">Eliminar</a></p>                 
              </div>
            @endforeach
          @endif
        @endif
      </div>
    </div>
    @endif
  </div>
</article>
<hr> 
@endsection