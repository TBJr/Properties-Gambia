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
                            <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('assets/profile/') .'/'. $client[0]->photo }}" alt="{{ $client[0]->fname . ' Photo' }}">
                        </div>

                        <h2 class="profile-username text-center" style="text-transform: uppercase">
                            {{ $client[0]->fname }} 
                            {{ $client[0]->mname }} 
                            {{ $client[0]->lname }}
                        </h2>

                        <h5 class="text-muted text-center" style="text-transform: uppercase">
                            {{$client[0]->role}}
                        </h5>

                        <p class="text-muted text-center">
                            {{ $client[0]->email }} <br>
                            {{ $client[0]->phone }} <br>
                            {{ $client[0]->address }} <br>
                            {{ $client[0]->city }}, {{ $client[0]->country }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4>HOW TO READ THE PROCCESS STAGE</h4>
                        <a class="text text-center"><span class="badge badge-success">ALKALO</span> This is means the transfer of ownership has began.</a> <br>
                        <a class="text text-center"><span class="badge badge-danger">ALKALO</span> This is means the transfer of ownership hasn't began yet.</a> <br>
                        <a class="text text-center"><span class="badge badge-success">SKETCH PLAN</span> This is means the Scetch Plan Processas has started.</a> <br>
                        <a class="text text-center"><span class="badge badge-danger">SKETCH PLAN</span> This is means the Scetch Plan Processas hasn't started.</a> <br>
                        <a class="text text-center"><span class="badge badge-success">ALKALO</span> This is means the transfer of ownership has began yet.</a> <br>
                        <a class="text text-center"><span class="badge badge-danger">ALKALO</span> This is means the transfer of ownership hasn't began yet.</a> <br> --}}
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="manageTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Plot Name</th>
                      <th>Plot Address</th>
                      <th>Plot No.</th>
                      <th>Plot Coordinate</th>
                      <th class="text text-center">Plot Size</th>
                      <th class="text text-center">Plot Stage</th>
                      <th class="text text-center">More Action</th>
                    </tr>
                  </thead> 
                <tbody>
                    @foreach($plots as $land)
                        @if($land->users_id == $client[0]->id)
                            <tr class="gradeC">              
                                <td>{{$land->id}}</td>
                                <td>{{$land->plot_name}}</td>
                                <td>{{$land->plot_address}}</td>
                                <td>{{$land->plot_number}}</td>
                                <td class="text text-center">{{$land->plot_coordinate}}</td>
                                <td class="text text-center">{{$land->plot_size}}</td>
                                <td class="text text-center"><span class="badge badge-success">{{$land->stage}} </span></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".edit-stages"><i class="fas fa-eye"></i> EDIT</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-eye"></i> DETAILS</button>
                                    </div>
                                    
                                    <!-- start: EDIT Modal -->
                                    <div class="modal fade edit-stages" tabindex="-1" role="dialog" aria-labelledby="myStageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="card-body">
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
                                                                {{-- start: SITE VISIT --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->active == 0)
                                                                        <a href="{{ route('clients.siteVisit', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->active == 1)
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif                                                                    
                                                                </td>
                                                                {{-- end: SITE VISITE --}}

                                                                {{-- start: ALKALO --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == '')
                                                                        <a href="{{ route('clients.alkalo', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != 'alkalo' || $land->stage != '' || $land->stage == 'alkalo')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif                                                 
                                                                </td>
                                                                {{-- end: ALKALO --}}
            
                                                                {{-- start: sketch_plan --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'alkalo' || $land->stage == '')
                                                                        <a href="{{ route('clients.sketchPlan', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != '' || $land->stage != 'sketch_plan' || $land->stage == 'sketch_plan')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: sketch_plan --}}
            
                                                                {{-- start: physical_plan --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == '' || $land->stage == 'alkalo' || $land->stage == 'sketch_plan')
                                                                        <a href="{{ route('clients.physicalPlan', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != '' || $land->stage != 'physical_plan' || $land->stage == 'physical_plan')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: physical_plan --}}
            
                                                                {{-- start: areal_council --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == '' || $land->stage == 'alkalo' || $land->stage == 'sketch_plan' || $land->stage == 'physical_plan')
                                                                        <a href="{{ route('clients.areaCouncil', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != '' || $land->stage != 'areal_council' || $land->stage == 'areal_council')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: areal_council --}}
            
                                                                {{-- start: chief_approval --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == '' || $land->stage == 'alkalo' || $land->stage == 'sketch_plan' || $land->stage == 'physical_plan' || $land->stage == 'areal_council')
                                                                        <a href="{{ route('clients.chiefApproval', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != '' || $land->stage != 'chief_approval' || $land->stage == 'chief_approval')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: chief_approval --}}
            
                                                                {{-- start: capital_gains --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == '' || $land->stage == 'alkalo' || $land->stage == 'sketch_plan' || $land->stage == 'physical_plan' || $land->stage == 'areal_council' || $land->stage == 'chief_approval')
                                                                        <a href="{{ route('clients.capitalGains', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != '' || $land->stage != 'capital_gains' || $land->stage == 'capital_gains')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: capital_gains --}}
            
                                                                {{-- start: DHL/Client_pickup --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == '' || $land->stage == 'alkalo' || $land->stage == 'sketch_plan' || $land->stage == 'physical_plan' || $land->stage == 'areal_council' || $land->stage == 'chief_approval' || $land->stage == 'capital_gains')
                                                                        <a href="{{ route('clients.dhlPickup', $land->id) }}" title="APPROVE">
                                                                          <button class="btn-sm btn btn-success" alt="approve">
                                                                            <i class="fas fa-thumbs-up"></i>
                                                                          </button>
                                                                        </a>
                                                                        @elseif($land->stage != '' || $land->stage != 'DHL/Client_pickup' || $land->stage == 'DHL/Client_pickup')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: DHL/Client_pickup --}}
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end: EDIT MODAL --}}

                                    {{-- start: details modal --}}
                                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="card-body">
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
                                                                {{-- start: SITE VISIT --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->active == '1')
                                                                        <span class="badge badge-success">{{__('YES')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('NO')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: SITE VISITE --}}

                                                                {{-- start: ALKALO --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'alkalo' && $land->process == 'initiated')
                                                                        <span class="badge badge-warning">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        @if($land->stage == 'alkalo' && $land->process == 'pending')
                                                                            <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                        @endif
                                                                    @endif
                                                                    @if($land->stage == 'alkalo' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: ALKALO --}}
            
                                                                {{-- start: sketch_plan --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'sketch_plan' && $land->process == 'initiated')
                                                                        <span class="badge badge-success">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                    @endif
                                                                    @if($land->stage == 'sketch_plan' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: sketch_plan --}}
            
                                                                {{-- start: physical_plan --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'physical_plan' && $land->process == 'initiated')
                                                                        <span class="badge badge-success">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                    @endif
                                                                    @if($land->stage == 'physical_plan' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: physical_plan --}}
            
                                                                {{-- start: areal_council --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'areal_council' && $land->process == 'initiated')
                                                                        <span class="badge badge-success">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                    @endif
                                                                    @if($land->stage == 'areal_council' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: areal_council --}}
            
                                                                {{-- start: chief_approval --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'chief_approval' && $land->process == 'initiated')
                                                                        <span class="badge badge-success">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                    @endif
                                                                    @if($land->stage == 'chief_approval' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: chief_approval --}}
            
                                                                {{-- start: capital_gains --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'capital_gains' && $land->process == 'initiated')
                                                                        <span class="badge badge-success">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                    @endif
                                                                    @if($land->stage == 'capital_gains' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: capital_gains --}}
            
                                                                {{-- start: DHL/Client_pickup --}}
                                                                <td class="text text-center"> 
                                                                    @if($land->stage == 'DHL/Client_pickup' && $land->process == 'initiated')
                                                                        <span class="badge badge-success">{{__('INTITIATED')}}</span>
                                                                        @else
                                                                        <span class="badge badge-danger">{{__('PENDING')}}</span>
                                                                    @endif
                                                                    @if($land->stage == 'DHL/Client_pickup' && $land->process == 'completed')
                                                                        <span class="badge badge-success">{{__('COMPLETED')}}</span>
                                                                    @endif
                                                                </td>
                                                                {{-- end: DHL/Client_pickup --}}
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end: details stages --}}
                                </td>
                            </tr>
                        @endif
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