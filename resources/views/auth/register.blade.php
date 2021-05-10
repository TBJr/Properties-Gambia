@extends('layouts.auths1')

@section('pageName')
REGISTER
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

        <div class="body"></div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="hand"></div>
            <div class="hand rgt"></div>
            <h1>Properties Gambia</h1>
            <h4>Registration form</h4>

            {{-- <div class="form-group">
                <input id="fname" type="name" class="form-control @error('fname') is-invalid @enderror" name="fname" required autofocus>
                <label class="form-label">First Name </label>
            </div> --}}
            <input type="text" name="admin" value="0" hidden>
            <div class="form-group">

                <div class="col-sm-2">
                    <input id="fname" type="name" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First Name" required autocomplete="fname" autofocus>

                    @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" placeholder="Middle Name" required autocomplete="mname" autofocus>

                    @error('mname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required autocomplete="lname" autofocus>

                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" required autocomplete="email">
    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <div class="col-sm-2">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone" autofocus>
    
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <input id="profession" type="name" class="form-control @error('profession') is-invalid @enderror" name="profession" placeholder="Your Profession" required autocomplete="Profession" autofocus>
    
                    @error('profession')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <select name="gender" class="form-control" id="gender" aria-placeholder="Select Your Gender">
                        <option value=""> Select Your Gender </option>
                        <option value="{{ __('male') }}">Male</option>
                        <option value="{{ __('female') }}">Female</option>
                        <option value="{{ __('other') }}">Other</option>
                    </select>
                </div>
                <div class="col-sm">
                    <select name="role" class="form-control" id="role" hidden>
                        <option value="{{ __('client') }}"> Client </option>
                    </select>
                </div>

                <button class="btn" type="submit"> Register</button>
                <br><br>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('login') }}"> {{ __('Already a member?')}} </a>
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