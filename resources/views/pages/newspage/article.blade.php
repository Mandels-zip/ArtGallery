@include('layouts/header')

<body>
      <div class="block">
  <div class="inner-block">

  <img class="" src="{{ asset('storage/images/newsimg/'.$news->img)}}" >   @if(Auth::check() &&(Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator' ))
          <form action="{{ route('news.destroy', $news->id) }}" method="POST">
          @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-outline-danger"> Delete </button> 
          </form>
          <a href="{{route('news.edit', $news->id)}}" type="button" class="btn btn-outline-warning" > Edit</a>
          @endif <div class="date">Published date: {{$news->post_date}}</div></img>
          
  </div>
  <div class="title-block">
    <div class="title-text">{{$news -> title}}</div>
  </div>
  <div class="descript-block"> {{$news -> text}} </b>
</div>
</div>

</body>
