@include('layouts/header')

<form method="POST" action="{{route('news.update', $news->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="input" value="{{ $news->title}}" class="form-control" name="title" id="title" required>
        @error('title')
        {{ $message }}
        @enderror
      </div>
    </div>
    

    <div class="col-md-6">
      <div class="mb-3">
      <label for="img" class="form-label">Image:</label>
    @if ($news->img)
        <img src="{{ asset('storage/images/newsimg/' . $news->img) }}" alt="Current image" width="150">
    @endif
    <input type="file" class="form-control" name="img" id="img" accept=".jpep,.png,.jpg" required>
        @error('img')
        {{ $message }}
        @enderror
      </div>
    </div>
  </div>

  <div class="mb-3">
    <label for="text" class="form-label">Text:</label>
    <textarea class="form-control" name="text"  id="text" rows="6" required> {{ $news->text }}</textarea>
    @error('text')
        {{ $message }}
        @enderror
  </div>

  <button type="submit" class="btn btn-warning">Update</button>
</form>