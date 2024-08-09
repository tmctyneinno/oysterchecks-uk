<div class="card-body">  
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
        
        <div class="row g-2 align-items-center">
            <div class="">
                <div class="d-flex justify-content-evenly">
                    <div class="p-2 flex-fill">Flex item with a lot of content</div>
                    <div class="p-2 flex-fill">Flex item</div>
                    <div class="p-2 flex-fill">Flex item</div>
                    <div class="p-2 flex-fill">Flex item</div>
                    <div class="p-2 flex-fill">Flex item</div>
                    <div class="p-2 flex-fill">Flex item</div>
                </div>
            </div>
        </div>

        <thead>
            <tr>
                <th>SN</th> 
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $index => $company)
                <tr>
                    <td class="text-center">{{$index + 1}}</td>
                    <td>
                        <b>{{ $company->companyname}} <b><br/>
                        <label class="text-muted"> ID:  {{ $company->applicantId}}  </label><br>
                        <label class="text-muted mb-1"> Country:  {{ $company->country}} </label> <br>
                        <label class="text-muted">Created At: {{$company->created_at->format('M d, Y, h:i A')}} (GMT+1)</label>
                    </td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->phone}}</td>
                    
                    <td>  
                        @if($company->status == 'found')
                            @if($company->validations != null && json_decode($company->validations)->validationMessages != "")
                            <span class="badge badge-soft-warning">Found</span>
                            @else
                            <span class="badge badge-soft-success"> Found</span> 
                            @endif
                            @elseif($company->status == 'not_found')
                            <span class="badge badge-soft-danger">Not Found</span>
                            @else
                            <span class="badge badge-soft-purple"> {{$company->status}}</span>
                        @endif  
                    </td>
                   
                    <td><a class="badge bg-soft-primary" href="{{ route('applicant.details', $company->applicantId ) }}"> view Details</a></td>
                </tr>
            @endforeach 
            
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>        
</div>