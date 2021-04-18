@extends('layouts.admin')

@section('pageName')
Plots
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Details of Plots</h3>
      @role('Super-Admin')
      <div class="card-tools">
        <a href="{{ route('plot.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Plot</a>
      </div>
      @endrole      
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
              <th>Plot No</th>
              <th>Plot Coordinate</th>
              <th class="text text-center">Plot Owner</th>
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
                  <img src="{{ asset('uploads/Img/PlotImg/' . $land->plot_imgs[0]) }}" height="50px" width="90px">
                </td>
                <td>{{$land->plot_name}}</td>
                <td>{{$land->plot_address}}</td>
                <td>{{$land->plot_number}}</td>
                <td>{{$land->plot_coordinate}}</td>
                <td class="text-center">
                  @foreach($users as $client)
                    @if($land->users_id == $client->id)
                      {{ $client->fname }} {{ $client->mname }} {{ $client->lname }}
                    @endif
                  @endforeach
                </td>
                <td class="text text-center">{{$land->plot_size}}</td>
                @if($land->status == 'available')
                  <td class="text text-center"><span class="badge badge-success">{{$land->status}}</span></td>
                  @elseif($land->status == 'sold')
                    <td class="text text-center"><span class="badge badge-danger">{{$land->status}}</span></td>
                @endif
                <td class="text text-center">
                  <a href="{{ route('plot.view', [$land->id]) }}" title="View">
                    <button class="btn-sm btn btn-info" alt="View"><i class="fas fa-eye"></i> View</button>
                  </a>
                  {{-- <a href="#" title="EDIT"> --}}
                  <a href="{{ route('plot.edit', $land->id) }}" title="EDIT">
                    <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-edit"></i> Edit</button>
                  </a>
                  <a href="{{ route('plot.update', [$land->id]) }}" title="ASSIGN">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-eye"></i> ASSIGN</button>
                  </a>
                  <!-- start: Assign Modal -->
                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel"> Plot Owner</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <form action="{{ route("plot.update", [$land->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                              <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">{{$land->name}} Test</h3>
                                {{-- Testing {{$land[0]->plot_name}} --}}
                              </div>
                            </div>
                            <div class="modal-footer">
                              {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button> --}}
                              {{-- <button type="button" class="btn btn-success">SAVE</button> --}}
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- end: Assign Modal --}}
                </td>
              </tr>
            @endforeach
          </tfoot>
        </table> 
        {{-- {{ $plot->links() }} --}}
      </div>   
    @endrole
    {{-- end: Super Admin Session --}}

    {{-- start: Staff Session --}}
    @role('Staff')
      
    @endrole
    {{-- end: Staff Session --}}

    @role('Client')
    <div class="card-body">
      <table id="manageTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Plot Name</th>
            <th>Plot Address</th>
            <th>Plot No</th>
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
                <img src="{{ asset('uploads/Img/PlotImg/' . $land->plot_imgs[0]) }}" height="50px" width="90px">
              </td>
              <td>{{$land->plot_name}}</td>
              <td>{{$land->plot_address}}</td>
              <td>{{$land->plot_number}}</td>
              <td>{{$land->plot_coordinate}}</td>
              <td class="text text-center">{{$land->plot_size}}</td>
              @if($land->status == 'available')
                <td class="text text-center"><span class="badge badge-success">{{$land->status}}</span></td>
                @elseif($land->status == 'sold')
                  <td class="text text-center"><span class="badge badge-danger">{{$land->status}}</span></td>
              @endif
              <td class="text text-center">
                <a href="{{ route('plot.view', [$land->id]) }}" title="View">
                  <button class="btn-sm btn btn-info" alt="View"><i class="fas fa-eye"></i> View</button>
                </a>
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