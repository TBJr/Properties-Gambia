@extends('layouts.admin')

@section('pageName')
Clients Details
@endsection

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    @if (auth()->user()->photo == 'avatar.jpg')
                        <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('assets/img/avatar.jpg') }}" alt="{{ auth()->user()->fname . ' Photo' }}">
                    @else
                        <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('assets/profile/') .'/'. auth()->user()->photo }}" alt="{{ auth()->user()->fname . ' Photo' }}">
                    @endif

                    </div>

                    <h3 class="profile-username text-center" style="text-transform: uppercase">{{ auth()->user()->fname }} {{ auth()->user()->mname }} {{ auth()->user()->lname }}</h3>
                    @if(auth()->user()->role == 'super-admin')
                        <p class="text-muted text-center">C.E. O</p>
                    @endif
                    @if(auth()->user()->role == 'admin')
                        <p class="text-muted text-center">STAFF</p>
                    @endif
                    @if(auth()->user()->role == 'client')
                        <p class="text-muted text-center">CLIENT</p>
                    @endif        
                    <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                    <p class="text-muted text-center">{{ auth()->user()->phone }}</p>
                    <p class="text-muted text-center">{{ auth()->user()->city }} {{ auth()->user()->address }}, {{ auth()->user()->country }}</p>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>HOW TO READ THE PROCCESS STAGE</h4>
                    <a class="text text-center"><span class="badge badge-success">ALKALO</span> This is means the transfer of ownership has began.</a> <br>
                    <a class="text text-center"><span class="badge badge-danger">ALKALO</span> This is means the transfer of ownership hasn't began yet.</a> <br>
                    <a class="text text-center"><span class="badge badge-success">SKETCH PLAN</span> This is means the Scetch Plan Processas has started.</a> <br>
                    <a class="text text-center"><span class="badge badge-danger">SKETCH PLAN</span> This is means the Scetch Plan Processas hasn't started.</a> <br>
                    <a class="text text-center"><span class="badge badge-success">ALKALO</span> This is means the transfer of ownership has began yet.</a> <br>
                    <a class="text text-center"><span class="badge badge-danger">ALKALO</span> This is means the transfer of ownership hasn't began yet.</a> <br>
                </div>
            </div>
        </div> --}}

        <div class="card-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  {{-- <th>Image</th> --}}
                  <th>Plot Name</th>
                  <th>Plot Area</th>
                  <th>Plot Number</th>
                  <th>Plot Coordinate</th>
                  <th class="text text-center">Plot Size</th>
                  {{-- <th class="text text-center">Plot Status</th> --}}
                  {{-- <th class="text text-center">Action</th> --}}
                  <th class="text text-center">Plot Stage</th>
                </tr>
              </thead> 
              <tbody>
                @foreach($plots as $land)
                  <tr class="gradeC">              
                    <td>{{$land->id}}</td>
                    {{-- <td>
                      <img class="img-rounded" style="height:35px; width: 35px;" src="{{ URL::asset("storage/plot/".$land->image) }}" alt="{{ $land->name }}">
                    </td> --}}
                    <td>{{$land->plot_name}}</td>
                    <td>{{$land->plot_address}}</td>
                    <td>{{$land->plot_number}}</td>
                    <td class="text text-center">{{$land->plot_coordinate}}</td>
                    <td class="text text-center">{{$land->plot_size}}</td>
                    {{-- <td></td> --}}
                    {{-- @if($land->status == 'available')
                      <td class="text text-center"><span class="badge badge-success">{{$land->status}}</span></td>
                      @elseif($land->status == 'sold')
                        <td class="text text-center"><span class="badge badge-danger">{{$land->status}}</span></td>
                    @endif --}}
                    {{-- <td>
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
                    </td> --}}
                    @if($land->stage == 'alkalo')
                      <td> 
                          <a class="text text-center"><span class="badge badge-success">{{$land->stage}}</span></a>
                          <a class="text text-center"><span class="badge badge-danger">Sketch Plan</span></a>
                        </td>
                      @elseif($land->status == 'sold')
                        <td class="text text-center"><span class="badge badge-danger">{{$land->status}}</span></td>
                    @endif
                  </tr>
                @endforeach
              </tfoot>
            </table> 
        </div>


    </div>
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