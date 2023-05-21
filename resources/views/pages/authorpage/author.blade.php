@include('layouts/header')

<body>
<div class="Profile text-center">
<img class="profile-image" src="{{asset('storage\images\avatar\Pipi.png')}}" alt="...">
<h2 class="profile-title">Author</h2>
<h3 class="profile-email">Author_Email</h3>
<div class="container">
  <div class="row">
    <div class="col text-center">
      <form class="d-inline-block">
        <div class="mb-3 your_password">
          <label for="oldPassword" class="form-label">Old password:</label>
          <input type="password" class="form-control" id="oldPassword" placeholder="type your latest password">
        </div>
        <div class="mb-3 your_password">
          <label for="newPassword" class="form-label">New password:</label>
          <input type="password" class="form-control" id="newPassword" placeholder="type your new password">
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Allow explicit content</label>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger btn-rounded btn-lg">Create a new post</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<body>
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link nav-underline" id="ex3-tab-1" data-bs-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="false">Liked Posts</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link nav-underline" id="ex3-tab-2" data-bs-toggle="tab" href="#ex3-tabs-2" role="tab" aria-controls="ex3-tabs-2" aria-selected="false">Your Posts</a>
    </li>
  </ul>
  <!-- Tabs navs -->
  <!-- Tabs content -->
  <div class="tab-content" id="ex2-content">
    <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
<!-- posted content -->

<div class="card h-200">
  <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
</div>

</div>
  </div>
  <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
    Tab 2 content
  </div>
  <!-- Tabs content -->
  <div class="text-center">
    <button type="submit" class="btn btn-danger btn-rounded btn-lg">Save current changes</button>
  </div>
  <!-- Подключение JavaScript-файла Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
