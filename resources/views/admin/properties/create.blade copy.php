@extends('layouts.admin')

@section('pageName')
Create Property
@endsection

@section('content')
<style>
    .container {
        max-width: 500px;
    }
    dl, ol, ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    } 
</style>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                {{-- <h3 class="card-title">Add a new Property</h3> --}}
                <div class="card-tools">
                    <a href="{{ route('properties.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Properties</a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route("properties.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group"> 
                        <div class="col-md-6">
                            <label for="property_imgs">Upload Image Files :</label>
                            <input type="file" class="form-control-file" id="property_imgs" name="property_imgs[]"  accept="image/*" multiple>
                        </div>
                    </div>

                    {{-- <div class="row col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="file-loading">
                                <input id="image" name="image[]" type="file" multiple="multiple">
                                <input id="image" name="image" type="file" multiple="multiple">
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="property_name">{{__('Property Name')}} </label>
                        <input id="property_name" type="text" class="form-control" name="property_name" placeholder="Enter Property Name" autocomplete="property_name">
                    </div>

                    <div class="form-group">
                        <label for="property_size">{{ __('Size')}}</label>
                        <input type="text" class="form-control" id="property_size" name="property_size" placeholder="Enter the size of the property" autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label for="property_address">{{ __('Address')}}</label>
                        <input type="text" class="form-control" id="property_address" name="property_address" placeholder="Enter the area of the property" autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label for="property_coordinate">{{__('Property Coordinate')}} </label>
                        <input type="text" class="form-control" id="property_coordinate" name="property_coordinate" placeholder="Enter Property Coordonnance" autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description" autocomplete="off"></textarea>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('Add Property') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection
