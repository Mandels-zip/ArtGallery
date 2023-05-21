@include('layouts/header')
        <ul class="list-group col-12"  >git
          <li class="list-group-item"> {{$news -> title}} </a>
           {{$news -> text}} </b>
           <img src="{{ asset('storage/images/newsimg/'.$news->img)}}" > </img>
           {{$news -> post_date}}
          </li>
          <div class="d-grid gap-2 col-6 mx-auto">
          
          @if(Auth::check() &&(Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator' ))
          <form action="{{ route('news.destroy', $news->id) }}" method="POST">
          @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-outline-danger"> Delete </button> 
          </form>
          <a href="{{route('news.edit', $news->id)}}" type="button" class="btn btn-outline-warning" > Edit</a>
          @endif
         
          </div>