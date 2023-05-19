@include('layouts/header')


<body>
      <div class="col-md-4">
        <h2>Recent News</h2>
    
        @if(Auth::check() &&(Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator' ))
          </a> <a href="{{route('news.create')}}" type="button" class="btn btn-success" > Create </a></li>
        @endif


        @foreach ($news as $article)
  <ul class="list-group col-12">
    <li class="list-group-item">
      <a href="{{route('news.article', ['news' => $article->id]) }}">{{$article -> title}}</a>
      @if(Auth::check() &&(Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator' ))
        <form action="{{ route('news.destroy', $article->id, ) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger"> Delete </button> 
        </form>

         <a href="{{route('news.edit', ['news' => $article->id])}}" type="button" class="btn btn-outline-warning" > Edit</a></li>

    
      @endif
    </li>
  </ul>
@endforeach
        
      </div>
</body>