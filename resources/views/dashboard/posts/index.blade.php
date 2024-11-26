@extends('layouts.master')

@section('content')

<div class="col-12 mb-4">
    
    <a href="{{ route('post.create') }}" class="btn btn-primary">Agregar</a>

</div>

    <div class="col-12"> 
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">URL</th>
                <th scope="col">Publicado</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id}}</th>

                    <td>{{ $post->title}}</td>
                    <td>{{ $post->category_name}}</td>
                    <td>{{ $post->url_clean}}</td>
                    <td>{{ $post->publicado}}</td>
                    <td> 
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Editar</a>
                        
                            <!--<button class="btn btn-danger">Eliminar</button>-->
                            
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Eliminar
                            </button>
  
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estas seguro de querer eliminar?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action = "{{ route('post.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form> 
                            </div>
                            </div>
                            </div>
                            </div>
                          
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
<div class="col-12">
    {{$posts->links()}}
</div>
@endsection