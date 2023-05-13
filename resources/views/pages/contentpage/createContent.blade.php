<!-- Modal LOGIN -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createPostModal">Create Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('store.content')}}" enctype="multipart/form-data">
      @csrf
            <div class="mb-3">
            <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control item" id="Title" name="title" placeholder="Title">
                @error('title')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-3">
            <label for="formFile" class="form-label">Choose your image</label>
            <input class="form-control" name='img' type="file" accept=".jpep,.png,.jpg"  id="formFile">
            </div>
            @error('img')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group mb-3 " >
            <span class="input-group-text">Description</span>
            <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                </div>
            <div class="form-group mb-3 " >
            <label for="catergoryId">Choose category</label>

            <input class="form-control" type="text" id="category-search" placeholder="Filter category">
                  <select class="form-control" id="categoryId" name="categoryId">
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('categoryId')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-check mb-3">
            <input class="form-check-input" name="agelimit" type="checkbox" value="1" id="agelimit" 
            onclick="setAgeLimit()">
            <label class="form-check-label" for="flexCheckDefault">
                If this post 18+?
            </label>
            @error('agelimit')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  // Находим поле поиска и добавляем обработчик события input
  $('#category-search').on('input', function() {
    // Получаем значение поля поиска
    var search = $(this).val().toLowerCase();
    
    // Фильтруем опции на основе введенного текста
    $('#categoryId option').filter(function() {
      return $(this).text().toLowerCase().indexOf(search) == -1;
    }).hide();
    $('#categoryId option').filter(function() {
      return $(this).text().toLowerCase().indexOf(search) > -1;
    }).show();
    
  });
});
</script>