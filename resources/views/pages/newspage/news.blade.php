@include('\layouts\header')


<body>
      <div class="col-md-4">
        <h2>Recent News</h2>
        @foreach ($news as $new)
        <ul class="list-group col-12"  >
          <li class="list-group-item"><a href="{{route('news.article', ['news' => $new->id]) }}">{{$new -> title}} </a>
          </li>

        @endforeach
        
      </div>
</body>