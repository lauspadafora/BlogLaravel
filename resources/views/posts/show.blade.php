@extends('app')
@section('content') 
<article>
  <div class="container">
    @if($post)
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h1 class="section-heading">{!! $post->title !!}</h1>
        <p>{!! $post->body !!}</p>     
        <button class="btn" style="float: right"><a href="{{ url('posts/edit/'.$post->slug)}}">Editar</a></button> 
      </div>
    </div>
    @endif
  </div>
</article>
<hr> 
@endsection