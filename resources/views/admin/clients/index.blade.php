@extends('layouts.admin')

@section('pageName')
Clients
@endsection

@section('content')

@role('Super-Admin')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Client Details</h3>
        <div class="card-tools">
          <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Client</a>
        </div>
    </div>

    <!-- Start Of Super Admin Session -->
    {{-- @if(auth()->user()->email == "superadmin@wfp.org") --}}
        <div class="card-body">
          <table id="manageTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Client Email</th>
                {{-- <th>Property </th> --}}
                <th class="text-center">Action</th>
              </tr>
            </thead> 
            <tbody>
              @foreach($users as $client)
                @if($client->role == "client")
                  <tr class="gradeC">              
                    <td>{{$client->id}}</td>            
                    <td>{{$client->fname}} {{$client->mname}} {{$client->lname}}</td>
                    <td>{{$client->email}}</td>
                    <td class="text-center">
                      <a href="{{ route('clients.view', [$client->id]) }}" title="View">
                        <button class="btn btn btn-info" alt="View"><i class="fas fa-eye"></i> View</button>
                      </a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-eye"></i> DETAILS</button>

                      <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                              {{-- start: --}}
                              <div class="card-body">
                                
                                <div>
                                  <strong> <h2> {{ $client->fname}} {{ $client->mname}} {{ $client->lname}} </h2> </strong>
                                </div>
                                <br>
                                
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th class="text text-center"> Site Visit</th>
                                      <th class="text text-center"> Alkalo</th>
                                      <th class="text text-center"> Sketch Plan</th>
                                      <th class="text text-center"> Physical Plan</th>
                                      <th class="text text-center"> Area Council</th>
                                      <th class="text text-center"> Chief Approval</th>
                                      <th class="text text-center"> Capital Gains</th>
                                      <th class="text text-center"> DHL / Pickup</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>                            
                                        <td class="text text-center"> 
                                            <span class="badge badge-success">{{__('YES')}}</span>
                                        </td>
                                        <td class="text text-center"> 
                                            <span class="badge badge-warning">{{__('INTITIATED')}}</span>
                                        </td>
                                        <td class="text text-center"> 
                                            <span class="badge badge-danger">{{__('PENDING')}}</span>
                                        </td>
                                      </tr>
                                  </tfoot>
                                </table>
                              </div>
                              {{-- end: --}}
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endif
              @endforeach    
            </tfoot>
          </table> 
        </div>   
  </div>
@endrole

@role('Staff')

@endrole

@role('Client')

@endrole
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