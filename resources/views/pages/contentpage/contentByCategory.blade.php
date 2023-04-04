@include('\layouts\header')

<body>
      <div class="col-md-4">
      <h2>Category {{ $categoryName}} </h2>
        @foreach ($content as $cont)
        <ul class="list-group col-12"  >
          <li class="list-group-item"> {{$cont-> title}}
          </li>
          @endforeach
      </div>
</body>