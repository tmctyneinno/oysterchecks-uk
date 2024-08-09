@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title">{{$slug->name}}</h4>
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
                <div class="card mb-3" style="background:#f1f5fa">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Create a Candidate for your Address Verification</h5>
                                <p class="card-text mb-0">A candidate is a person to which a verification is linked. An Individual, Guarantor or Business Verification can be requested with respect to the candidate created.</p>
                                <p class="card-text mb-0"><small class="text-muted">The input fields with the red asterisk (<span class="text-danger">*</span>) must be filled.</small></p>
                            </div>
                        </div>
                        
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
                    <form method="post" action="#" enctype="multipart/form-data" class="add-candidate-form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
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
                                                                        <select required class="form-select">
                                                                            <option value=""> --select applicant -- </option>
                                                                            <option value="passport">THomas Jame</option>
                                                                            <option value="idcard">Samuel Victor</option>
                                                                            <option value="diverslicense">Ricehs Christ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 card">
                                                                    {{-- <label class="form-label" for="firstname">Select Applicant </label> --}}

                                                                    <div class="d-grid mt-4">
                                                                        <label class="btn btn-primary px-4" for="add-documents">
                                                                            <span id="file-label">
                                                                                <i class="fa fa-plus"></i> Add Documents…
                                                                            </span>
                                                                            <input type="file" id="add-documents" multiple accept=".jpg, .jpeg, .png, .pdf" style="display: none;">
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
                                                        <p class="mb-0 fw-semibold text-black">Successful {{$slug->name}}</p>
                                                        <h3 class="m-0 text-success">success</h3>
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
                            <div class="row">
                                <div class="col-md-12">
                                    @if(Session::has('message'))
                                    <span class="btn btn-{{Session::get('alert')}}">
                                        {{Session::get('message')}}
                                    </span>
                                    @endif
                                    <div class="col-md-6 p-3">
                                        <span style="color:red; font-size:11px;"> Note: You will be charged ₦{{number_format($slug->fee, 2)}} for each {{$slug->name}}</span> <br>
                                        <span style="color:darkblue; font-size:11px;">Your wallet Balance is ₦0.0</span> <br>

                                        <input type="checkbox" required>

                                        <span style="font-size:11px;"> By checking this box you acknowledge that you have gotten consent from that data subject to use their data for verification purposes on our platform in accourdance to our <a href="#"> Privacy Policy</a></span>
                                    </div>
                                    
                                    <span class="float-center p-2">
                                        <button style="background-color: #25B794; border-color:#25B794" type="submit" class="btn btn-primary btn-lg w-23">Request verification <i class="dripicons-arrow-thin-right mt-1"></i></button>

                                    </span>
                                </div>

                            </div><!-- end row -->
                    
                        </div>
                    </form>
                </div><!-- end card-body --> 
            </div> <!-- end card -->                               
        </div> <!-- end col -->  
       
            
@endsection

@section('script')

<script>
    $('#btnsubmit').on('click', function() {
        $('#btnsubmit').html('<span class="spinner-grow text-secondary spinner-grow-sm" role="status" aria-hidden="true"></span>Please Wait....');
        let reference = $('#reference').val();
        let first_name = $('#first_name').val();
        let last_name = $('#last_name').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } 
        });
        $.ajax({
            url: "{{route('StoreVerify',$slug->slug)}}",
            type: 'GET',
            data: {
                reference: reference,
                first_name: reference,
                last_name: last_name
            },
            cache: false,
            dataType: "json",
            success: function(response) {
                // console.log(response.status);
                if (response.status == 'success') {
                    console.log(response);
                    $('#btnsubmit').html('<span class="" role="status" aria-hidden="true">Verify Candidate</span>');
                    $('#result').html('<span class="btn btn-success" role="status" aria-hidden="true">Verification Completed Successfull</span>');
                    $('#details').attr('hidden', false);
                    window.location.reload();
                }
            },
        });
    });
</script>

<script>
                        
    let accordionItemCount = 0; // Counter for accordion items
    document.getElementById('add-documents').addEventListener('change', function() {
        const optionItems = [
            'Passport',
            'ID card',
            'Drivers license',
            'Residence permit',
            'Selfie',
            'Proof of address',
            '2nd proof of address',
            'Payment method',
            'Proof of payment',
            'Bank card',
        ];
        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imageSrc = e.target.result;
 
                // Create img element
                const imgElement = document.createElement('img');
                imgElement.src = imageSrc;
                imgElement.style.maxWidth = '100%';

                // Create document item container
                const documentItem = document.createElement('div');
                documentItem.className = 'document-item row';
                accordionItemCount++;
                documentItem.innerHTML = `
                    <div class="accordion" id="accordionExample${accordionItemCount}">
                        <div class="accordion-item">
                            <h5 class="accordion-header m-0" id="heading${accordionItemCount}">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${accordionItemCount}" aria-expanded="true" aria-controls="collapse${accordionItemCount}">
                                    ${optionItems[i]} 
                                </button>
                            </h5>
                            <div id="collapse${accordionItemCount}" class="accordion-collapse collapse show" aria-labelledby="heading${accordionItemCount}"  data-bs-parent="#accordionExample${accordionItemCount}" style="">
                                <div class="accordion-body">
                                   
                                        <div class="row mt-1 justify-content-between">
                                            <div class="col-md-3 ">
                                                ${imgElement.outerHTML}
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-select" style="width: 100%;" id="selectDocumentType${accordionItemCount}">
                                                    ${optionItems.map(item => `<option>${item}</option>`).join('')}
                                                </select>
                                            </div>
                                           
                                            <div class="col-md-4" id="countrySelectContainer${accordionItemCount}">
                                                <select class="form-select select-country"></select>
                                            </div>

                                            
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="firstname">First name</label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required="">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="lastname">Last name</label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required="">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="aliasname">Middle name</label>
                                                <input type="text" class="form-control" id="aliasname" name="aliasname" placeholder="Alias name" required="">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="passportnumber">Document number</label>
                                                <input type="text" class="form-control" id="documentnumber" name="documentnumber" placeholder="Document number" required="">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="issuedate">Issue date</label>
                                                <input type="date" class="form-control" id="issuedate" name="issuedate" placeholder="Issue date" required="">
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <label class="form-label" for="validuntil">Valid until</label>
                                                <input type="date" class="form-control" id="validuntil" name="validuntil" required="">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="dateofbirth">Date of birth</label>
                                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required="">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label" for="dateofbirth">Place of birth</label>
                                                <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" required="">
                                            </div>
                                            
                                            <div class="col-md-12 mb-2 align-content-end">
                                                <button class="btn-danger addDocument btn mt-1">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Append document item to container
                document.getElementById('document-container').appendChild(documentItem);
                documentItem.querySelector('.addDocument').addEventListener('click', function() {
                    this.closest('.document-item').remove();
                });
                // Add event listener to the select element for document type
                const selectDocumentType = document.getElementById(`selectDocumentType${accordionItemCount}`);
                selectDocumentType.addEventListener('change', function() {
                    const selectedIndex = this.selectedIndex;
                    const accordionHeader = documentItem.querySelector('.accordion-header button');
                    accordionHeader.textContent = optionItems[selectedIndex];
                });
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }

        fetchCountries();
        documentItem.querySelector('.addDocument').addEventListener('click', function() {
            this.closest('.document-item').remove();
        });

    });

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
