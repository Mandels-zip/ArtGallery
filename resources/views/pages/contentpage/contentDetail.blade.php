@include('\layouts\header')

<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<body>
  <div class="container custom-block-edit">
    <img src="{{asset('storage/images/contentimg/'.$content->img)}}" class="img-fluid poster_image" alt="Responsive image">

    <div class="custom-content d-flex align-items-center justify-content-center text-center">
      <h1>{{$content ->title}}
      </h1>
    </div>

    <div class="small-content custom-content d-flex align-items-center justify-content-center text-center">
      <h3>by:</h3>
      <div class="mini-avatar">
        <img class="rounded rounded-circle" src="{{asset('storage/images/avatar/'. $user->avatar)}}" alt="...">
      </div>
      <div class="mini-nickname">
      <h2>{{$user->nickname}}</h2>
      </div>
    </div>

    <div class="inner">
      <p style="padding-left: 30px; padding-right: 30px; padding-top: 30px; font-size: 32px;">{{$content->description}}  

      @if (Auth::check())
          @if ($content->like()->where('UserId', Auth::user()->id)->exists())
        <form action="{{ route('like.toggle', ['contentId' => $content->id]) }}" method="POST">
          @csrf
          <button type="submit"  class="btn btn-lg like-button"> <i class="fas fa-heart fa-lg"> </i> </button>
        </form>
         @else(Auth::check())
         <form action="{{ route('like.toggle', ['contentId' => $content->id]) }}" method="POST">
         @csrf
         <button type="submit"  class="btn btn-lg like-button "> <i class="far fa-heart fa-lg"> </i> </button>
        </form>

         @endif
      @endif</p>
    </div>
  </div>

  @if(Auth::check())
           @if($content-> userId == Auth::User()->id || Auth::User()->role == 'admin' ||  Auth::user()->role == 'moderator' )

  <div class="container d-flex justify-content-center">
    <div class="row">
      <div class="col-md-12">

      <div class="button-container">
      <form action="{{route('destroy.content', ['contentId' => $content->id])}}" method="POST" >
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger btn-block" style="font-size: 32px;">DELETE
        </button>
      </form>
      </div>

      </div>
    </div>
  </div>

  @endif
  @endif
  <div class="comments-container">
  <h2>Comments</h2>
  </div>

  @if(Auth::Check())
  <form action="{{route ('comment.create', ['contentId' => $content->id]) }}" method="POST">
    @csrf
    <div class="your_comment">
      <input type="text" placeholder="add your comment" name="body">
      <button type="submit" class="image-button">
        <img class="" src="{{asset('storage\images\send.png')}}" alt="...">
      </button>
    </div>
  </form>
  @endif

  @foreach ($comments as $comment)
  <div class="comment d-flex flex-row mb-3">
    <div class="avatar p-2">
    <a href="{{route('user.page', ['nickname' => $comment->user->nickname]) }}"><img class="rounded rounded-circle" src="{{ asset('storage/images/avatar/'.$comment->user->avatar) }}" alt="..."></a>
    </div>

    <div class="username p-2">
      <p>{{$comment->user->nickname}}:</p>
    </div>
    
    <div class="is_comment p-2">
      <p>{{ $comment->body }}</p>
    </div>

    
    <div class="button-container">
    @if (Auth::check())
    @if ($comment->userId == Auth::User()->id || Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator')
    <form action="{{route('comment.destroy', ['commentId' => $comment->id])}}" method="POST">
                @csrf
                @method('DELETE')
      <button type="submit" class="btn">X</button>
      </form>
      @endif
    @endif
    </div>
   
  </div> 
  @endforeach


  @guest    
  <div class="your_comment">
    <input type="text" placeholder="you are not registered" disabled>
  </div>>
  @endguest

  </body>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
