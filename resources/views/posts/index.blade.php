@extends('app') 
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @if (!$posts->count())
              <p>Todavía no hay posts publicados. Escribe el tuyo <a href="{{ url('posts/create/') }}">HACIENDO CLICK AQUÍ!</a></p>
            @else
            @foreach( $posts as $post )
              <div class="post-preview">
                  <a href="{{ url('posts/show/'.$post->slug) }}">
                      <h2 class="post-title">
                          {{ $post->title }}
                      </h2>                      
                  </a>
                  @if (Auth::user()->hasRole('Admin') || Auth::id() == $post->author_id)
                  <div style="float: right;">
                    <button class="btn btn-default"><a href="{{ url('posts/edit/'.$post->slug) }}">Editar</a></button>
                    <button class="btn btn-danger"><a href="{{ url('posts/destroy/'.$post->id) }}">Eliminar</a></button>
                  </div>
                  @endif
                  <p class="post-meta">Publicado por <a href="#">{{ $post->author->name }}</a> el  {{ $post->created_at->format('d/m/y \a\ \l\a\s h:i a') }}</p>
              </div>
              <hr>
            @endforeach            
        </div>
    </div>
</div>
@endif
@endsection