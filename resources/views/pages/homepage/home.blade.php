@include('\layouts\header')
<body>

<div class="container text-center">
<h1>Topics</h1>
</div>

<div class="container text-center">


  <div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($categories as $category)
  <div class="col">
    <div class="card h-200" style="width: 18rem, h">
      <img src="{{asset('images/'.  $category->img)}}"  class="card-img-top"  alt="...">
      <div class="card-body">
      <a href="#" class="btn btn-primary">{{$category-> name}}</a>
      </div>
    </div>
  </div>
    @endforeach
  </div>
 
</div>



    <div class="container text-center">
        <h2>Content</h2>
    </div>

   <div class="container text-center">
  <div class="row">

  @foreach ($content as $cont)
    <div class="col">
    <a href="{{route('content.details', ['id' => $cont->id]) }}"><img src="{{asset('images/'.  $cont->img)}}" class="img-fluid" alt="Responsive image"></a>
    </div>
    @endforeach
  </div>
</div>

</body>