<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-eye"></i> DETAILS</button>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            {{-- start: --}}
            <div class="card-body">
            
            <div>
                {{-- <strong> <h2> {{ $client[0]->fname}} {{ $client[0]->mname}} {{ $client[0]->lname}} </h2> </strong> --}}
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