@csrf
    <div class="mb-3">
      <label for="title" class="form-label">Titulo</label>
      <input type="text" class="form-control" id="title" name = "title" value = "{{old('title', $post->title)}}">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
          <label for="url_clean" class="form-label">Categoria</label>
          <select class="form-select" aria-label="Categories" id ="category_id" name = "category_id" value = "{{old('category_id', $post->category_id)}}">
            <option selected disabled>Seleccione</option>
            @foreach ($categories as $category)
            <option value="{{$category-> id}}" @if ($post->category_id == $category->id) selected @endif>{{$category->name}}</option>    
            @endforeach
          </select>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
      <label for="url_clean" class="form-label">URL</label>
      <input type="text" class="form-control" id="url_clean" name = "url_clean" value = "{{old('url_clean', $post->url_clean)}}">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Contenido</label>
      <input type="text" class="form-control" id="content" name = "content" value = "{{old('content', $post->content)}}">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="posted" name = "posted">
      <label class="form-check-label" for="posted">Publicado</label>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>