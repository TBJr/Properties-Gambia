@extends('layouts.admin')

@section('pageName')
Orders
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Create Order</h3>
      <div class="card-tools">
        <a href="{{ route('orders.myorders') }}" class="btn btn-primary"><i class="fas fa-eye"></i> See Orders</a>
      </div>
  </div>

    <div class="col-md-12 col-xs-12">
        <div class="card-body">
                    <form role="form" action="{{ route("orders.store") }}" method="POST" class="form-horizontal" enctype="multipart/form-data">     
                        @csrf

                        <br /> <br/>

                        <div class="col-md-4 col-xs-12 pull pull-left">
                            <div class="form-group">
                                <label class="col-sm-5 control-label" style="text-align:left;">Customer Name</label>
                                    <div class="col-sm-7">
                                        <select class="form-control select2" name="users_id">
                                            <option>Select the Customer</option>
                                            @foreach($user as $client)
                                                <option value="{{$client->id}}">{{$client->name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <select name="user[]" class="form-control select2">
                                            <option value=""> Select the Customer </option> --}}
                                    </div>
                            </div>
                              {{-- <input type="text" name="users_id" value="{{auth()->user()->id}}" hidden> --}}
                                {{-- <div class="container mt-5">
                                    <h2>Laravel AJAX Autocomplete Search with Select2</h2>
                            
                                    <select class="livesearch form-control" name="livesearch"></select>
                                </div> --}}
                        </div>

                        <!-- The select2 -->
                        
                        <!-- End of Select2 -->

                        {{-- <div class="form-group">
                            <label for="order" class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
                        </div>

                        <div class="form-group">
                            <label for="order" class="col-sm-12 control-label">Time: <?php echo date('H:i a') ?></label>
                        </div> --}}


                        <br /> <br/>

                        <div class="card-body">
                            <table class="table table-hover" id="products_table">
                                <!--<table class="table" id="products_table">-->
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="text" name="status" value="0" hidden>
                                    <input type="text" name="users_id" value="{{auth()->user()->id}}" hidden>
                                    <input type="text" name="plot_id" value="{{auth()->user()->id}}" hidden>
                                    {{-- <input type="text" name="supervisor_email" value="{{auth()->user()->supervisor_email}}" hidden> --}}
                                    @foreach (old('plot', ['']) as $index => $oldLand)
                                        <tr id="plot{{ $index }}">
                                            <td>
                                                {{-- <select name="products[]" class="form-control"> --}}
                                                    <select name="plot[]" class="form-control select2">
                                                    <option value="">-- choose product --</option>
                                                    @foreach ($plot as $land)
                                                        <option value="{{ $land->id }}"{{ $oldLand == $land->id ? ' selected' : '' }}>
                                                            {{ $land->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="quantities[]" class="form-control" value="{{ old('quantities.' . $index) ?? '1' }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr id="plot{{ count(old('plot', [''])) }}"></tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                </div>
                            </div>
                            
                        </div>

                        <div class="card-footer">
                            <button href={{ url('/send-email') }} class="btn btn-primary" type="submit">Create Order</button>
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
let row_number = {{ count(old('plot', [''])) }};
$("#add_row").click(function(e){
e.preventDefault();
let new_row_number = row_number - 1;
$('#plot' + row_number).html($('#plot' + new_row_number).html()).find('td:first-child');
$('#plots_table').append('<tr id="plot' + (row_number + 1) + '"></tr>');
row_number++;
});

$("#delete_row").click(function(e){
e.preventDefault();
if(row_number > 1){
$("#plot" + (row_number - 1)).html('');
row_number--;
}
});
});
</script>

@endsection
    