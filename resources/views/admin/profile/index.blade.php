@extends('layouts.admin')

@section('pageName')
Profile
@endsection
@section('content')
<section class="content">
    <div class="">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        @if (auth()->user()->photo == 'avatar.png')
                            <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('assets/img/avatar.png') }}" alt="{{ auth()->user()->fname . ' Photo' }}">
                        @else
                            <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('assets/profile/') .'/'. auth()->user()->photo }}" alt="{{ auth()->user()->fname . ' Photo' }}">
                        @endif

                        </div>

                        <h3 class="profile-username text-center" style="text-transform: uppercase">{{ auth()->user()->fname }} {{ auth()->user()->mname }} {{ auth()->user()->lname }} </h3>
                        <p class="text-muted text-center">{{ auth()->user()->role }}</p>
                        <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                        <p class="text-muted text-center">{{ auth()->user()->phone }}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div>

                            <div>
                                <form class="form-horizontal" method="POST" action="{{ route('profile.update', auth()->user()->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="fname"  id="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ auth()->user()->fname }}" required placeholder="First Name">
                                                @error('fname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="fname">Middle Name</label>
                                                <input type="text" name="mname"  id="mname" class="form-control @error('mname') is-invalid @enderror" value="{{ auth()->user()->mname }}" required placeholder="Middle Name">
                                                @error('mname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" name="lname"  id="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ auth()->user()->lname }}" required placeholder="Last Name">
                                                @error('lname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" placeholder="E-mail Address">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="tel" name="phone"  id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ auth()->user()->phone }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="gender">{{ __('Gender')}}</label>
                                                <select name="gender" class="form-control" id="gender" aria-placeholder="Select your gender">
                                                    <option value="{{ old('gender', isset($users) ?  auth()->user()->gender : '') }}"> {{ auth()->user()->gender }}</option>
                                                    <option value="{{ __('male') }}">Male</option>
                                                    <option value="{{ __('female') }}">Female</option>
                                                    <option value="{{ __('other') }}">Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="profession">Your Profession</label>
                                                <input type="text" name="profession"  id="profession" class="form-control @error('profession') is-invalid @enderror" value="{{ auth()->user()->profession }}" placeholder="Profession" required>
                                                @error('profession')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="country">Your Country</label>
                                                <input type="text" name="country"  id="country" class="form-control @error('country') is-invalid @enderror" value="{{ auth()->user()->country }}" placeholder="Country" required>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <div class="form-group">
                                                <div class="icon"><i class="fa fa-lock"></i></div>
                                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update Profile</button>
                                                {{--  <a role="button" href="admin/index.html" class="bizwheel-btn theme-2">Login</a>  --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
