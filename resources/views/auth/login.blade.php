@extends('layouts.auth')

@section('pageName')
LOGIN
@endsection

@section('content')
<div class="login-reg-panel">
    <div class="login-info-box">
        <h2>Already a member?</h2>
        <p>Sign in with your credentials! </p>
        <label id="label-register" for="log-reg-show">Login</label>
        <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
    </div>
                        
    <div class="register-info-box">
        <h2>Don't have an account?</h2>
        <p>Join us by registering.</p>
        <label id="label-login" for="log-login-show">Register</label>
        <input type="radio" name="active-log-panel" id="log-login-show">
    </div>
                        
    <div class="white-panel">
        
        <div class="login-show">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <h2>{{ __('LOGIN') }}</h2>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group pass_show">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me')}}</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn-tbj">{{ __('LOGIN') }}</button>
                </div>
            </form>
        </div>
        
        <div class="register-show">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2>{{ __('REGISTER') }}</h2>

                <div class="form-group">
                    <div class="row">
                        {{-- <input id="name" type="text" name="name" value="{{ old('fname') }} {{ old('mname') }} {{ old('lname') }}" hidden> --}}
                        <div class="col-sm">
                            <input id="fname" type="name" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First Name" required autocomplete="fname" autofocus>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-sm">
                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" placeholder="Middle Name" required autocomplete="mname" autofocus>

                            @error('mname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm">
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required autocomplete="lname" autofocus>

                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group pass_show">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group pass_show">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <div class="form-group">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required autocomplete="phone" autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="phone">Enter your phone number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                </div> --}}

                <div class="form-group">
                    <select name="gender" class="form-control" id="gender" aria-placeholder="Select Your Gender">
                        <option value=""> Select Your Gender </option>
                        <option value="{{ __('male') }}">Male</option>
                        <option value="{{ __('female') }}">Female</option>
                        <option value="{{ __('other') }}">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="role" class="form-control" id="role">
                        <option value="{{ __('client') }}"> Client </option>
                    </select>
                </div>

                
                {{-- <input type="text" name="users_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="products_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="supervisor_email" value="{{auth()->user()->supervisor_email}}" hidden> --}}

                <button type="submit" class="btn-tbj">{{ __('REGISTER') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- start: international phone --}}
{{-- <script>
    $("input").intlTelInput({
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
    });
</script> --}}
{{-- start: international phone --}}
{{-- start: show password --}}
<script>
    $(document).ready(function(){
    $('.pass_show').append('<span class="ptxt">Show</span>');  
    });


    $(document).on('click','.pass_show .ptxt', function(){ 

    $(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

    $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

    });  
</script>
{{-- end: show password --}}
@endsection