@extends('layouts.admin')

@section('pageName')
Clients
@endsection

@section('content')

@role('Super-Admin')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        Client Details
      </h3>
      <div class="card-tools">
        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> 
          Add New Client
        </a>
      </div>
    </div>

    <div class="card-body">
      <table id="manageTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Client Email</th>
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
                    <button class="btn btn-info" alt="View"><i class="fas fa-eye"></i> More Details</button>
                  </a>
                  
                  <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$client->id}}" value="Details"/>

                  <div class="modal fade" id="exampleModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Quick Client Info
                          </h5> 
                          {{-- Customer Profile --}}
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-offset-2">
                            <div class="form-group">
                              <div>
                                <strong> <h2> {{ $client->fname}} {{ $client->mname}} {{ $client->lname}} </h2> </strong>
                                <p class="text-muted text-center" style="text-transform: uppercase">{{ $client->role }} ID: {{ $client->id }} </p>
                              </div>
                              <br>
                              {{-- <label for="name">Client Details</label>
                              <input type="text" name="fname" class="form-control" value="{{$client->fname}}">
                              <input type="text" name="mname" class="form-control" value="{{$client->mname}}">
                              <input type="text" name="lname" class="form-control" value="{{$client->lname}}"> --}}
                              {{-- <p class="text-muted text-center">
                                {{ $client->email }} <br>
                                {{ $client->phone }} <br>
                                {{ $client->address }} <br>
                                {{ $client->city }}, {{ $client->country }}
                              </p> --}}
                              <div class="form-group row justify-content-start">
                                <label for="fname" class="col-md-4 col-form-label text-md-left">{{__('First Name')}} </label>

                                <div class="col-md-8">
                                  <input type="fname" id="fname" name="fname" class="col-md col-form-label text-md-left" value="{{ old('fname', isset($client) ? $client->fname : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="mname" class="col-md-4 col-form-label text-md-left">{{ __('Middle Name') }}</label>
    
                                <div class="col-md-8">
                                  <input type="mname" id="mname" name="mname" class="col-md col-form-label text-md-left" value="{{ old('mname', isset($client) ? $client->mname : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-left">{{ __('Last Name') }}</label>
    
                                <div class="col-md-8">
                                  <input type="lname" id="lname" name="lname" class="col-md col-form-label text-md-left" value="{{ old('lname', isset($client) ? $client->lname : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
    
                                <div class="col-md-8">
                                  <input type="email" id="email" name="email" class="col-md col-form-label text-md-left" value="{{ old('email', isset($client) ? $client->email : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Phone') }}</label>
    
                                <div class="col-md-8">
                                  <input type="phone" id="phone" name="phone" class="col-md col-form-label text-md-left" value="{{ old('phone', isset($client) ? $client->phone : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-left">{{ __('Address') }}</label>
    
                                <div class="col-md-8">
                                  <input type="address" id="address" name="address" class="col-md col-form-label text-md-left" value="{{ old('address', isset($client) ? $client->address : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-left">{{ __('Region/Country') }}</label>
    
                                <div class="col-md-8">
                                  <input type="city" id="city" name="city" class="col-md col-form-label text-md-left" value="{{ old('city', isset($client) ? $client->city : '') }}, {{ old('country', isset($client) ? $client->country : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-left">{{ __('Total Plot Own') }}</label>
    
                                <div class="col-md-8">
                                  <input type="number" class="col-md col-form-label text-md-left" placeholder="{{ \App\Models\Plot::where(['users_id' => $client->id])->get()->count() }}" disabled>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
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

@role('Admin')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        Client Details
      </h3>
      <div class="card-tools">
        <a href="#" class="btn btn-primary"><i class="fas fa-plus-circle"></i> 
          Add New Client
        </a>
      </div>
    </div>

    <div class="card-body">
      <table id="manageTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Client Email</th>
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
                    <button class="btn btn-info" alt="View"><i class="fas fa-eye"></i> More Details</button>
                  </a>
                  
                  <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$client->id}}" value="Details"/>

                  <div class="modal fade" id="exampleModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Quick Client Info
                          </h5> 
                          {{-- Customer Profile --}}
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-offset-2">
                            <div class="form-group">
                              <div>
                                <strong> <h2> {{ $client->fname}} {{ $client->mname}} {{ $client->lname}} </h2> </strong>
                                <p class="text-muted text-center" style="text-transform: uppercase">{{ $client->role }} ID: {{ $client->id }} </p>
                              </div>
                              <br>
                              {{-- <label for="name">Client Details</label>
                              <input type="text" name="fname" class="form-control" value="{{$client->fname}}">
                              <input type="text" name="mname" class="form-control" value="{{$client->mname}}">
                              <input type="text" name="lname" class="form-control" value="{{$client->lname}}"> --}}
                              {{-- <p class="text-muted text-center">
                                {{ $client->email }} <br>
                                {{ $client->phone }} <br>
                                {{ $client->address }} <br>
                                {{ $client->city }}, {{ $client->country }}
                              </p> --}}
                              <div class="form-group row justify-content-start">
                                <label for="fname" class="col-md-4 col-form-label text-md-left">{{__('First Name')}} </label>

                                <div class="col-md-8">
                                  <input type="fname" id="fname" name="fname" class="col-md col-form-label text-md-left" value="{{ old('fname', isset($client) ? $client->fname : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="mname" class="col-md-4 col-form-label text-md-left">{{ __('Middle Name') }}</label>
    
                                <div class="col-md-8">
                                  <input type="mname" id="mname" name="mname" class="col-md col-form-label text-md-left" value="{{ old('mname', isset($client) ? $client->mname : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-left">{{ __('Last Name') }}</label>
    
                                <div class="col-md-8">
                                  <input type="lname" id="lname" name="lname" class="col-md col-form-label text-md-left" value="{{ old('lname', isset($client) ? $client->lname : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
    
                                <div class="col-md-8">
                                  <input type="email" id="email" name="email" class="col-md col-form-label text-md-left" value="{{ old('email', isset($client) ? $client->email : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Phone') }}</label>
    
                                <div class="col-md-8">
                                  <input type="phone" id="phone" name="phone" class="col-md col-form-label text-md-left" value="{{ old('phone', isset($client) ? $client->phone : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-left">{{ __('Address') }}</label>
    
                                <div class="col-md-8">
                                  <input type="address" id="address" name="address" class="col-md col-form-label text-md-left" value="{{ old('address', isset($client) ? $client->address : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-left">{{ __('Region/Country') }}</label>
    
                                <div class="col-md-8">
                                  <input type="city" id="city" name="city" class="col-md col-form-label text-md-left" value="{{ old('city', isset($client) ? $client->city : '') }}, {{ old('country', isset($client) ? $client->country : '') }}" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-left">{{ __('Total Plot Own') }}</label>
    
                                <div class="col-md-8">
                                  <input type="number" class="col-md col-form-label text-md-left" placeholder="{{ \App\Models\Plot::where(['users_id' => $client->id])->get()->count() }}" disabled>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
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