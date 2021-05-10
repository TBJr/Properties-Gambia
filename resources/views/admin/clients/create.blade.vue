@extends('layouts.admin')

@section('pageName')
New Customer
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">

                    <h3 class="card-title mb-0 text-center text-white">
                        <strong>NEW CUSTOMER FORM</strong>
                        <p><small>Data Entry Form</small></p>
                    </h3>

                    <div class="card-tools">
                        <a href="{{ route('clients.index') }}" class="btn btn-outline-success"><i class="fas fa-shield-alt"></i> BACK</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                
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
                            <select name="role" class="form-control" id="role" hidden>
                                <option value="{{ __('client') }}"> Client </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
        
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

                        <div class="form-group">
                            <select name="gender" class="form-control" id="gender" aria-placeholder="Select Your Gender">
                                <option value=""> Select Your Gender </option>
                                <option value="{{ __('male') }}">Male</option>
                                <option value="{{ __('female') }}">Female</option>
                                <option value="{{ __('other') }}">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="profession" type="profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" placeholder="Client Profession" required autocomplete="profession">
        
                            @error('profession')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-sm">
                                    <select name="country" id="country" class="form-control" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>    
                                </div>
                                
                                {{-- <div class="col-sm">
                                    <select name="state" id="country" class="form-control">
                                        <option value="">Select State</option>   
                                    </select>
                                </div>
        
                                <div class="col-sm">
                                    <select name="city" id="state" class="form-control">
                                        <option value="">Select City</option>   
                                    </select> 
                                </div> --}}

                                <div class="col-sm">
                                    <select name="city" id="country" class="form-control">
                                        <option value="">Select City</option>   
                                    </select>
                                </div>
        
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('REGISTER') }}</button>
                        </div>
                        
                    </form>
                </div>

                <script>
                    $(document).ready(function(){
                        $('select[name="country"]').on('change',function(){
                            var country_id= $(this).val();
                            if (country_id) {
                                $.ajax({
                                url: "{{url('/getCities/')}}/"+country_id,
                                type: "GET",
                                dataType: "json",
                                success: function(data){
                                console.log(data);
                                $('select[name="city"]').empty();
                                $.each(data,function(key,value){
                                    $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                                });
                                }
                                });
                            }else {
                                    $('select[name="city"]').empty();
                            }
                        });
                    });
                </script>
                {{-- <script>
                    $(document).ready(function(){
                        $('select[name="country"]').on('change',function(){
                            var country_id= $(this).val();
                            if (country_id) {
                                $.ajax({
                                url: "{{url('/getStates/')}}/"+country_id,
                                type: "GET",
                                dataType: "json",
                                success: function(data){
                                console.log(data);
                                $('select[name="state"]').empty();
                                $.each(data,function(key,value){
                                    $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                                });
                                }
                                });
                            }else {
                                    $('select[name="state"]').empty();
                            }
                        }); 
                        $('select[name="state"]').on('change',function(){
                            var state_id= $(this).val();
                            if (state_id) {
                                $.ajax({
                                url: "{{url('/getCities/')}}/"+state_id,
                                type: "GET",
                                dataType: "json",
                                success: function(data){
                                console.log(data);
                                $('select[name="city"]').empty();
                                $.each(data,function(key,value){
                                    $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                                });
                                }
                                });
                            }else {
                                    $('select[name="city"]').empty();
                            }
                        });
                    });
                </script> --}}

            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')

    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $(document).ready(function(){
        $('select[name="country"]').on('change',function(){
            var country_id= $(this).val();
            if (country_id) {
            $.ajax({
                url: "{{url('/getStates/')}}/"+country_id,
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log(data);
                $('select[name="state"]').empty();
                $.each(data,function(key,value){
                    $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                });
            }
            });
            }else {
                $('select[name="state"]').empty();
            }
        });
        $('select[name="state"]').on('change',function(){
            var state_id= $(this).val();
            if (state_id) {
            $.ajax({
                url: "{{url('/getCities/')}}/"+state_id,
            type: "GET",
            dataType: "json",
            success: function(data){
                console.log(data);
                $('select[name="city"]').empty();
                $.each(data,function(key,value){
                    $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                });
            }
            });
            }else {
                $('select[name="city"]').empty();
            }
        });
        });
    </script>
@endsection --}}