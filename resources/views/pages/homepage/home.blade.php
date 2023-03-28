@include('\layouts\header')
<body>

<div class="container text-center">
<h1>Topics</h1>
</div>

<div class="container text-center">
@foreach ($categories as $category)
    <a href="#" src="{{asset('images/'.  $category->img)}}" style="background-image: url({{asset('images/'.  $category->img)}}); background-size: 280px;
            background-repeat: no-repeat;
            background-position: center; padding: 20px 40px; font-size: 50px; border-radius: 20px; object-fit: cover" class="btn btn-dark">{{$category->name}}</a>
@endforeach
    
    <div class="container text-center">
        <h2>Content</h2>
    </div>

   <div class="container text-center">
  <div class="row">

    <div clss="col">
    <img src="" class="img-fluid" alt="Responsive image">
    </div>

    <div class="col">
    <img src="..." class="img-fluid" alt="Responsive image">
    </div>
    <div class="col">
    <img src="..." class="img-fluid" alt="Responsive image">
    </div>
    <div class="col">
    <img src="..." class="img-fluid" alt="Responsive image">
    </div>
    <div class="col">
    <img src="..." class="img-fluid" alt="Responsive image">
    </div>
    <div class="col">
    <img src="..." class="img-fluid" alt="Responsive image">
    </div>
   
  </div>
</div>

  </div>
</div>




</body>