@extends('layouts.admin')

@section('pageName')
Plot Info 
@endsection

@section('content')
<br> <br>
    <!-- Content Header (Page header) -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Properties Details</h3>
            <div class="card-tools">
                <a href="{{ route('plot.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Back to Plots</a>
            </div>
        </div>
    </div>

    @role('Developer')
        <div class="card card-solid">
            @foreach($plot as $land)
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$land->plot_name}}</h3>
                            <div class="col-12">
                                {{-- <img src="{{ asset('uploads/Img/PropertyImg/' .$estate->property_imgs) }}" class="product-image" alt="Property Image"> --}}
                                <img src="{{ asset('uploads/Img/PlotImg/' . $land->plot_imgs[0]) }}" class="product-image" alt="Property Image">
                            </div>
                            
                            <div class="col-12 product-image-thumbs">
                                @foreach($land->plot_imgs as $plot_img)
                                    <div class="product-image-thumb" ><img src="{{ asset('uploads/Img/PlotImg/' . $plot_img) }}" class="product-image" alt="Property Image"></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$land->plot_name}}</h3>
                            <p>{{$land->plot_address}}</p>

                            <hr>
                            

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">GMD {{$land->plot_price}}</h2>
                                {{-- <h4 class="mt-0"><small>Consist of {{ \App\Models\Plot::where(['role' => 'client'])->get()->count() }} Plots</small></h4> --}}
                            </div>

                            <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>

                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div>

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                                {{-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> --}}
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{$land->description}}</div>
                            {{-- <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">  </div> --}}
                            {{-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            @endforeach
        </div>
    @endrole

    @role('CEO|Admin|Secretary')
        <div class="card card-solid">
            @foreach($plot as $land)
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$land->plot_name}}</h3>
                            <div class="col-12">
                                {{-- <img src="{{ asset('uploads/Img/PropertyImg/' .$estate->property_imgs) }}" class="product-image" alt="Property Image"> --}}
                                <img src="{{ asset('uploads/Img/PlotImg/' . $land->plot_imgs[0]) }}" class="product-image" alt="Property Image">
                            </div>
                            
                            <div class="col-12 product-image-thumbs">
                                @foreach($land->plot_imgs as $plot_img)
                                    <div class="product-image-thumb" ><img src="{{ asset('uploads/Img/PlotImg/' . $plot_img) }}" class="product-image" alt="Property Image"></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$land->plot_name}}</h3>
                            <p>{{$land->plot_address}}</p>

                            <hr>
                            

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">GMD {{$land->plot_price}}</h2>
                                {{-- <h4 class="mt-0"><small>Consist of {{ \App\Models\Plot::where(['role' => 'client'])->get()->count() }} Plots</small></h4> --}}
                            </div>

                            {{-- <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>

                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div> --}}

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                                {{-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> --}}
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{$land->description}}</div>
                            {{-- <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">  </div> --}}
                            {{-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            @endforeach
        </div>
    @endrole

    @role('Client')
        <div class="card card-solid">
            @foreach($plot as $land)
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$land->plot_name}}</h3>
                            <div class="col-12">
                                {{-- <img src="{{ asset('uploads/Img/PropertyImg/' .$estate->property_imgs) }}" class="product-image" alt="Property Image"> --}}
                                <img src="{{ asset('uploads/Img/PlotImg/' . $land->plot_imgs[0]) }}" class="product-image" alt="Property Image">
                            </div>
                            
                            <div class="col-12 product-image-thumbs">
                                @foreach($land->plot_imgs as $plot_img)
                                    <div class="product-image-thumb" ><img src="{{ asset('uploads/Img/PlotImg/' . $plot_img) }}" class="product-image" alt="Property Image"></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$land->plot_name}}</h3>
                            <p>{{$land->plot_address}}</p>

                            <hr>
                            

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">GMD {{$land->plot_price}}</h2>
                                {{-- <h4 class="mt-0"><small>Consist of {{ \App\Models\Plot::where(['role' => 'client'])->get()->count() }} Plots</small></h4> --}}
                            </div>

                            {{-- <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>

                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    Add to Wishlist
                                </div>
                            </div> --}}

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                                {{-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> --}}
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{$land->description}}</div>
                            {{-- <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">  </div> --}}
                            {{-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div> --}}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            @endforeach
        </div>
    @endrole('Client')
@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    
    $.extend(true, $.fn.dataTable.defaults, {
        order: [[ 1, 'desc' ]],
        pageLength: 100,
    });
    $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
    </script>
@endsection