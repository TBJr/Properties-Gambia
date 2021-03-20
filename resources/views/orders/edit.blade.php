@extends('layouts.admin')

@section('pageName')
Orders
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Order</h3>
        {{-- <div class="card-tools">
            <a href="{{ route('orders.myorders') }}" class="btn btn-primary"><i class="fas fa-eye"></i> See Orders</a>
        </div> --}}
    </div>

    <div class="col-md-12 col-xs-12">
        <div class="card-body">
                    <form role="form" action="{{ route("orders.update", [$order->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">     
                        @csrf
                        @method('PUT')

                        <br><br>

                        <div class="col-md-5">
                    
                            {{-- <div class="form-group row">
                                <label for="users_id" class="col-sm-12 control-label">{{ ('Staff Name') }}:<input type="text" id="users_id" name="users_id" class="col-sm-12 control-label" value="{{ old('users_id', isset($order) ? $order->users->name : '') }}" disabled></label>
                            </div>

                            <div class="form-group row">
                                <label for="business_unit" class="col-sm-12 control-label">{{ ('Staff Unit') }}:<input type="text" id="business_unit" name="business_unit" class="col-sm-12 control-label" value="{{ old('business_unit', isset($order) ? $order->users->business_unit : '') }}" disabled></label>
                            </div>      --}}

                            <div class="form-group row">
                                <label for="order" class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
                            </div>
                        
                            <div class="form-group">
                                <label for="order" class="col-sm-12 control-label">Time: <?php echo date('H:i a') ?></label>
                            </div>

                            <div class="form-group row">
                                <label for="users_id" class="col-md-4 col-form-label text-md-center">{{ ('Staff Name') }}:</label>
                                
                                <div class="col-md-7">
                                    <input type="text" id="users_id" name="users_id" class="col-md col-form-label text-md-left" value="{{ old('users_id', isset($order) ? $order->users->name : '') }}" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="business_unit" class="col-md-4 col-form-label text-md-center">{{ ('Staff Unit') }}:</label>
                                
                                <div class="col-md-7">
                                    <input type="text" id="business_unit" name="business_unit" class="col-md col-form-label text-md-left" value="{{ old('business_unit', isset($order) ? $order->users->business_unit : '') }}" disabled>
                                </div>
                            </div>

                        </div>

                    <div class="card-body">

                            <br /> <br/>

                        <div class="card-body">
                            <table class="table table-hover" id="products_table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    {{-- <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (old('products', $order->products->count() ? $order->products : ['']) as $order_product)
                                    <tr id="product{{ $loop->index }}">
                                        <td>
                                            <select name="products[]" class="form-control">
                                                <option value="">-- choose product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        @if (old('products.' . $loop->parent->index, optional($order_product)->id) == $product->id) selected @endif
                                                    >{{ $product->name }} </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[]" class="form-control"
                                                    value="{{ (old('quantities.' . $loop->index) ?? optional(optional($order_product)->pivot)->quantity) ?? '1' }}" />
                                        </td>
                                    </tr>
                                @endforeach
                                <tr id="product{{ count(old('products', $order->products->count() ? $order->products : [''])) }}"></tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button href="#" class="btn btn-primary" type="submit">Update Order</button>
                        <a href="{{ route('home') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            let row_number = {{ count(old('products', $order->products->count() ? $order->products : [''])) }};
            $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
            $("#product" + (row_number - 1)).html('');
            row_number--;
            }
            });
        });
    </script>
@endsection
    