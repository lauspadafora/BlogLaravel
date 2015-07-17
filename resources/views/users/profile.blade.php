@extends('app')
@section('content') 
<article>
  <div class="container">    
    <div class="row">      
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h1 class="section-heading">Perfil de {{ $name }}</h1>
          <p>Nombre: {{ $name }}</p>
          <p>Correo Electrónico: {{ $email }}</p>
          <p>Número de posts en el blog: {{ $posts_count }} </p> 
          <p>Número de posts activos en el blog: {{ $posts_active_count }} </p> 
          <p>Número de posts inactivos en el blog: {{ $posts_inactive_count }} </p> 
          <p>Número de comentarios en el blog: {{ $comments_count }} </p>         
        </div>
    </div>
  </div>
</article>
<hr> 
@endsection