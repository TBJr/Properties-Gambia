@extends('layouts.admin')

@section('pageName')
Manage Orders
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    {{-- <h3 class="card-title">Manage Orders</h3> --}}
      <div class="card-tools">
        <a href="{{ route('orders.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Order</a>
      </div>
  </div>

  <!-- Start Of Super Admin Session -->
  @if(auth()->user()->email == "superadmin@wfp.org")
      <div class="card-body">
        <table id="manageTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Staff Name</th>
              <th>Business Unit</th>
              <th>Date - Time</th>
              <th>Products</th>
              <th>Status</th>
            </tr>
          </thead> 
          <tbody>
            @foreach($orders as $order)
            <tr>              
              <td>{{$order->id}}</td>
              <td>
                {{ $order->users->name }}
              </td>
              <td>
                {{ $order->users->business_unit }}
              </td>
              <td>
                {{ $order->created_at ?? '' }}
              </td>
              <td>
                <ul>
                  @foreach($order->products as $item)
                    <li>{{ $item->name }} ({{ $item->pivot->quantity }}) </li>
                  @endforeach
                </ul>
              </td>
              <td>
                @if($order->status == 0)
                  <span class="badge badge-warning">Awaits Approval</span>
                @else
                  @if($order->status == 1)
                    <span class="badge badge-success">Approved</span>
                  @else
                    @if($order->status == 2)
                      <span class="badge badge-danger">Rejected</span>
                    @else
                      @if($order->status == 3)
                        <span class="badge badge-primary">Collected</span>
                      @endif
                    @endif
                  @endif
                @endif
              </td>
            </tr>
            @endforeach
          </tfoot>
        </table> 
      </div>
  @else

  <!-- Start Of Stationery Store -->
  @if(auth()->user()->email == "isatujatta.ceesay@wfp.org")     
      <div class="card-body">
        <table id="manageTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Staff Name</th>
              <th>Business Unit</th>
              <th>Date - Time</th>
              <th>Products</th>
              <th>Order Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                {{-- <ul> --}}
                  {{-- @foreach($order->products as $item) --}}
                    {{-- @if($item->store_id == 2) --}}

                      <td>
                        @foreach($order->products as $item)
                          @if($item->store_id == 2)
                            <li>{{ $order->id ?? '' }}</li>
                          @endif
                        @endforeach
                      </td>

                      <td>
                        @foreach($order->products as $item)
                          @if($item->store_id == 2)
                            <li>
                              {{ $order->users->name ?? '' }}
                            </li>
                          @endif
                        @endforeach
                      </td>

                      <td>{{ $order->users->business_unit ?? '' }}</td>

                      <td>{{ $order->created_at ?? '' }}</td>
                      
                      <td> 
                        <ul>
                        @foreach($order->products as $item)
                          @if($item->store_id == 2)
                            <li>{{ $item->name }} ({{ $item->pivot->quantity }}) </li>
                          @endif
                        @endforeach
                        </ul> 
                      </td>

                      <td>
                          @if($order->status == 0)
                            <span class="badge badge-warning">Awaits Approval</span>
                            @else
                            @if($order->status == 1)
                              <span class="badge badge-success">Approved</span>
                              @else
                              @if($order->status == 2)
                                <span class="badge badge-danger">Rejected</span>
                                @else
                                @if($order->status == 3)
                                  <span class="badge badge-info">Ready</span>
                                  @else
                                  @if($order->status == 4)
                                  <span class="badge badge-primary">Delivered</span>
                                  @endif
                                @endif
                              @endif
                            @endif
                          @endif
                      </td>

                      <td>
                        @if($order->status == 1)
                          <a href="{{ route('orders.ready', $order->id) }}" title="Ready">
                            <button class="btn-sm btn btn-info" alt="Ready"><i class="fas fa-check-circle"></i></button>
                          </a>
                          <a href="{{ route('orders.edit', $order->id) }}" title="EDIT">
                            <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-truck-loading">_EDIT</i></button>
                          </a>
                        @endif
                      </td>
                      
                    {{-- @endif --}}
                  {{-- @endforeach --}}
                {{-- </ul> --}}
              </tr>
            @endforeach
          </tfoot>
        </table> 
      </div>
  @else

  <!-- Start Of Visibility Store -->
  @if(auth()->user()->email == "margaretnancy.joof@wfp.org")
      <div class="card-body">
        <table id="manageTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Staff Name</th>
              <th>Business Unit</th>
              <th>Date - Time</th>
              <th>Products</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead> 
          <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id ?? '' }}</td>

                <td>{{ $order->users->name ?? '' }}</td>

                <td>{{ $order->users->business_unit ?? '' }}</td>

                <td>{{ $order->created_at ?? '' }}</td>

                <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning">Awaits Approval</span>
                    @else
                    @if($order->status == 1)
                        <span class="badge badge-success">Approved</span>
                        @else
                        @if($order->status == 2)
                        <span class="badge badge-danger">Rejected</span>
                        @else
                        @if($order->status == 3)
                            <span class="badge badge-info">Ready</span>
                            @else
                            @if($order->status == 4)
                            <span class="badge badge-primary">Delivered</span>
                            @endif
                        @endif
                        @endif
                    @endif
                    @endif
                </td>

                <td>
                    @if($order->status !== 2 && $order->status == 1 )
                    <a href="{{ route('orders.ready', $order->id) }}" title="ready">
                    <button class="btn-sm btn btn-info" alt="approve"><i class="fas fa-check-circle"></i>
                    </button>
                    </a>
                    <a href="{{ route('orders.delivered', $order->id) }}" title="DELIVERED">
                    <button class="btn-sm btn btn-danger" alt="reject"><i class="fas fa-truck-loading"></i>
                    </button>
                    </a>
                    @endif
                </td>
              </ul>
            </tr>
            @endforeach
          </tfoot>
        </table> 
      </div>
  @endif
  @endif
  @endif
    
</div>
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