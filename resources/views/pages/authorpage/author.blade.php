@include('layouts/header')
<body>


<div class="Profile text-center" style="margin: 5em">

<img style="border: 4px solid black; width: 18rem" class="rounded mx-auto d-block rounded-circle" src="{{asset('images/Pipi.png')}}" alt="...">

<h2>Author</h2>

<h3>Author_Email</h3>


</div>

<body>
  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
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
        class="nav-link"
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
      class="tab-pane fade show active"
      id="ex3-tabs-1"
      role="tabpanel"
      aria-labelledby="ex3-tab-1"
    >
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <!-- 1 col -->
  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>
  <!-- 2 col -->
  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>

  <!-- 3 col -->

  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>

  <!-- 4 col -->

  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>

  <!-- row 2 - 1 col -->

  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>

  <!-- row 2 - 2 col -->

  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>

  <!-- row 2 - 3 col -->

  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>

  <!-- row 2 - 4 col -->

  <div class="col">

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo8.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="card h-200" style="width: 18rem, h">
    <img src="{{asset('images/photo7.jpg')}}" class="img-fluid" alt="Responsive image">
    </div>

  </div>
    </div>
    <div
      class="tab-pane fade"
      id="ex3-tabs-2"
      role="tabpanel"
      aria-labelledby="ex3-tab-2"
    >
      Tab 2 content
    </div>
  </div>
  <!-- Tabs content -->

  <!-- Подключение JavaScript-файла Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>



  
 

</body>

