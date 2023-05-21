
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/post.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/author.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
    
  
    <header>
    @include('/layouts/login')
<!-- NAVBAR -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <a class="navbar-brand me-auto" href="/" >Home</a>
      <a class="btn me-3" type="button" href="/news" >News</a>
      <a class="btn me-3" type="button" href="{{ route('post') }}" >post</a>
      <a class="btn me-3" type="button" href="{{ route('author') }}" >author</a>
      <a class="btn me-3" type="button" href="{{ route('main') }}" >main</a>
</div>
@if($viewData['enable_search'] ?? true)
      <form>
        <input
          type="search"
          class="form-control"
          placeholder="Search"
          name="search"
          value="{{ request('search') }}">
      </form>
      @endif


    @guest
    <a class="btn ms-3" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
    @endguest

    @if(Auth::check())
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->nickname }}
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{route('user.page', ['nickname' => Auth::User()->nickname])}}">dashboard</a></li>
        <li><form method="POST" action="{{ route('logout')}}">
          @csrf
        <button type="submit" class="dropdown-item" >Logout</button>
        </form></li>
      </ul>
    </div>
    @endif


  </div>
</nav>

</header>
  <body>

  </body>

</html>