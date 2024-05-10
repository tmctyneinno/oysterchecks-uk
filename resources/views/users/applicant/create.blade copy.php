 @extends('layouts.app')
 @section('content')
 
 <div id="createApplicant">

 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>

 <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Applicant Onboarding</h4>
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new {{$applicant->name}} Applicant</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                               
                                    <div class="accordion" id="accordionApplicantcard">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApplicantcard" aria-expanded="true" aria-controls="collapseApplicantcard">
                                                    <h4 class="card-title">Applicant Card</h4>
                                                </button>
                                            </h2>
                                            <!-- Nav tabs -->
                                            <div id="collapseApplicantcard" class="accordion-collapse collapse show" data-bs-parent="#accordionApplicantcard">
                                                <div class="accordion-body">
                                                    <!-- Add a container for the error message -->
                                                    <div id="error-message" class="alert alert-danger border-0" role="alert" style="display: none;"></div>
                                                    <div id="success-message" class="alert alert-success border-0" role="alert" style="display: none;">
                                                    </div>
                                                

                                                    <ul class="nav nav-tabs p-4" role="tablist">
                                                        
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#individuals" role="tab" aria-selected="true">Individual</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#company" role="tab" aria-selected="false" tabindex="-1">Company</a>
                                                        </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane p-3 active show" id="individuals" role="tabpanel" >
                                                            <form method="post" action="{{ route('applicant.store') }}" class="add-individual-form">
                                                                @csrf
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">First Name</label> 
                                                                            <input type="text" value="" id="firstname" name="lastname" class="form-control mb-3 custom-select" placeholder="First Name"  required >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Last Name</label> 
                                                                            <input type="text" value="" id="lastname" name="lastname" class="form-control mb-3 custom-select" placeholder="Last Name"  required >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Middle Name</label> 
                                                                            <input type="text" value="" id="middlename" name="middlename" class="form-control mb-3 custom-select" placeholder="Middle Name"  required >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Email</label> 
                                                                            <input type="email" value="" id="email" name="email" class="form-control mb-3 custom-select" placeholder="Email"   >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Phone</label> 
                                                                            <input type="number" value="" id="phone" name="phone" class="form-control mb-3 custom-select" placeholder="Phone"   >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Place of birth</label> 
                                                                            <input type="text" value="" id="placeofbirth" name="placeofbirth" class="form-control mb-3 custom-select" placeholder="Place of birth"   >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Date of birth</label> 
                                                                            <input type="date" value=""  id="dateofbirth" name="dateofbirth" class="form-control mb-3 custom-select" placeholder="Date of borth"   >
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Select country</label>
                                                                            <select required id="country-select"  name="selectcountry" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                                                                <option value=""><img>Select</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Country of birth</label>
                                                                            <select id="country-of-birth" name="countryofbirth" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                                                                <option value=""><img>Select</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label" style="font-weight:500">Gender</label>
                                                                            <select class="select form-control mb-3 custom-select" id="gender" name="gender" style="width: 100%; height:36px;">
                                                                                <option>Select</option>
                                                                                <option value="M">Male</option>
                                                                                <option value="F">Famale</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="form-label" style="font-weight:500">Address</label>
                                                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                                                        </div>
                                                                        
                                                                        <script>
                                                                            // Fetch countries data from the API
                                                                            fetch('https://restcountries.com/v3.1/all')
                                                                                .then(response => response.json())
                                                                                .then(data => {
                                                                                    // Sort countries alphabetically
                                                                                    data.sort((a, b) => {
                                                                                        if (a.name.common === 'United Kingdom') return -1;
                                                                                        if (b.name.common === 'United Kingdom') return 1;
                                                                                        return a.name.common.localeCompare(b.name.common);
                                                                                    });
                                                                                    // Populate the select dropdown with countries data
                                                                                    const countrySelect = document.getElementById('country-select');
                                                                                    const countryBirth = document.getElementById('country-of-birth');
                                                                                    data.forEach(country => {
                                                                                        // const img = document.createElement('option img');
                                                                                        // img.src = country.flags.png;
                                                                                        // img.alt = country.name.common;

                                                                                        const option = document.createElement('option');
                                                                                        const option2 = document.createElement('option');
                                                                                        option.value = country.cca2;
                                                                                        option.textContent = `${country.name.common} (${country.cca2})`;

                                                                                        option2.value = country.cca2;
                                                                                        option2.textContent = `${country.name.common} (${country.cca2})`;
                                                                                        countrySelect.appendChild(option);
                                                                                        countryBirth.appendChild(option2);
                                                                                        // countrySelect.appendChild(img);
                                                                                    });
                                                                                })
                                                                                .catch(error => console.error('Error fetching countries:', error));
                                                                        </script>
                                                                        
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12 d-grid">
                                                                        <button style="background-color: #25B794; border-color:#25B794" type="submit" class="btn btn-primary btn-lg submitbtn">Create applicant <i class="dripicons-arrow-thin-right mt-1"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            
                                                        </div>
                                                        <div class="tab-pane p-3  " id="company" role="tabpanel">
                                                            <form method="post" action="{{ route('applicant.store') }}" class="add-company-form">
                                                                @csrf
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                       
                                                                       
                                                                        
                                                                        
                                                                       
                                                                        
                                                                        <script>
                                                                            // Fetch countries data from the API
                                                                            fetch('https://restcountries.com/v3.1/all')
                                                                                .then(response => response.json())
                                                                                .then(data => {
                                                                                    // Sort countries alphabetically
                                                                                    data.sort((a, b) => {
                                                                                        if (a.name.common === 'United Kingdom') return -1;
                                                                                        if (b.name.common === 'United Kingdom') return 1;
                                                                                        return a.name.common.localeCompare(b.name.common);
                                                                                    });
                                                                                    // Populate the select dropdown with countries data
                                                                                    const countrySelect = document.getElementById('country-select');
                                                                                    const countryBirth = document.getElementById('country-of-birth');
                                                                                    const companyCountry = document.getElementById('company-country-select');
                                                                                    data.forEach(country => {
                                                                                        // const img = document.createElement('option img');
                                                                                        // img.src = country.flags.png;
                                                                                        // img.alt = country.name.common;

                                                                                        const option = document.createElement('option');
                                                                                        const option2 = document.createElement('option');
                                                                                        const option3 = document.createElement('option');
                                                                                        option.value = `${country.name.common} (${country.cca2})`; 
                                                                                        option.textContent = `${country.name.common} (${country.cca2})`;

                                                                                        option2.value = `${country.name.common} (${country.cca2})`; 
                                                                                        option2.textContent = `${country.name.common} (${country.cca2})`; 
                                                                                        option3.textContent = `${country.name.common} (${country.cca2})`; 
                                                                                        countrySelect.appendChild(option);
                                                                                        countryBirth.appendChild(option2);
                                                                                        companyCountry.appendChild(option3);
                                                                                        // countrySelect.appendChild(img);
                                                                                    });
                                                                                })
                                                                                .catch(error => console.error('Error fetching countries:', error));
                                                                        </script>
                                                                        
                                                                    
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12 d-grid">
                                                                        <button style="background-color: #25B794; border-color:#25B794" type="submit" class="btn btn-primary btn-lg submitbtn">Create applicant <i class="dripicons-arrow-thin-right mt-1"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="mt-3 document-container" id="document-container"></div>
                                    <div class="document-details" id="document-details"></div>
                                    <div id="accordionExample"></div>
                                    
                              
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card-header">
                                                <h4 class="card-title">Applicant Success</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col">
                                                        <h4 id="applicantNameTab" class="mb-0 fw-semibold text-black"> {{$applicant->name}} Datails</h4>
                                                        <br>
                                                        <h4 class="m-0 text-success" id="successMessage"></h4>
                                                        <div id="successMessage" class="alert alert-success border-0" role="alert" style="display: none;"></div>
                                    
                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                const tabs = document.querySelectorAll('.nav-link');
                                                                const tabContents = document.querySelectorAll('.tab-pane');

                                                                tabs.forEach((tab, index) => {
                                                                    tab.addEventListener('click', function(event) {
                                                                        event.preventDefault();
                                                                        tabs.forEach(tab => tab.classList.remove('active'));
                                                                        tabContents.forEach(content => content.classList.remove('active', 'show'));
                                                                        tab.classList.add('active');
                                                                        const targetId = tab.getAttribute('href').replace('#', '');

                                                                        document.getElementById(targetId).classList.add('active', 'show');
                                                                        const applicantName = document.getElementById('applicantNameTab');
                                                                        if (targetId === 'individuals') {
                                                                            applicantName.textContent = 'Individual Verifications ';
                                                                        } else if (targetId === 'company') {
                                                                            applicantName.textContent = 'Company Verifications';
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>

                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div id="apiResponseContainer"></div>
                                                {{-- <a href="{{ route('applicant.showverify') }}" class="btn-secondary btn">View verification page</a> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                   
                    
                    <script>
                        document.querySelector('.add-individual-form').addEventListener('submit', function(event) {
                            event.preventDefault(); 
                            const applicant_type = "individual";
                            //individual
                            const firstname = document.getElementById('firstname').value;
                            const lastname = document.getElementById('lastname').value;
                            const middlename = document.getElementById('middlename').value;
                            const email = document.getElementById('email').value;
                            const phone = document.getElementById('phone').value;
                            const placeofbirth = document.getElementById('placeofbirth').value;
                            const dateofbirth = document.getElementById('dateofbirth').value;
                            const country = document.getElementById('country-select').value;
                            const countryofbirth = document.getElementById('country-of-birth').value;
                            const gender = document.getElementById('gender').value;
                            const address = document.getElementById('address').value;
                            const errorMessage = document.getElementById('error-message');
                            const successMessage = document.getElementById('success-message');
                            const successmessage = document.getElementById('successMessage');

                            errorMessage.style.display = 'none';
                            errorMessage.textContent = '';
                            successMessage.style.display = 'none';
                            successMessage.textContent = '';

                            successmessage.style.display = 'none';
                            successmessage.textContent = '';

                            if (!firstname || !lastname || !middlename) {
                                errorMessage.textContent = 'Please enter all required details before submitting.';
                                errorMessage.style.display = 'block';
                                setTimeout(() => {
                                    errorMessage.style.display = 'none';
                                }, 5000);
                                return;
                            }
                            // Prepare data for submission
                            const formData = {
                                applicant_type,
                                firstname,
                                lastname,
                                middlename,
                                email,
                                phone,
                                placeofbirth,
                                dateofbirth,
                                country,
                                countryofbirth,
                                gender,
                                address
                            };
                            fetch('{{ route('applicant.store') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }, 
                                body: JSON.stringify(formData)
                            })
                            .then(response => {
                                if (!response.ok) {
                                    alert('Something went wrong');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    const apiResponseContainer = document.getElementById('apiResponseContainer');
                                    successmessage.textContent = data.message;
                                    successmessage.style.display = 'block'; 
                                    
                                    apiResponseContainer.innerHTML = ''; 
                                    successMessage.innerHTML = ''; 
                                    successmessage.innerHTML = ''; 

                                    const response = JSON.parse(data.apiResponse);
                                    //create paragraphs to dislay individual data
                                    const idParagraph = document.createElement('p');
                                    idParagraph.textContent = `ID: ${response.id}`;
                                    apiResponseContainer.appendChild(idParagraph);

                                
                                    const keyParagraph = document.createElement('p');
                                    keyParagraph.textContent = `key: ${response.key}`;
                                    apiResponseContainer.appendChild(keyParagraph);

                                    const externalUserIdParagraph = document.createElement('p');
                                    externalUserIdParagraph.textContent = `ExternalUserId: ${response.externalUserId}`;
                                    apiResponseContainer.appendChild(externalUserIdParagraph);

                                    const sourceKeyParagraph = document.createElement('p');
                                    sourceKeyParagraph.textContent = `SourceKey: ${response.sourceKey}`;
                                    apiResponseContainer.appendChild(sourceKeyParagraph);

                                    const emailParagraph = document.createElement('p');
                                    emailParagraph.textContent = `Email: ${response.email}`;
                                    apiResponseContainer.appendChild(emailParagraph);

                                    const phoneParagraph = document.createElement('p');
                                    phoneParagraph.textContent = `Phone: ${response.phone}`;
                                    apiResponseContainer.appendChild(phoneParagraph);

                                    // Format createdAt date
                                    const createdAtDate = new Date(response.createdAt);
                                    const createdAtFormatted = createdAtDate.toLocaleDateString('en-US', {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    });
                                    const createdAtParagraph = document.createElement('p');
                                    createdAtParagraph.textContent = `Created At: ${createdAtFormatted}`;
                                    apiResponseContainer.appendChild(createdAtParagraph);

                                    const secretKey = CryptoJS.lib.WordArray.random(16).toString(CryptoJS.enc.Hex);
                                    const encryptedApiResponse = CryptoJS.AES.encrypt(data.apiResponse, secretKey).toString();
                                    const link = document.createElement('a');
                                    link.textContent = 'View verification details';
                                    link.href = '{{ route('applicant.showverify')}}?apiResponse=' + encodeURIComponent(data.apiResponse);
                                     link.classList.add('btn', 'btn-secondary');
                                    apiResponseContainer.appendChild(link);

                                    // const paragraph = document.createElement('p');
                                    // paragraph.textContent = data.apiResponse;
                                    // 
                                    // apiResponseContainer.appendChild(paragraph);

                                    successMessage.textContent = 'Applicant created successfully';
                                    successMessage.style.display = 'block';
                                    // Redirect to another page after a delay
                                    setTimeout(function() {
                                        successMessage.style.display = 'none';
                                        //window.location.href = '{{ route('applicant.showverify') }}';
                                    }, 2000);
                                }
                                else {
                                    errorMessage.textContent = 'Data went wrong';
                                    errorMessage.style.display = 'block';
                                    setTimeout(() => {
                                        errorMessage.style.display = 'none';
                                    }, 3000);
                                    return;
                                }
                            })
                            .catch(error => {
                                console.error('Error saving data:', error);
                            });
                        });

                        document.querySelector('.add-company-form').addEventListener('submit', function(event) {
                            event.preventDefault(); 
                            const applicant_type = "company";
                            const companyname = document.getElementById('companyname').value;
                            const registrationnumber = document.getElementById('registrationnumber').value;
                            const country = document.getElementById('company-country-select').value;
                            const email = document.getElementById('companyemail').value;
                            const phone = document.getElementById('companyphone').value;
                            const companycreateddate = document.getElementById('companycreateddate').value;
                            const companyType = document.getElementById('companyType').value;
                            const taxpayer = document.getElementById('taxpayer').value;
                            const websitelink = document.getElementById('websitelink').value;
                            const address = document.getElementById('legaladdress').value;
                            
                            const errorMessage = document.getElementById('error-message');
                            const successMessage = document.getElementById('success-message');

                            errorMessage.style.display = 'none';
                            errorMessage.textContent = '';
                            successMessage.style.display = 'none';
                            successMessage.textContent = '';

                            // Prepare data for submission
                            const formData = {
                                applicant_type, companyname, registrationnumber,country,
                                email, phone, companycreateddate,companyType,
                                taxpayer, websitelink, address,
                            };
                            fetch('{{ route('applicant.store') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }, 
                                body: JSON.stringify(formData)
                            })
                            .then(response => {
                                if (!response.ok) {
                                    alert('Something went wrong');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    const apiResponseContainer = document.getElementById('apiResponseContainer');
                                    apiResponseContainer.innerHTML = ''; 

                                    const response = JSON.parse(data.apiResponse);
                                    //create paragraphs to dislay individual data
                                    const idParagraph = document.createElement('p');
                                    idParagraph.textContent = `ID: ${response.id}`;
                                    apiResponseContainer.appendChild(idParagraph);

                                     // Format createdAt date
                                     const createdAtDate = new Date(response.createdAt);
                                    const createdAtFormatted = createdAtDate.toLocaleDateString('en-US', {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    });
                                    
                                    const keyParagraph = document.createElement('p');
                                    keyParagraph.textContent = `key: ${response.key}`;
                                    apiResponseContainer.appendChild(keyParagraph);

                                    const externalUserIdParagraph = document.createElement('p');
                                    externalUserIdParagraph.textContent = `ExternalUserId: ${response.externalUserId}`;
                                    apiResponseContainer.appendChild(externalUserIdParagraph);

                                    const sourceKeyParagraph = document.createElement('p');
                                    sourceKeyParagraph.textContent = `SourceKey: ${response.sourceKey}`;
                                    apiResponseContainer.appendChild(sourceKeyParagraph);

                                    const companyNameParagraph = document.createElement('p');
                                    companyNameParagraph.textContent = `Company Name: ${response.info.companyInfo.companyName}`;
                                    apiResponseContainer.appendChild(companyNameParagraph);

                                    const registrationNumber = document.createElement('p');
                                    registrationNumber.textContent = `Registration Number: ${response.info.companyInfo.registrationNumber}`;
                                    apiResponseContainer.appendChild(registrationNumber);

                                    const emailCompany = document.createElement('p');
                                    emailCompany.textContent = `Email: ${response.info.companyInfo.email}`;
                                    apiResponseContainer.appendChild(emailCompany);

                                     // Format createdAt date
                                    //  const createdAtDate = new Date(response.createdAt);
                                    // const createdAtFormatted = createdAtDate.toLocaleDateString('en-US', {
                                    //     year: 'numeric',
                                    //     month: 'long',
                                    //     day: 'numeric'
                                    // });
                                    // const createdAtParagraph = document.createElement('p');
                                    // createdAtParagraph.textContent = `Created At: ${createdAtFormatted}`;
                                    // apiResponseContainer.appendChild(createdAtParagraph);

                                    const secretKey = CryptoJS.lib.WordArray.random(16).toString(CryptoJS.enc.Hex);
                                    const encryptedApiResponse = CryptoJS.AES.encrypt(data.apiResponse, secretKey).toString();
                                    const link = document.createElement('a');
                                    link.textContent = 'View verification details';
                                    link.href = '{{ route('applicant.showverify')}}?apiResponse=' + encodeURIComponent(data.apiResponse);
                                     link.classList.add('btn', 'btn-secondary');
                                    apiResponseContainer.appendChild(link);


                                    // const paragraph = document.createElement('p');
                                    // paragraph.textContent = data.apiResponse;
                                    // apiResponseContainer.appendChild(paragraph);


                                    successMessage.textContent = 'Applicant created successfully';
                                    successMessage.style.display = 'block';
                                    // Redirect to another page after a delay
                                    setTimeout(function() {
                                        successMessage.style.display = 'none';
                                    //    window.location.href = '{{ route('applicant.showverify') }}';
                                    }, 2000);
                                } else {
                                    errorMessage.textContent = 'Data went wrong';
                                    errorMessage.style.display = 'block';
                                    setTimeout(() => {
                                        errorMessage.style.display = 'none';
                                    }, 3000);
                                    return;
                                }
                            })
                            .catch(error => {
                                console.error('Error saving data:', error);
                            });
                        });

                        


                    </script>

                    
                    
                </div><!-- end card-body --> 
                
            </div> <!-- end card -->                               
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