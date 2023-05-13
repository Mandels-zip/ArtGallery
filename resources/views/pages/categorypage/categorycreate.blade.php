@include('\layouts\header')

<form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="title" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" id="name" required>
  
      </div>
    </div>
    
    <div class="col-md-6">
      <div class="mb-3">
        <label for="img" class="form-label">Image:</label>
        <input type="file" class="form-control" name="img" id="img" accept=".jpep,.png,.jpg" required>
      </div>
    </div>
  </div>


  <button type="submit" class="btn btn-primary">Create</button>
</form>