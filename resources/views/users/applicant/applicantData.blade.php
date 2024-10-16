<div class="col-12 pt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="display:inline">All Applicants</h4>
         </div><!--end card-header-->
        
        <div class="card-body"> 
            
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
                        
                            <a id="buttonLink" style="color:#fff" href="{{ route('applicant.create', encrypt($applicant->sub_name)) }}" > 
                                <i class="fa fa-plus"></i> 
                                New {{$applicant->slug}}</a>
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
                    @include('users.applicant.individual')
                    
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
    </div>
</div> <!-- end col -->