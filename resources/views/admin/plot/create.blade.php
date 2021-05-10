@extends('layouts.admin')

@section('pageName')
PLOT CREATE
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
                        <form action="{{ route("plot.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group"> 
                                <div class="col-md-6">
                                    <label for="plot_imgs">Upload Image Files :</label>
                                    <input type="file" class="form-control-file" id="plot_img" name="plot_imgs[]"  accept="image/*" multiple>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="plot_name">{{__('Plot Name')}} </label>
                                <input id="plot_name" type="text" class="form-control @error('plot_name') is-invalid @enderror" name="plot_name" value="{{ old('plot_name') }}" placeholder="Enter Plot Name" required autocomplete="plot_name" autofocus>
                                
                                @error('plot_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="plot_price">{{ __('Plot Price')}}</label>
                                <input type="price" class="form-control" id="plot_price" name="plot_price" placeholder="Enter the plot price" autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="properties_id">{{__('From Property')}} </label>
                                <select name="properties_id" class="form-control">
                                    <option value="">-- Select the Property the plot belongs to --</option>
                                    @foreach ($properties as $estate)
                                        <option value="{{ $estate->id }}">
                                            {{ $estate->property_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <select class="js-example-basic-single" name="state">
                                <option value="AL">Alabama</option>
                                  ...
                                <option value="WY">Wyoming</option>
                            </select>
                            
                            <div class="form-group">
                                <label for="plot_address">{{ __('Plot Address')}}</label>
                                <select name="plot_address" class="form-control">
                                    <option value="">-- Select the Address of the plot --</option>
                                    @foreach ($properties as $estate)
                                        <option value="{{ $estate->property_address }}">
                                            {{ $estate->property_address }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="plot_number">{{ __('Plot Number')}}</label>
                                <input type="number" class="form-control" id="plot_number" name="plot_number" placeholder="Enter the plot number" autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="plot_coordinate">{{__('Plot Coordinate')}} </label>
                                <input type="text" class="form-control" id="plot_coordinate" name="plot_coordinate" placeholder="Enter the Coordinate of the plot" autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="plot_size">{{ __('Plot Size')}}</label>
                                <input type="text" class="form-control" id="plot_size" name="plot_size" placeholder="Enter the size of the plot" autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __('Plot Status')}}</label>
                                <select name="status" class="form-control" id="status" aria-placeholder="Select Status Of Plot">
                                    <option value="">-- Select the status of the plot --</option>
                                    <option value="{{ __('sold') }}">SOLD</option>
                                    <option value="{{ __('available') }}">AVAILABLE</option>
                                    <option value="{{ __('reserved') }}">RESERVED</option>
                                </select>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('Save Plot') }}</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

@endsection

@section('scripts')
    <!-- Start: Custom select2 -->
    {{-- <script>
        $(document).ready(function() {
            $(".custom-select").select2({
            theme: "classic"
            });
        });
    </script> --}}
    <!-- End: custom select2 -->

    <!-- Start: Add more pictures -->
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click","btn-danger",function(){
                $(this).parents(".realprocode").remove();
            });
        });
    </script> --}}
    <!-- End: Add more pictures -->
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $(".first").on('keyup',function(){
            $(".second").val($(this).val());
        });
    </script>
@endsection
