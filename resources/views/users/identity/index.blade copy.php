@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title">IDENTITY Verification</h4>
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
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i data-feather="download" class="align-self-center icon-xs"></i>
                                </a>
                            </div><!--end col-->  
                        </div><!--end row-->                                                              
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
        <!-- end col -->
       </div>  

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3" style="background: #1b4c89;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="text-white">  <strong> Verify an Identity </strong> </h4>
                                <p class="card-text text-white mb-0">Seamless KYC and identity verification and get key insights and analysis for every verification.</p>
                                <p class="card-text text-white mb-0"><small class="">Use the "Verify Identity" button to initiate the verification process.</small></p>
                            </div>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="card-body d-flex justify-content-lg-end justify-content-center">
                                <a type="button" class="btn btn-primary btn-lg" href="{{route('showIdentityVerificationForm')}}">      <img src="{{asset('assets/images/favicon.png')}}" width="30px" > Verify Identity</a>

                            </div>
                        </div>
                        <!--end col-->
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-->
            </div>
        </div> 

        <div class="row">
            <div class="col-lg-12">
                <div class="card"> 
                 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{ route('applicant.store') }}" class="add-candidate-form">
                                    @csrf
                                    <div class="accordion" id="accordionApplicantcard">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApplicantcard" aria-expanded="true" aria-controls="collapseApplicantcard">
                                                    <h4 class="card-title">List of Applicant </h4>
                                                </button>
                                            </h2>
                                            <div id="collapseApplicantcard" class="accordion-collapse collapse show" data-bs-parent="#accordionApplicantcard">
                                                <div class="accordion-body">
                                                    <div class="card-body">
                                                        <div class="row ">
                                                            <div class="col-md-6 card">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="firstname">Select Applicant </label>
                                                                    <select class="form-select">
                                                                            <option value="passport">THomas Jame</option>
                                                                            <option value="idcard">Samuel Victor</option>
                                                                            <option value="diverslicense">Ricehs Christ</option>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 card">
                                                                {{-- <label class="form-label" for="firstname">Select Applicant </label> --}}

                                                                <div class="d-grid mt-4">
                                                                    <label class="btn btn-primary px-4" id="add-documents">
                                                                        <span>
                                                                            <i class="fa fa-plus"></i> Add Documents
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                                   
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                                <div class="document-container" id="document-container"></div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="document-details" id="document-details"></div>
                                    <div id="accordionExample"></div>
                                    <div class="row mt-4">
                                        <div class="col-sm-12 d-grid">
                                            <button style="background-color: #25B794; border-color:#25B794" type="submit" class="btn btn-primary btn-lg submitbtn">Request verification <i class="dripicons-arrow-thin-right mt-1"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="card-header">
                                            <h4 class="card-title">Payload Request</h4>
                                        </div><!--end card-header-->
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="mb-0 fw-semibold text-black">Successful {{$slug}} verifications</p>
                                                    <h3 class="m-0 text-success">{{$success}}</h3>
                                                    <p><snap class="text-muted">Created At:</snap> April 15, 2024, at 2:30:45 PM</p>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        
                        let accordionItemCount = 0; // Counter for accordion items
                        document.getElementById('add-documents').addEventListener('click', function() {
                            var documentItem = document.createElement('div');
                            documentItem.className = 'document-item row ';
                            documentItem.innerHTML = `
                                <div class="row mt-2 justify-content-end">
                                    <div class="col-md-2 px-1"></div>
                                    <div class="col-md-3 px-1">
                                        <select class="form-select">
                                            <option value="passport">Passport</option>
                                            <option value="idcard">ID Card</option>
                                            <option value="diverslicense">Divers License</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <select class="form-select select-country"></select>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <button class="btn btn-primary upload mt-1 add-details" id="">
                                            <i class="fa fa-upload"></i> Add
                                        </button>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <button class="btn-danger addDocument btn mt-1">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            `;
                            document.getElementById('document-container').appendChild(documentItem);
                            fetchCountries();
                    
                            documentItem.querySelector('.upload').addEventListener('click', function() {
                                this.closest('.document-item').remove();
                            });
                            documentItem.querySelector('.addDocument').addEventListener('click', function() {
                                this.closest('.document-item').remove();
                            });
                    
                            documentItem.querySelector('.add-details').addEventListener('click', handleAddDetails);
                    
                        });

                        function handleAddDetails(event) {
                            var additionalContent = document.createElement('div');
                            accordionItemCount++;
                            additionalContent.innerHTML = `
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample${accordionItemCount}">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header m-0" id="heading${accordionItemCount}">
                                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${accordionItemCount}" aria-expanded="true" aria-controls="collapse${accordionItemCount}">
                                                    Accordion Item #${accordionItemCount}
                                                </button>
                                            </h5>
                                            <div id="collapse${accordionItemCount}" class="accordion-collapse collapse show" aria-labelledby="heading${accordionItemCount}"  data-bs-parent="#accordionExample${accordionItemCount}" style="">
                                                <div class="accordion-body">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="firstname">First name</label>
                                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="lastname">Last name</label>
                                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="aliasname">Alias name</label>
                                                                <input type="text" class="form-control" id="aliasname" name="aliasname" placeholder="Alias name" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="passportnumber">Passport number</label>
                                                                <input type="text" class="form-control" id="passportnumber" name="passportnumber" placeholder="Passport number" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="issuedate">Issue date</label>
                                                                <input type="date" class="form-control" id="issuedate" name="issuedate" placeholder="Issue date" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="dateofbirth">Date of birth</label>
                                                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <label class="form-label" for="validuntil">Valid until</label>
                                                                <input type="date" class="form-control" id="validuntil" name="validuntil" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2 align-content-end">
                                                                <button type="button" class="btn btn-danger deleteAddDetails">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            document.getElementById('document-details').appendChild(additionalContent);
                            additionalContent.querySelector('.deleteAddDetails').addEventListener('click', function() {
                                additionalContent.remove(); // Remove the individual content
                            });
                        }
                    
                        // Function to fetch list of countries
                        function fetchCountries() {
                            fetch('https://restcountries.com/v3.1/all')
                                .then(response => response.json())
                                .then(data => {
                                    // Sort countries alphabetically
                                    data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                                    // Find Nigeria index
                                    const nigeriaIndex = data.findIndex(country => country.name.common === 'Nigeria');
                                    // If Nigeria found, remove it and add it to the beginning
                                    if (nigeriaIndex !== -1) {
                                        const nigeria = data.splice(nigeriaIndex, 1)[0];
                                        data.unshift(nigeria);
                                    }

                                    // Generate options for countries
                                    const selectOptions = data.map(country => `<option value="${country.name.common}">${country.name.common}</option>`).join('');
                                    const selectElements = document.querySelectorAll('.select-country');
                                    selectElements.forEach(selectElement => {
                                        selectElement.innerHTML = selectOptions;
                                    });
                                })
                                .catch(error => console.error('Error fetching countries:', error));
                        }
                    </script>
                </div><!-- end card-body --> 
            </div> <!-- end card -->                               
        </div> <!-- end col -->  
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Identity Verification Log
                        
                        </h4>
                        <form method="post" action="#">
                        @csrf
                        <span style="float:right; top:-10px">   <li class="nav-item dropdown " style="list-style:none">
                                <a class="nav-link dropdown-toggle card-title" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort Data <i class="la la-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><button type="submit" name="sort" value="success" class="dropdown-item"> Sort By Successful</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button type="submit"  name="sort"  value="failed" class="dropdown-item" >Sort By Failed</button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button type="submit"  name="sort"  value="pending" class="dropdown-item" href="#">Sort By Pending</button></li>
                                </ul>
                            </li>
                            </span>
                        </form>
                    
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-hover dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th class="px-2 py-3">S/N</th>
                                    <th class="px-2 py-3">Inspection ID</th>
                                    <th class="px-2 py-3">Name</th>
                                    <th class="px-2 py-3">Review Status</th>
                                    <th class="px-2 py-3">Type</th>
                                    <th class="px-2 py-3">Fee</th>
                                    <th class="px-2 py-3">Created At</th>
                                    <th class="px-2 py-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                        
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">1</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Moses Smith</div></a></td>
                                    
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-secondary">Init</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-secondary">Individual</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">2</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Moses Smith</div></a></td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-warning">Pending</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Company</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">3</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Chris </div></a></td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-info"> Prechecked</span> 
                                        </div>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-secondary">Individual</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">4</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Ojo </div></a></td>
                                     <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Queued</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Company</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                    
                                        <a href="{{route('verify.details')}}">View Details</a>
                                    
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Ojo </div></a></td>
                                   <td class="px-0 py-0"><a class="table-link" href="">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-success">Completed</span>
                                            
                                        </div></a>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-secondary">Individual</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                        <a href="{{route('verify.details')}}">View Details</a>
                                        </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">5b594ade0a975a36c9379e67</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">Adeyemi Ojo </div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href="">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-warning">OnHold</span>
                                        </div></a>
                                    </td>
                                    <td class="px-0 py-0">
                                        <div class="px-2 py-3">
                                            <span class="badge badge-soft-primary">Company</span>
                                        </div>
                                    </td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">#20,000</div></a></td>
                                   
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">20 March, 2024</div></a></td>
                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"> 
                                        <a href="{{route('verify.details')}}">View Details</a>
                                        </div>
                                        </a>
                                    </td>
                                
                                </tr>
                                
                                
                                </tbody>
                            </table>        
                        </div>  
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
  
            
@endsection

@section('script')

<script>

jQuery(document).on('change', '.service-checkbox', function(e){
     e.preventDefault();
     var totalprice = parseFloat(jQuery('.totalprice strong').text());
    // alert(totalprice);
     var thisprice = parseFloat(jQuery(this).attr('data-price'));
     if( jQuery(this).is(':checked') ){
        totalprice = totalprice+thisprice;
     }else{
        totalprice = totalprice-thisprice;
     }
        jQuery('.totalprice strong').text(totalprice);
        jQuery('input[name="totalprice"]').val(totalprice);
   });
</script>

@endsection
