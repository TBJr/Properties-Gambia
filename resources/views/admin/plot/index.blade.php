@extends('layouts.admin')

@section('pageName')
Plots
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Details of Plots</h3>
      @role('Developer|CEO|Admin|Secretary')
        <div class="card-tools">
          <a href="{{ route('plot.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Plot</a>
        </div>
      @endrole      
    </div>

    @role('Developer')
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
                  <a href="{{ route('plot.edit', $land->id) }}" title="EDIT">
                    <button class="btn btn-warning btn-sm active" alt="edit"><i class="fas fa-edit"></i> Edit</button>
                  </a>

                  @if($land->users_id == '')
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#staticBackdrop{{$land->id}}"><i class="fas fa-sign-out-alt"></i> ASSIGN</button>

                    <!-- start: Assign Modal -->
                    <div class="modal fade" id="staticBackdrop{{$land->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">ASSIGN TO OWNER</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form role="form" action="{{ route("plot.update", [$land->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">     
                            @csrf
                            @method('PUT')
                              <div class="modal-body">
                                <div class="col-md-offset-2">
                                  <div class="form-group">
                                    <div>
                                      {{-- <strong>  --}}
                                        <h5 class="text-muted"> You can assign a plot to a customer by selecting the name of the customer from the client drop down list. <b> <small style="color:red">AND MAKE SURE YOU CLICK ON THE SAVE BUTTON! </small> </b></h5> 
                                      {{-- </strong> --}}
                                      <p class="text-muted text-center" style="text-transform: uppercase">  </p>
                                    </div>
                                    <br>

                                    {{-- <div class="form-group row justify-content-start">
                                      <label for="plots_id" class="col-md-4 col-form-label text-md-left">{{__('Plot ID')}} </label>

                                      <div class="col-md-8">
                                        <input type="plots_id" id="plots_id" name="plots_id" class="col-md col-form-label text-md-left" value="{{ old('plots_id', isset($land) ? $land->id : '') }}" disabled>
                                      </div>
                                    </div> --}}

                                    <div class="form-group row">
                                      <label for="plot_address" class="col-md-4 col-form-label text-md-left">{{ __('Plot Address') }}</label>
          
                                      <div class="col-md-8">
                                        <input type="plot_address" id="plot_address" name="plot_address" class="col-md col-form-label text-md-left" value="{{ old('plot_address', isset($land) ? $land->plot_address : '') }}" disabled>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="users_id" class="col-md-4 col-form-label text-md-left">{{__('Client')}} </label>

                                      <div class="col-md-8">
                                        <select name="users_id" class="form-control btn-outline-info">
                                            <option value="">-- Select the Plot owner --</option>
                                            @foreach ($users as $client)
                                                <option value="{{ $client->id }}">
                                                    {{ $client->fname }} {{ $client->mname }} {{ $client->lname }}
                                                </option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="status" class="col-md-4 col-form-label text-md-left">{{ __('Plot Status')}}</label>

                                      <div class="col-md-8">
                                        <select name="status" class="form-control" id="status" aria-placeholder="Select Status Of Plot">
                                            <option value="{{ old('status', isset($land) ? $land->status : '') }}"> {{$land->status}}</option>
                                            <option value="{{ __('sold') }}">SOLD</option>
                                            <option value="{{ __('available') }}">AVAILABLE</option>
                                            <option value="{{ __('reserved') }}">RESERVED</option>
                                        </select>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>  
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    {{-- end: Assign Modal --}}
                  @endif
                </td>
              </tr>
            @endforeach
          </tfoot>
        </table> 
        <div class="paginationWrapper">
          {{ $plot->links() }}
        </div>
      </div>   
    @endrole

    @role('CEO|Admin|Secretary')
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

                  @if($land->users_id == '')
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#staticBackdrop{{$land->id}}"><i class="fas fa-sign-out-alt"></i> ASSIGN</button>

                    <!-- start: Assign Modal -->
                    <div class="modal fade" id="staticBackdrop{{$land->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">ASSIGN TO OWNER</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form role="form" action="{{ route("plot.update", [$land->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">     
                            @csrf
                            @method('PUT')
                              <div class="modal-body">
                                <div class="col-md-offset-2">
                                  <div class="form-group">
                                    <div>
                                      {{-- <strong>  --}}
                                        <h5 class="text-muted"> You can assign a plot to a customer by selecting the name of the customer from the client drop down list. <b> <small style="color:red">AND MAKE SURE YOU CLICK ON THE SAVE BUTTON! </small> </b></h5> 
                                      {{-- </strong> --}}
                                      <p class="text-muted text-center" style="text-transform: uppercase">  </p>
                                    </div>
                                    <br>

                                    {{-- <div class="form-group row justify-content-start">
                                      <label for="plots_id" class="col-md-4 col-form-label text-md-left">{{__('Plot ID')}} </label>

                                      <div class="col-md-8">
                                        <input type="plots_id" id="plots_id" name="plots_id" class="col-md col-form-label text-md-left" value="{{ old('plots_id', isset($land) ? $land->id : '') }}" disabled>
                                      </div>
                                    </div> --}}

                                    <div class="form-group row">
                                      <label for="plot_address" class="col-md-4 col-form-label text-md-left">{{ __('Plot Address') }}</label>
          
                                      <div class="col-md-8">
                                        <input type="plot_address" id="plot_address" name="plot_address" class="col-md col-form-label text-md-left" value="{{ old('plot_address', isset($land) ? $land->plot_address : '') }}" disabled>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="users_id" class="col-md-4 col-form-label text-md-left">{{__('Client')}} </label>

                                      <div class="col-md-8">
                                        <select name="users_id" class="form-control btn-outline-info">
                                            <option value="">-- Select the Plot owner --</option>
                                            @foreach ($users as $client)
                                              @if($client->role == "client")
                                                <option value="{{ $client->id }}">
                                                    {{ $client->fname }} {{ $client->mname }} {{ $client->lname }}
                                                </option>
                                              @endif
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="status" class="col-md-4 col-form-label text-md-left">{{ __('Plot Status')}}</label>

                                      <div class="col-md-8">
                                        <select name="status" class="form-control" id="status" aria-placeholder="Select Status Of Plot">
                                            <option value="{{ old('status', isset($land) ? $land->status : '') }}"> {{$land->status}}</option>
                                            <option value="{{ __('sold') }}">SOLD</option>
                                            <option value="{{ __('available') }}">AVAILABLE</option>
                                            <option value="{{ __('reserved') }}">RESERVED</option>
                                        </select>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>  
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Assign</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    {{-- end: Assign Modal --}}
                  @endif
                </td>
              </tr>
            @endforeach
          </tfoot>
        </table> 
        <div class="paginationWrapper">
          {{ $plot->links() }}
        </div>
      </div>   
    @endrole

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