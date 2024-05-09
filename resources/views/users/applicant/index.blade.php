 @extends('layouts.app')
 @section('content')
 <div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Applicants Onboarding</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"></li>
                            </ol>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                            </a>
                        </div><!--end col-->  
                    </div><!--end row-->                                                              
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
            
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Applicants</h4>
                    {{-- <p class="text-muted mb-0">Takes the basic nav from above and adds the <code class="highlighter-rouge">.nav-tabs</code> class to generate a tabbed interface.</p> --}}
                </div><!--end card-header-->
                <div class="card-body"> 
                    <div class="d-flex justify-content-between">

                    </div>
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#individuals" role="tab" aria-selected="true">Individuals</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#companies" role="tab" aria-selected="false" tabindex="-1">Companies</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#actions" role="tab" aria-selected="false" tabindex="-1">Actions</a>
                                </li>  
                            </ul>
                        </div>
                        <div class="p-2"> 
                            <span style="float:right" class="btn btn-primary">
                                @foreach ($applicants as $applicant)
                                    <i class="fa fa-plus"></i> 
                                    <a id="buttonLink" style="color:#fff" href="{{ route('applicant.create', encrypt($applicant->sub_name)) }}" > New {{$applicant->slug}}</a>
                                @endforeach
                            </span> 
                        </div>
                      </div>   
                      <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var individualsTab = document.querySelector('a[href="#individuals"]');
                            var companiesTab = document.querySelector('a[href="#companies"]');

                            var buttonContainer = document.getElementById('buttonContainer');
                            var buttonLink = document.getElementById('buttonLink');
                    
                            companiesTab.addEventListener('click', function () {
                                <?php foreach ($applicants as $applicant): ?>
                                    <?php
                                        $route = route('applicant.create', encrypt($applicant->sub2_name));
                                    ?>
                                    buttonLink.textContent = 'New {{$applicant->sub2_name}}';
                                    buttonLink.href = "{{$route}}";
                                <?php endforeach; ?>
                            });
                            individualsTab.addEventListener('click', function () {
                                <?php foreach ($applicants as $applicant): ?>
                                    <?php
                                        $route = route('applicant.create', encrypt($applicant->sub_name));
                                    ?>
                                    buttonLink.textContent = 'New {{$applicant->slug}}';
                                    buttonLink.href = "{{$route}}";
                                <?php endforeach; ?>
                            });
                        });
                    </script>
                    

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active show" id="individuals" role="tabpanel">
                            <div class="col-12">
                               
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
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($individuals as $index => $individual)
                                                <tr>
                                                    <td class="text-center">{{$index + 1}}</td>
                                                    <td>
                                                        <b>{{ $individual->firstName}} {{ $individual->lastName}} <b><br/>
                                                        <label class="text-muted"> ID:  {{ $individual->applicantId}}  </label><br>
                                                        <label class="text-muted mb-1"> Country:  {{ $individual->country}} </label> <br>
                                                        <label class="text-muted">Created At: {{$individual->created_at->format('M d, Y, h:i A')}} (GMT+1)</label>
                                                    </td>
                                                    <td>{{$individual->phone}}</td>
                                                    <td>Created At: {{$individual->created_at->format('M d, Y,')}} </td>
                                                    <td>  
                                                        <span class="badge bg-success"> Verified</span>
                                                    </td>
                                                    <td><a class="badge bg-soft-primary" href=""> view Details</a></td>
                                                </tr>
                                            @endforeach 
                                           
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>        
                                </div>
                
                               
                            </div> <!-- end col -->
                        </div>
                        <div class="tab-pane p-3" id="companies" role="tabpanel">
                            @include('users.applicant.company')
                            
                        </div>
                        <div class="tab-pane p-3" id="actions" role="tabpanel">
                            <p class="mb-0 text-muted">
                                Actions
                            </p>
                        </div>                                                
                        
                    </div>        
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
            
    </div>
</div>                  
@endsection