@include('layouts/header')

<body>
@if(Auth::check() &&(Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator' ))
          </a> <a href="{{route('news.create')}}" type="button" class="btn btn-success" > Create </a></li>
        @endif

<div class="container">

    
@foreach ($news as $article)
<div class="newsblock">
  <div> <img class="picture"src="{{asset('storage/images/newsimg/'. $article->img)}}" alt=""> </div>
  <div class="title"><a href="{{route('news.article', ['news'=> $article->id])}}" style="text-decoration: none; color: inherit;">{{$article -> title}}</a></div>
  <div class="descript">{{$article->text}}</div>
  <div class="date">Published date: {{$article->post_date}}2</div>
  <div class="buttons">
  @if(Auth::check() &&(Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator' ))
        <form action="{{ route('news.destroy', $article->id, ) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit"> Delete </button> 
        </form>

        <button><a href="{{route('news.edit', ['news' => $article->id])}}" type="button" style="text-decoration: none; color: inherit;"> Edit</a></button>

    
      @endif
  </div>
</div>
@endforeach
</div>
</body>