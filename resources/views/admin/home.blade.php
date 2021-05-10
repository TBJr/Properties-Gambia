@extends('layouts.admin')

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

        @role('Developer')
            <!-- Small boxes (Start box) -->
            <div class="row">

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
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
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Properties::all()->count() }}</h3>

                            <p>Total Properties</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>

                        <a href="{{ url('properties') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive-green">
                        <div class="inner">
                            <h3>{{ \App\Models\Plot::all()->count() }}</h3>

                            <p>Total Plots</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>

                        <a href="{{ url('plot') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'client'])->get()->count() }}</h3>

                            <p>Total Clients</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'admin'])->get()->count() }}</h3>

                            <p>Total Staff</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        @endrole

        @role('CEO')
            <div class="row">

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
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
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Properties::all()->count() }}</h3>

                            <p>Total Properties</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>

                        <a href="{{ url('properties') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-olive-green">
                        <div class="inner">
                            <h3>{{ \App\Models\Plot::all()->count() }}</h3>

                            <p>Total Plots</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>

                        <a href="{{ url('plot') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'client'])->get()->count() }}</h3>

                            <p>Total Clients</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'admin'])->get()->count() }}</h3>

                            <p>Total Staff</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        @endrole

        @role('Admin')
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Properties::all()->count() }}</h3>
                            <p>Total Properties</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="{{ url('properties') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-olive-green">
                        <div class="inner">
                            <h3>{{ \App\Models\Plot::all()->count() }}</h3>
                            <p>Total Plots</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <a href="{{ url('plot') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'client'])->get()->count() }}</h3>
                            <p>Total Clients</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'admin'])->get()->count() }}</h3>
                            <p>Total Staff</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        @endrole

        @role('Secretary')
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Properties::all()->count() }}</h3>
                            <p>Total Properties</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="{{ url('properties') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-olive-green">
                        <div class="inner">
                            <h3>{{ \App\Models\Plot::all()->count() }}</h3>
                            <p>Total Plots</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <a href="{{ url('plot') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'client'])->get()->count() }}</h3>
                            <p>Total Clients</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ \App\Models\User::where(['role' => 'admin'])->get()->count() }}</h3>
                            <p>Total Staff</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        @endrole

        @role('Client')
            <div class="row">
                
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h3>{{ \App\Models\Plot::where(['users_id' => auth()->user()->id])->get()->count() }}</h3>
                            <p>Total Assets</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-item"></i>
                        </div>
                        <a href="{{ url('client') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        @endrole

    </div>
@endsection