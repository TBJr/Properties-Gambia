@extends('layouts.admin')

@section('pageName')
Orders Approval
@endsection


@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Orders For Approval</h3>
      <div class="card-tools">
        <a href="{{ route('orders.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Order</a>
      </div>
    </div>

    <!-- /.card header -->
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
          @if($order->supervisor_email == auth()->user()->email && $order->status == 0)
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
                      <span class="badge badge-success">Collected</span>
                    @endif
                  @endif
                @endif
              @endif
            </td>
            <td>
              <ul>
                <a href="{{ route('orders.approve', $order->id) }}" title="APPROVE">
                  <button class="btn-sm btn btn-success" alt="approve"><i class="fas fa-thumbs-up"></i>
                  </button>
                </a>
                <a href="{{ route('orders.reject', $order->id) }}" title="REJECT">
                  <button class="btn-sm btn btn-danger" alt="reject"><i class="fas fa-thumbs-down"></i>
                  </button>
                </a>
                <a href="{{ route('orders.edit', $order->id) }}" title="EDIT">
                  <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-truck-loading">_EDIT</i></button>
                </a>
              </ul>
            </td>
          </tr>
          @endif
          @endforeach
        </tfoot>
      </table> 
    </div>  
        
</div>
@endsection