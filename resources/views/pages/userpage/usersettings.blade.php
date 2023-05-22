@include('layouts/header')




<div class="Profile text-center" style="margin: 5em">
<img style="border: 4px solid black; width: 18rem" class="rounded mx-auto d-block rounded-circle" src="{{ asset('storage/images/avatar/'.$user->avatar) }}" alt="...">
<h2>{{$user->nickname}}</h2>

<div class="container">
  <div class="row">
    <div class="col text-center">
    @if(Auth::Check())
    @if(Auth::User()-> nickname == $user->nickname)
      <form class="d-inline-block" action="{{route('update.user')}}" enctype="multipart/form-data" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
          <label for="avatar" class="form-label">Avatar:</label>
          <input type="file" class="form-control" id="avatar" accept=".jpep,.png,.jpg"  name="avatar" >
        </div>


      <hr>
          <p>OR </p>

        <div class="mb-3">
          <label for="oldPassword" class="form-label">Old password:</label>
          <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="type your latest password">
        </div>
        @error('oldPassword')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <div class="mb-3">
          <label for="newPassword" class="form-label">New password:</label>
          <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="type your new password">
        </div>
        @error('newPassword')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          <hr>
          <p>OR </p>
          @if($age < 18)
          <small id="input-help" class="form-text text-muted mb-3" >You should be 18 years old </small>
          @endif
        <div class="form-check form-switch">
        <label class="form-check-label" for="enable_explicit">Allow the explicit content</label>
          <input class="form-check-input" value="1" type="checkbox" name="enable_explicit" id="enable_explicit" {{ $user->enable_explicit == 1 && $age >= 18 ? 'checked' : ''}} {{ $age < 18 ? 'disabled' : '' }}>
        </div>
        @error('enable_explicit')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <div class="mb-3">
          <button type="submit" class="btn btn-danger btn-rounded btn-lg">Save changes</button>
        </div>
      </form>

      @endif

      @if($user->id == Auth::User()->id || Auth::User()->role == 'admin' ||  Auth::user()->role == 'moderator' )
          <form class="" action="{{route('destroy.user', ['id' => $user->id])}}" method="POST">
            @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-outline-danger"> Delete Account </button>     
          </form>
          @endif

      @if(Auth::User()->role == 'admin' && $user->role != 'admin')
      <form action="{{route('change.role')}}" method="POST">
      @csrf 
      @method('PUT')
      <select class="form-control w-25 p-3" id="role" name="role" required>
       @foreach($roles as $role)
       <option value="{{$role}}">{{$role}}</option>
       @endforeach
      </select>
      <input type="hidden" name="id" value="{{$user->id}}">
       <button type="submit" class="btn btn-outline-danger">Change role</button>
      </form>

      {{$user->role}}
      @endif
      

    </div>
  </div>
</div>

</div>
@endif


<script>
$('input[name="newPassword"]').on('keypress', function (event) {
          var key = String.fromCharCode(event.keyCode || event.which);
          if (key === ' ') {
              event.preventDefault();
              return false;
          }
        });
</script>