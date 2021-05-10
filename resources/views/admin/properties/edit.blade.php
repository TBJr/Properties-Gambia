@extends('layouts.admin')

@section('pageName')
Update Properties
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Item</h3>
        <div class="card-tools">
            <a href="{{ route('plot.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Products</a>
        </div>
    </div>

    @role('Developer|CEO|Admin|Secretary')
        <div class="card-body">
            <form action="{{ route("properties.update", [$products->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="form-group">
                        <label for="name">{{ __('Item Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($products) ? $products->name : '') }}" required>
                    </div>

                    {{-- <div class="form-group">
                        <label for="initialqty">{{ __('Initial Quantity') }}</label>
                        <input type="number" id="initialqty" name="initialqty" class="form-control" value="{{ old('initialqty', isset($product) ? $product->initialqty : '') }}">
                    </div> --}}

                    <div class="form-group">
                        <label for="actualqty">{{ __('Actual Quantity') }}</label>
                        <input type="number" id="actualqty" name="actualqty" class="form-control" value="{{ old('actualqty', isset($products) ? $products->actualqty : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Item Description') }}</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter a description of the Item" value="{{ old('name', isset($products) ? $products->description : '') }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="actualqty">{{ __('Danger Level') }}</label>
                        <input type="number" id="danger_level" name="danger_level" class="form-control" value="{{ old('danger_level', isset($products) ? $products->danger_level : '') }}">
                    </div>

                {{-- <div class="form-group">
                    <select name="stores[]" class="form-control">
                        <option value="">-- Select the Store --</option>
                        @foreach ($store as $store)
                            <option value="{{ $store->id }}">
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- <div class="form-group">
                    <label for="initialqty">{{ __(' Quantity') }}</label>
                    <input type="number" id="initialqty" name="initialqty" class="form-control" value="{{ old('initialqty', isset($product) ? $product->initialqty : '') }}">
                </div> --}}

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Item</button>
                </div>

            </form>
        </div>
    @endrole
    
</div>
@endsection
