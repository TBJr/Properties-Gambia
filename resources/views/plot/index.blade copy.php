@extends('layouts.admin')

@section('pageName')
Plots
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Details of Plots</h3>
      <div class="card-tools">
        <a href="{{ route('plot.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Plot</a>
      </div>
  </div>

    <!-- Start Of Super Admin Session -->
    @role('Super-Admin')
      <div class="card-body">
        <table id="manageTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Plot Name</th>
              <th>Plot Address</th>
              <th>Plot Number</th>
              <th>Plot Coordinate</th>
              <th class="text text-center">Plot Size</th>
              <th class="text text-center">Plot Status</th>
              <th class="text text-center">Action</th>
            </tr>
          </thead> 
          <tbody>
            @foreach($plot as $land)
              <tr class="gradeC">              
                <td>{{$land->id}}</td>
                <td>
                  <img class="img-rounded" style="height:35px; width: 35px;" src="{{ URL::asset("storage/plot/".$land->image) }}" alt="{{ $land->name }}">
                </td>
                <td>{{$land->plot_name}}</td>
                <td>{{$land->plot_address}}</td>
                <td>{{$land->plot_number}}</td>
                <td>{{$land->coordinate}}</td>
                <td class="text text-center">{{$land->size}}</td>
                @if($land->status == 'available')
                  <td class="text text-center"><span class="badge badge-success">{{$land->status}}</span></td>
                  @elseif($land->status == 'sold')
                    <td class="text text-center"><span class="badge badge-danger">{{$land->status}}</span></td>
                @endif
                <td>
                  <a href="#" title="View">
                    <button class="btn-sm btn btn-info" alt="View"><i class="fas fa-eye"></i> View</button>
                  </a>
                  @if($land->status == "available")
                    <a href="#" title="EDIT">
                      <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-edit"></i> Edit</button>
                    </a>
                    @elseif($land->status == "reserved")
                    <a href="#" title="EDIT">
                      <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-edit"></i> Edit</button>
                    </a>
                  @endif
                </td>
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
@endsection