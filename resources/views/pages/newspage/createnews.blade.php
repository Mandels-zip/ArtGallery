@include('\layouts\header')

<form method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
  @csrf
  
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" name="title" id="title" required>
        @error('title')
        {{ $message }}
        @enderror
      </div>
    </div>
    

    <div class="col-md-6">
      <div class="mb-3">
        <label for="img" class="form-label">Image:</label>
        <input type="file" class="form-control" name="img" id="img" required>
        @error('img')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>

  <div class="mb-3">
    <label for="text" class="form-label">Text:</label>
    <textarea class="form-control" name="text" id="text" rows="6" required></textarea>
    @error('text')
        {{ $message }}
        @enderror
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>