<!-- Modal LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Log In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="{{ url('/login') }}">
          {{ csrf_field() }}
              <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required >
                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
               
              </div>  
              <button type="submit" class="btn btn-primary">
              {{ __('Login') }}
              </button>
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

<script>
  $('#login-modal').on('shown.bs.modal', function () {
    $(function() {
        $('#loginModal').submit(function(event) {
            event.preventDefault();

            $.ajax({
                type: 'POST', 
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Handle successful login
                },
                error: function(response) {
                    // Handle failed login
                }
            });
        });
    });
  });
</script>
