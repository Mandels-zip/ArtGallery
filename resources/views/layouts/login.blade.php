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
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"  class="form-control @error('login_password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('login_password')
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
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ModalReg">Registration</button>
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

<!-- MODAL REGISTRATION -->
<div class="modal" tabindex="-1" id="ModalReg">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title">Registration </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="POST" action="{{route('register')}}">
        @csrf

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>

        @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        <div class="mb-3">
          <label for="nickname" class="form-label">Nickname</label>
          <input type="input" class="form-control" id="nickname" name="nickname">
        </div>
        @error('nickname')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>
          @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class= "mb-3">
          <label class="form-label" for="number">Date of birth </label>
          <input type="date" class="form-control flatpickr" name="date_of_birth" id="date_of_birth" placeholder="YYYY-MM-DD">
          <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
          <script>
            flatpickr("#date_of_birth", {
              allowInput:true,
              dateFormat: "Y-m-d",
              maxDate: new Date().fp_incr(-6 * 365),
              minDate: new Date().fp_incr(-100 * 365),
              enableTime: false
            });
          </script>

          @error('date_of_birth')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn btn-primary text-centered" type="submit" >Register</button>
      </form>
      </div>
      <div class="modal-footer">
      <a>Already have an account? </a>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
      </div>
    </div>
  </div>
  </div>
