@include('layouts/header')
<body>


<div class="Profile text-center" style="margin: 5em">

<img style="border: 4px solid black; width: 18rem" class="rounded mx-auto d-block rounded-circle" src="{{asset('storage/images/avatar/blank.png')}}" alt="...">

<h2>{{$user->nickname}}</h2>

<h3 class="text-muted opacity-50">{{$user->email}}</h3>

<div class="container">
  <div class="row">
    <div class="col text-center">
      <form class="d-inline-block">
        <div class="mb-3">
          <label for="oldPassword" class="form-label">Old password:</label>
          <input type="password" class="form-control" id="oldPassword" placeholder="type your latest password">
        </div>
        <div class="mb-3">
          <label for="newPassword" class="form-label">New password:</label>
          <input type="password" class="form-control" id="newPassword" placeholder="type your new password">
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Allow the explicit content</label>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger btn-rounded btn-lg"">Create a new post</button>
        </div>
      </form>
    </div>
  </div>
</div>

</div>

<body>
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-justified mb-3" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active nav-underline"
        id="ex3-tab-1"
        data-bs-toggle="tab"
        href="#ex3-tabs-1"
        role="tab"
        aria-controls="ex3-tabs-1"
        aria-selected="false"
        >Liked Posts</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link nav-underline"
        id="ex3-tab-2"
        data-bs-toggle="tab"
        href="#ex3-tabs-2"
        role="tab"
        aria-controls="ex3-tabs-2"
        aria-selected="false"
        >Your Posts</a
      >
    </li>
  </ul>
  <!-- Tabs navs -->

  <!-- Tabs content -->
  <div class="tab-content" id="ex2-content">
    <div
      class="tab-panel fade show active"
      id="ex3-tabs-1"
      role="tabpane"
      aria-labelledby="ex3-tab-1"
    >
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <!-- 1 col -->
  <div class="col">

  @foreach ($likedpost as $liked)
    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('storage/images/contentimg/'.$liked->img)}}" class="img-fluid" alt="Responsive image">
    </div>
  @endforeach
  </div>
  <!-- 2 col -->
  <div class="col">

  </div>

  <!-- 3 col -->

  <div class="col">


  </div>

  <!-- 4 col -->

  <div class="col">

  </div>

  <!-- row 2 - 1 col -->

  <div class="col">

  </div>

  <!-- row 2 - 2 col -->

  <div class="col">

  </div>

  <!-- row 2 - 3 col -->

  <div class="col">

  </div>

  <!-- row 2 - 4 col -->

  <div class="col">

  </div>
    </div>
    </div>
  <div
      class="tab-pane fade"
      id="ex3-tabs-2"
      role="tabpanel"
      aria-labelledby="ex3-tab-2">
      @foreach ($createdcontent as $content)
    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('storage/images/contentimg/'.$content->img)}}" class="img-fluid" alt="Responsive image">
    </div>
  @endforeach
  </div>
  </div>
  <!-- Tabs content -->

  <div class="text-center">
  <button type="submit" class="btn btn-danger btn-rounded btn-lg"">Save current changes</button>
  </div>

  <script>
  $(function() {
    $('#myTab a').on('click', function (e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });
</script>
</body>

 

  
 

</body>
