@extends('layouts.admin')

@section('pageName')
PLOT UPDATE
@endsection

@section('content')

    @role('Developer|CEO|Admin|Secretary')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title mb-0 text-center text-white">
                            <strong>PLOT UPLOAD</strong>
                            <p><small>Data Entry Form</small></p>
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('plot.index') }}" class="btn btn-outline-success"><i class="fas fa-shield-alt"></i> See all Plots</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form role="form" action="{{ route("plot.update", [$plot->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">     
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="users_id">{{__('Plot Owner')}} </label>
                                <select name="users_id" class="form-control bg-danger">
                                    <option value="">-- Select the Plot owner --</option>
                                    @foreach ($users as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->fname }} {{ $client->mname }} {{ $client->lname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plot_name">{{__('Plot Name')}} </label>
                                <input type="plot_name" id="plot_name" name="plot_name" class="col-md col-form-label text-md-left" value="{{ old('plot_name', isset($plot) ? $plot->plot_name : '') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="plot_price">{{ __('Plot Price')}}</label>
                                <input type="price" id="plot_price" name="plot_price" class="col-md col-form-label text-md-left" value="{{ old('plot_price', isset($plot) ? $plot->plot_price : '') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="properties_id">{{__('Property Name')}} </label>
                                <select name="properties_id" class="form-control" disabled>
                                    @foreach($properties as $island)
                                        <option value="{{ old('properties_id', isset($plot) ? $plot->properties_id : '') }}"> 
                                            {{ $island->property_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="plot_address">{{__('Plot Address')}} </label>
                                <select name="plot_address" class="form-control" disabled>
                                    @foreach($properties as $island)
                                        <option value="{{ old('properties_id', isset($plot) ? $plot->properties_id : '') }}"> 
                                            {{ $island->property_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="plot_number">{{ __('Plot Number')}}</label>
                                <input type="number" class="form-control" id="plot_number" name="plot_number" value="{{ old('plot_number', isset($plot) ? $plot->plot_number : '') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="plot_coordinate">{{__('Plot Coordinate')}} </label>
                                <input type="text" class="form-control" id="plot_coordinate" name="plot_coordinate" value="{{ old('plot_coordinate', isset($plot) ? $plot->plot_coordinate : '') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="plot_size">{{ __('Plot Size')}}</label>
                                <input type="text" class="form-control" id="plot_size" name="plot_size" value="{{ old('plot_size', isset($plot) ? $plot->plot_size : '') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __('Plot Status')}}</label>
                                <select name="status" class="form-control" id="status" aria-placeholder="Select Status Of Plot">
                                    <option value="{{ old('status', isset($plot) ? $plot->status : '') }}"> {{$plot->status}}</option>
                                    <option value="{{ __('sold') }}">SOLD</option>
                                    <option value="{{ __('available') }}">AVAILABLE</option>
                                    <option value="{{ __('reserved') }}">RESERVED</option>
                                </select>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('Assign Plot') }}</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endrole

@endsection