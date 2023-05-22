@include('layouts/header')
<body>


<div class="Profile text-center" style="margin: 5em">

<img style="border: 4px solid black; width: 18rem" class="rounded mx-auto d-block rounded-circle" src="{{ asset('storage/images/avatar/'.$user->avatar) }}" alt="...">

<h2>{{$user->nickname}}</h2>

<h3 class="text-muted opacity-50">{{$user->email}}</h3>
<div class="container mb-3 mt-3">
@if(Auth::Check())
@if($user->role == 'admin' and Auth::User()-> role != 'admin')

@elseif($user->id == Auth::User()->id || Auth::User()->role == 'admin' ||  Auth::user()->role == 'moderator' )
<a href="{{route('user.settings', ['nickname'=>$user->nickname]) }}" class="btn btn-danger btn-rounded btn-lg">Settings</a>
@endif
@endif
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
      class="tab-pane fade show active"
      id="ex3-tabs-1"
      role="tabpane"
      aria-labelledby="ex3-tab-1"
    >
    <div class="row row-cols-1 row-cols-md-4 g-4">

    @php
$chunks = array_chunk($likedpost->toArray(), 2); // convert Collection to array and divide it into sub-arrays of size 3
@endphp
    <!-- 1 col -->
  @foreach ($chunks as $chunk)
  
  <div class="col">
  @foreach ($chunk as $liked)
    <div class="card h-150" style="width: 5rem, h">
    <a href="{{route('content.details', ['id' => $liked->id]) }}"> <img src="{{asset('storage/images/contentimg/'.$liked->img)}}" class="img-fluid" alt="Responsive image"><a>
    </div>
    @endforeach
  </div>

  @endforeach
    </div>
    </div>
    <div class="tab-content" id="ex2-content">
  <div
      class="tab-pane fade"
      id="ex3-tabs-2"
      role="tabpanel"
      aria-labelledby="ex3-tab-2">
      
      @if(Auth::Check() && Auth::User()-> nickname == $user->nickname)
      <div class="text-center">
      <a class="btn btn-danger btn-rounded btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#createPostModal">Create Post</a>
      </div>
      @endif
      <div class="row row-cols-1 row-cols-md-4 g-4">
      @foreach ($createdcontent as $content)
    <div class="card h-200" style="width: 18rem, h">
    <a href="{{route('content.details', ['id' => $content->id]) }}"><img src="{{asset('storage/images/contentimg/'.$content->img)}}" class="img-fluid" alt="Responsive image"></a>
    </div>
  @endforeach
      </div>
  </div>
  </div>
  </div>
  <!-- Tabs content -->

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

@include('pages/contentpage/createContent')
