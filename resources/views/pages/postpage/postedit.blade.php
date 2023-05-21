@include('layouts/header')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<body>
  <div class="container custom-block-edit">
    <img src="{{asset('storage\images\contentimg\photo10.jpg')}}" class="img-fluid poster_image" alt="Responsive image">

    <div class="custom-content d-flex align-items-center justify-content-center text-center">
      <h1>Title</h1>
    </div>

    <div class="small-content custom-content d-flex align-items-center justify-content-center text-center">
      <h3>by:</h3>
      <div class="mini-avatar">
        <img class="rounded rounded-circle" src="{{asset('storage\images\avatar\Pipi.png')}}" alt="...">
      </div>
      <div class="mini-nickname">
        <h2>Nickname</h2>
      </div>
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

  <div class="comment d-flex flex-row mb-3">
    <div class="avatar p-2">
      <img class="rounded rounded-circle" src="{{asset('storage\images\avatar\Pipi.png')}}" alt="...">
    </div>

    <div class="username p-2">
      <p>Nickname:</p>
    </div>

    <div class="is_comment p-2">
      <p>Very nice art! I like your style! :)</p>
    </div>

    <div class="button-container">
      <button class="btn">X</button>
    </div>


  </div>

  <div class="your_comment">
    <input type="text" placeholder="add your comment">
    <button class="image-button">
      <img class="" src="{{asset('storage\images\contentimg\send.png')}}" alt="...">
    </button>
  </div>

  </body>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
