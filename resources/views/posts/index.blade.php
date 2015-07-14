@extends('app') 
@section('content') 
@if ( !$posts->count() )
No hay posts.
@else
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach( $posts as $post )
              <div class="post-preview">
                  <a href="{{ url('posts/show/'.$post->slug) }}">
                      <h2 class="post-title">
                          {{ $post->title }}
                      </h2>                      
                  </a>
                  <button class="btn" style="float: right"><a href="{{ url('posts/edit/'.$post->slug)}}">Editar</a></button>
                  <p class="post-meta">Posted by <a href="#">{{ $post->author->name }}</a> on {{ $post->created_at->format('M d,Y \a\t h:i a') }}</p>
              </div>
              <hr>
            @endforeach
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
@endsection