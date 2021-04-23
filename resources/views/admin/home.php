@extends('layouts.admin')

@section('pageName')
Dashboard
@endsection

@section('content')
<div class="col-md-12">

    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    You are Logged in as {{ auth()->user()->getRoleNames()->first() }}
            </div>
        </div>

        <!-- Small boxes (Start box) -->
        <div class="row">

            @role('Super-Admin')
                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h3>{{ \App\Models\User::all()->count() }}</h3>

                            <p>Total Users</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>

                        <a href="{{ url('user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endrole
            <!-- ./col -->

            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ \App\Models\Properties::all()->count() }}</h3>

                        <p>Total Properties</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="{{ url('properties') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ \App\Models\Plot::all()->count() }}</h3>

                        <p>Total Plots</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="{{ url('plot') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>{{ \App\Models\User::where(['role' => 'client'])->get()->count() }}</h3>

                        <p>Total Clients</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- col -->
            {{-- <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>{{ \App\Models\User::where(['role' => 'admin'])->get()->count() }}</h3>

                        <p>Total Staff</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="{{ url('user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}
            <!-- ./col -->

            <!-- col -->
            {{-- <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg cyan">
                    <div class="inner">
                        <h3>{{ \App\Models\User::all()->count() }}</h3>

                        <p>Total Users</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="{{ url('user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}
            <!-- ./col -->

            <!-- col -->
            {{-- <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg cyan">
                    <div class="inner">
                        <h3>  </h3>

                        <p> </p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}
            <!-- ./col -->

            <!-- col -->
            {{-- <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg cyan">
                    <div class="inner">
                        <h3>  </h3>

                        <p> </p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}
            <!-- ./col -->
        </div>

</div>
@endsection
