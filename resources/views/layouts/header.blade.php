<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/css/general.css">
    <title>Document</title>

  
    <header>

<!-- NAVBAR -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <a class="navbar-brand me-auto" href="/" >Logo</a>
      <a class="btn me-3" type="button" href="{{ route('newspage') }}" >News</a>
      <a class="btn me-3" type="button" href="{{ route('authorpage') }}" >Author</a>
    </div>
    <form class="d-flex justify-content-center" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-sm" type="submit">Search</button>
    </form>
    <button class="btn ms-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
  </div>
</nav>

</header>


<!-- Modal LOGIN -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Log In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nickname" class="form-label">Nickname</label>
                <input type="input" class="form-control" id="nickname">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
              </div>  
              <button class="btn btn-primary text-centered" type="button" >Log In</button>
          </form>
      </div>
      <div class="modal-footer">
        <a>Not registered? </a>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalReg">Registration</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL REGISTRATION -->
<div class="modal" tabindex="-1" id="exampleModalReg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registration </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="nickname" class="form-label">Nickname</label>
          <input type="input" class="form-control" id="nickname">
        </div>
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class= "mb-3">
          <label class="form-label" for="number">Date of birth </label>
          <div class="container text-center">
            <div class="row align-items-center">

              <div class="col">
                <input type="number" min="1" max="28" id="typeNumber" class="form-control col" placeholder="dd"/>
              </div>
              <div class="col">
                <input type="number" min="1" max="12" id="typeNumber" class="form-control col " placeholder="mm" />
              </div>
              <div class="col">
                <input type="number" min="1900" max="2023" id="typeNumber" class="form-control col " placeholder="yy" />
              </div>

            </div>
          </div>
        </div>
        <button class="btn btn-primary text-centered" type="button" >Register</button>
      </form>
      </div>
      <div class="modal-footer">
      <a>Already have an account? </a>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Log in</button>
      </div>

    </div>
  </div>
</div>



</html>