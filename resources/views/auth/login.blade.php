@extends('layouts.auths')

@section('pageName')
LOGIN
@endsection

@section('content')
  <div class="panda">
    <div class="ear"></div>
    <div class="face">
      <div class="eye-shade"></div>
      <div class="eye-white">
        <div class="eye-ball"></div>
      </div>
      <div class="eye-shade rgt"></div>
      <div class="eye-white rgt">
        <div class="eye-ball"></div>
      </div>
      <div class="nose"></div>
      <div class="mouth"></div>
    </div>
    <div class="body"> </div>
      <div class="foot">
        <div class="finger"></div>
      </div>
      <div class="foot rgt">
        <div class="finger"></div>
      </div>
  </div>

  <div class="card-body">
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="hand"></div>
      <div class="hand rgt"></div>
      <h1>Properties Gambia</h1>
      <div class="form-group">
        {{-- <input required="required" class="form-control"/> --}}
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>
        <label class="form-label">E-mail Address    </label>
      </div>
      <div class="form-group">
        {{-- <input id="password" type="password" required="required" class="form-control"/> --}}
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
        <label class="form-label">Password</label>
        <p class="alert">Invalid Credentials..!!</p>
        {{-- <button class="btn">Login </button> --}}
        <button class="btn" type="submit"> Login</button>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">{{ __('Remember Me')}}</label>
        </div> 
        <br>
        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('register') }}">
              {{ __('Are you new here?') }}
          </a>
        @endif
      </div>
    </form>
  </div> 
@endsection

@section('scripts')
  <script>
    $('#password').focusin(function(){
      $('form').addClass('up')
    });
    $('#password').focusout(function(){
      $('form').removeClass('up')
    });
    
    // Panda Eye move
    $(document).on( "mousemove", function( event ) {
      var dw = $(document).width() / 15;
      var dh = $(document).height() / 15;
      var x = event.pageX/ dw;
      var y = event.pageY/ dh;
      $('.eye-ball').css({
        width : x,
        height : y
      });
    });
    
    // validation
    // $('.btn').click(function(){
    //   $('form').addClass('wrong-entry');
    //     setTimeout(function(){ 
    //       $('form').removeClass('wrong-entry');
    //     },3000 );
    // });
  </script>
@endsection