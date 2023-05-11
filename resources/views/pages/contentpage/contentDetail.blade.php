@include('\layouts\header')
<body>
      <div class="col-md-4">
        <h2>{{$content ->title }} </h2>
        <ul class="list-group col-12"  >
          <li class="list-group-item">
         <li class="me-3 mb-3">
       
        @guest
     
        <p><i class="fas fa-heart fa-lg" style="color: #636363;"></i> </p>
        </b>
        <textarea disabled>  You are not registered</textarea>
        @endguest

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
        <form action="{{route ('comment.create', ['contentId' => $content->id]) }}" method="POST">
          @csrf
      
          
          <div class="mb-3">
          <label for="body" class="form-label">Write your review</label>
          <textarea class="form-control border auto-resize" style="height: auto; overflow: hidden; resize: none;" id="body" name="body" rows="3"></textarea>
          <button type="submit" class="btn "> Comment</button>
          </div>
        </form>


         @endif
    
      </a>
          </li>


          @foreach ($comments as $comment)
          <div class="card">
              <div class="card-body">
                  <p class="card-text">{{ $comment->body }}</p>
                 
                  <p class="card-text"><small class="text-muted">Posted by {{ $comment->user->nickname }} on {{ $comment->created_at->format('F j, Y') }}</small></p>
                 @if (Auth::check())
                 @if ($content->comment()->where('UserId', Auth::user()->id)->exists() || Auth::user()->role == 'admin' ||  Auth::user()->role == 'moderator')
                <form action="{{route('comment.destroy', ['commentId' => $comment->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
                @endif
                @endif
              </div>
          </div>
          @endforeach

          
      </div>
</body>
