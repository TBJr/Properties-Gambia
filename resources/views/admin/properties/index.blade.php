@extends('layouts.admin')

@section('pageName')
Properties
@endsection

@section('content')
  <div class="card">

    <div class="card-header">
      <h3 class="card-title">Properties Details</h3>
        @role('Developer|CEO|Admin|Secretary')
        <div class="card-tools">
          <a href="{{ route('properties.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Properties</a>
        </div>
        @endrole
    </div>

    <!-- Start Of Super Admin Session -->
    @role('Developer')
        <div class="card-body">
          <table id="tbjTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Property Name</th>
                <th>Property Address</th>
                <th>Property Coordinate</th>
                <th class="text text-center">Property Size</th>
                {{-- <th class="text text-center">Property Status</th> --}}
                <th class="text text-center">Action</th>
              </tr>
            </thead> 
            <tbody>
              @foreach($properties as $estate)
                <tr class="gradeC">              
                  <td>{{$estate->id}}</td>
                  <td>
                    {{-- <div class="col-5"><img src="{{ asset('uploads/Img/PropertyImg/' . $estate->property_imgs[0]) }}"/></div> --}}
                    <img src="{{ asset('uploads/Img/PropertyImg/' . $estate->property_imgs[0]) }}" height="50px" width="90px">
                    {{-- <img src="{{ asset('uploads/Img/PropertyImg/' . $estate->property_imgs[0]) }}"/> --}}
                  </td>
                  <td>{{$estate->property_name}}</td>
                  <td>{{$estate->property_address}}</td>
                  <td>{{$estate->property_coordinate}}</td>
                  <td class="text text-center">{{$estate->property_size}}</td>
                  {{-- <td>
                    <a href="{{ route('properties.view') }}" title="View">
                      <button class="btn-sm btn btn-info" alt="View"><i class="fas fa-eye"></i> View</button>
                    </a>
                    <a href="#" title="EDIT">
                      <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-edit"></i> Edit</button>
                    </a>
                    <a href="#" title="EDIT">
                      <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-edit"></i> Edit</button>
                    </a>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">MORE</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="{{ route('properties.show') }}">VIEW</a>
                          <a class="dropdown-item" href="{{ route('properties.view') }}">VIEW</a>
                          <a class="dropdown-item" href="#">EDIT</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Youtube Link</a>
                        </div>
                      </div>
                  </td> --}}
                </tr>
              @endforeach  
            </tfoot>
          </table>
        </div>
    @endrole

    @role('CEO|Secretary|Admin')
      <div class="card-body">
        <table id="tbjTable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Property Name</th>
              <th>Property Address</th>
              <th>Property Coordinate</th>
              <th class="text text-center">Property Size</th>
              {{-- <th class="text text-center">Action</th> --}}
            </tr>
          </thead> 
          <tbody>
            @foreach($properties as $estate)
              <tr class="gradeC">              
                <td>{{$estate->id}}</td>
                <td>
                  <img src="{{ asset('uploads/Img/PropertyImg/' . $estate->property_imgs[0]) }}" height="50px" width="90px">
                </td>
                <td>{{$estate->property_name}}</td>
                <td>{{$estate->property_address}}</td>
                <td>{{$estate->property_coordinate}}</td>
                <td class="text text-center">{{$estate->property_size}}</td>
                {{-- <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default">MORE</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="{{ route('properties.view', [$estate->id]) }}">VIEW</a>
                      <a class="dropdown-item" href="#">EDIT</a>
                      <a class="dropdown-item" href="{{ route('properties.edit', [$estate->id]) }}">EDIT</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Youtube Link</a>
                    </div>
                  </div>
                </td> --}}
              </tr>
            @endforeach  
          </tfoot>
        </table>
      </div>
    @endrole
        
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

  <script>
    $(document).ready(function() {
      $('#tbjTable').DataTable();
    });
  </script>
@endsection