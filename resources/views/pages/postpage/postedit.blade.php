@include('layouts/header')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<body>
  <div class="container custom-block">
    <img src="{{asset('images/photo10.jpg')}}" class="img-fluid" alt="Responsive image">

    <div class="custom-content d-flex align-items-center justify-content-center text-center">
      <img class="rounded rounded-circle" src="{{asset('images/Pipi.png')}}" alt="...">
      <p>Nickname</p>
    </div>

    <div class="inner">
      <p style="padding-left: 30px; padding-right: 30px; padding-top: 30px; font-size: 32px;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
    </div>

  </div>

  <div class="container d-flex justify-content-center">
    <div class="row">
      <div class="col-md-12">

      <div class="button-container">
        <a href="#" class="btn btn-danger btn-block" style="font-size: 32px;">DELETE</a>
      </div>

      </div>
    </div>
  </div>




  <div class="comments-container">
  <h2>Comments</h2>
  </div>

  <body>
  <div class="comment">
    <img class="rounded rounded-circle" src="{{asset('images/Pipi.png')}}" alt="...">
    <h1>Nickname:</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
  </div>
  </body>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
