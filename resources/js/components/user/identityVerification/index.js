import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

export default function IdentityVerification() {
    let url = window.location.origin;
    const [applicants, setApplicants] = useState([]);
    const [identityData, setIdentityData] = useState([]);
    const [selectedApplicant, setSelectedApplicant] = useState('');
    const [images, setImages] = useState([]);
    const [countries, setCountries] = useState([]);
    const [responseData, setResponseData] = useState(null);
    const [successMessage, setSuccessMessage] = useState('');
    const [errorMessage, setErrorMessage] = useState('');
    const [textFields, setTextFields] = useState([]);
    
    const [firstName, setFirstName] = useState(null);
    const [lastName, setLastName] = useState('');
    const [middleName, setMiddleName] = useState('');
    const [issueddate, setIssuedDate] = useState('');
    const [validUntilDate, setValidUntilDate] = useState('');
    const [documentNumber, setDocumentNumber] = useState('');
    const [dataofBirth, setDataOfBirth] = useState('');
    const [placeOfBirth, setPlaceOfBirth] = useState('');
    const [slug, setSlug] = useState([]);
    const [wallet, setWallet] = useState([]);
    const [isCheckboxChecked, setIsCheckboxChecked] = useState(false);
    const [isLoading, setIsLoading] = useState(false); 

    const handleCheckboxChange = (e) => {
        setIsCheckboxChecked(e.target.checked);
    };
   
    useEffect(() => {
        const getIdentityFee = async () => {
            try {
                const response = await axios.get(`${url}/user/getIdentityFee`, {
                    params: { identity: 'identity' }
                });
                setSlug(response.data.slug);
                setWallet(response.data.wallet);
            } catch (error) {
                console.error('Error fetching getIdentityFee:', error);
            }
        };

        const fetchApplicants = async () => {
            try {
                const response = await axios.get(`${url}/user/getapplicant`);
                setApplicants(response.data.apiResponse);
            } catch (error) {
                console.error('Error fetching applicants:', error);
            }
        };
        const fetchIdentityVerification = async () => {
            try {
                const response = await axios.get(`${url}/user/identityVerification`);
                setIdentityData(response.data.identityData);
            } catch (error) {
                console.error('Error fetching applicants:', error);
            }
        };
        // const fetchCountries = async () => {
        //     try {
        //         const response = await axios.get('https://restcountries.com/v3.1/all');
        //         setCountries(response.data);
        //     } catch (error) {
        //         console.error('Error fetching countries:', error);
        //     }
        // };
        const fetchCountries = async () => {
            try {
                const response = await axios.get('https://restcountries.com/v3.1/all');
                const sortedCountries = response.data.sort((a, b) => {
                    // Compare country names alphabetically
                    if (a.name.common < b.name.common) return -1;
                    if (a.name.common > b.name.common) return 1;
                    return 0;
                });
        
                // Move United Kingdom to the front
                const ukIndex = sortedCountries.findIndex(country => country.cca3 === 'GBR');
                if (ukIndex !== -1) {
                    const [unitedKingdom] = sortedCountries.splice(ukIndex, 1);
                    sortedCountries.unshift(unitedKingdom);
                }
        
                setCountries(sortedCountries);
            } catch (error) {
                console.error('Error fetching countries:', error);
            }
        };
        
        fetchApplicants();
        getIdentityFee();
        fetchIdentityVerification();
        fetchCountries();
    }, []);


    const handleSelectChange = (e) => {
        setSelectedApplicant(e.target.value);
    };

    const handleImageUpload = (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                setImages([...images, {
                    src: reader.result,
                    file: file,
                    country: '',
                    documentType: '',
                    name: file.name,
                    size: file.size,
                    error: false,
                    isAddFieldDisabled: false,
                }]);
            };
            reader.readAsDataURL(file);
        }
    };

    const formatBytes = (bytes) => {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    };

    const documentTypes = [
        'ID Card', 'Passport', 'Driver\'s License', 'Residence Permit', 'Birth Certificate', 'Selfie', 'Video Selfie',
        'Profile Image', 'Utility Bill', 'Vehicle Registration Certificate', 'Bank Statement', 'Employment Certificate',
        'Insurance Document', 'Agreement', 'Contract', 'Income Source', 'Payment Method', 'Bank Card', 'Covid Vaccination Form', 'Other'
    ];

    const handleDeleteImage = (index) => {
        const updatedImages = images.filter((_, imgIndex) => imgIndex !== index);
        setImages(updatedImages);
    };

    const handleImageDetailChange = (index, field, value) => {
        const updatedImages = images.map((image, imgIndex) => (
            imgIndex === index ? { ...image, [field]: value, error: false } : image
        ));
        setImages(updatedImages);
    };

    const handleUpload = async () => {
        if (!isCheckboxChecked) {
            alert("You must acknowledge consent before uploading an image.");
            return;
        }
        for (const image of images) {
            if (!image.country || !image.documentType) {
                setImages(images.map((img, index) => (
                    img === image ? { ...img, error: true } : img
                )));
                return;
            }
        }
        setIsLoading(true); 
        // Create a new FormData instance
        const formDataToSubmit = new FormData();
        formDataToSubmit.append('applicant_id', selectedApplicant);
        formDataToSubmit.append('firstName', firstName);
        formDataToSubmit.append('lastName', lastName);
        formDataToSubmit.append('middleName', middleName);
        formDataToSubmit.append('issueddate', issueddate);
        formDataToSubmit.append('validUntil', validUntilDate);
        formDataToSubmit.append('docNumber', documentNumber);
        formDataToSubmit.append('dataofBirth', dataofBirth);
        formDataToSubmit.append('placeOfBirth', placeOfBirth);
        formDataToSubmit.append('fee', slug ? slug.fee : '');
    
        // Append data for each image inside the loop
        images.forEach((image, index) => {
            formDataToSubmit.append(`documents[${index}][file]`, image.file);
            formDataToSubmit.append(`documents[${index}][country]`, image.country);
            formDataToSubmit.append(`documents[${index}][documentType]`, image.documentType);
        });
    
        textFields.forEach((field, index) => {
            formDataToSubmit.append(`textFields[${index}]`, field);
        });
    
        try {
            const response = await axios.post(`${url}/user/identities/store`, formDataToSubmit, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            setSuccessMessage(response.data.success);
            setResponseData(response.data.apiResponse);
            setErrorMessage('');
            console.log('Upload successful:', response.data);
        } catch (error) {
            setErrorMessage(error.response.data.error);
            setSuccessMessage('');
            console.error('Upload failed:', error);
        }finally {
            setIsLoading(false); // End loading
        }
    };
    
    const handleAddTextField = (index) => {
        const updatedImages = images.map((image, imgIndex) => (
            imgIndex === index ? { ...image, isAddFieldDisabled: true } : image
        ));
        setImages(updatedImages);
        setTextFields([...textFields, '']);
    };

    const handleDeleteTextField = (index) => {
        const updatedTextFields = textFields.filter((_, fieldIndex) => fieldIndex !== index);
        setTextFields(updatedTextFields);
    };

    const handleLearn = (e, id)=>{
        e.preventDefault(); 
        window.location.href =`${url}/user/identities/details/${id}`;
    }

    return (
        <div>
            {/* <h2>Applicant Select</h2> 
             <div>
                <label htmlFor="applicantSelect">Select Applicant: {selectedApplicant}</label>
            </div> */}

            <div className="page-content">
                <div className="container-fluid">
                    <div className="row">
                        <div className="col-sm-12">
                            <div className="page-title-box">
                                <div className="row">
                                    <div className="col">
                                        <h4 className="page-title">IDENTITY Verification</h4>
                                    </div>
                                    <div className="col-auto align-self-center">
                                        <a href="#" className="btn btn-sm btn-outline-primary" id="Dash_Date">
                                            <span className="ay-name" id="Day_Name">Today:</span>&nbsp;
                                            <span className="" id="Select_date">Jan 11</span>
                                            <i data-feather="calendar" className="align-self-center icon-xs ms-1"></i>
                                        </a>
                                        <a href="#" className="btn btn-sm btn-outline-primary">
                                            <i data-feather="download" className="align-self-center icon-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="row">
                    <div className="col-lg-12">
                        <div className="card mb-3" style={{ background: '#1b4c89' }}>
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="card-body">
                                        <h4 className="text-white"><strong>Verify an Identity</strong></h4>
                                        <p className="card-text text-white mb-0">Seamless KYC and identity verification and get key insights and analysis for every verification.</p>
                                        <p className="card-text text-white mb-0"><small className="">Use the "Verify Identity" button to initiate the verification process.</small></p>
                                    </div>
                                </div>
                                <div className="col-md-6 align-self-center">
                                    <div className="card-body d-flex justify-content-lg-end justify-content-center">
                                        <a href="{{ route('showIdentityVerificationForm') }}" className="btn btn-primary btn-lg">
                                            <img src="{{ asset('assets/images/favicon.png') }}" width="30px" alt="icon" /> Verify Identity
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="row">
                    <div className="col-lg-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-lg-6">
                                        <div className="accordion" id="accordionApplicantcard">
                                            <div className="accordion-item">
                                                <h2 className="accordion-header">
                                                    <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApplicantcard" aria-expanded="true" aria-controls="collapseApplicantcard">
                                                        <h4 className="card-title">List of Applicant </h4>
                                                    </button>
                                                </h2>
                                                <div id="collapseApplicantcard" className="accordion-collapse collapse show" data-bs-parent="#accordionApplicantcard">
                                                    <div className="accordion-body">
                                                        <div className="card-body">
                                                            <div className="row">
                                                                <div className="col-md-6 card">
                                                                    <div className="mb-3">
                                                                        <label className="form-label" htmlFor="firstname">Select Applicant </label>
                                                                        <select className="form-select" id="applicantSelect" value={selectedApplicant} onChange={handleSelectChange}>
                                                                            <option value="" selected disabled>Select an applicant</option>
                                                                            {applicants.map(applicant => (
                                                                                <option key={applicant.id} value={applicant.applicantId}>
                                                                                    {applicant.companyname || `${applicant.firstName} ${applicant.lastName}`}
                                                                                    {applicant.applicant_type === 'company' ? ' (Company)' : ' (Individual)'}
                                                                                </option>
                                                                            ))}
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div className="col-md-6 card">
                                                                    <div className="d-grid mt-4">
                                                                        <label className="btn btn-primary px-4" id="add-documents">
                                                                            <span>
                                                                                <i className="fa fa-plus"></i> Add Documents
                                                                                <input type="file" accept="image/*" style={{ display: 'none' }} onChange={handleImageUpload} />
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {images.map((image, index) => (
                                                                <div className='card' key={index}>
                                                                    <div className="row mt-4">
                                                                        <div className="col-md-6">
                                                                            <img className='d-block mx-auto rounded' src={image.src} alt={`Document ${index}`} height="100"/>
                                                                        </div>

                                                                        <div className="col-md-6 py-2">
                                                                            <div className="mb-3">
                                                                                <label className="form-label" htmlFor={`countrySelect-${index}`}>Select Country <span style={{ color: 'red' }}>*</span></label>
                                                                                <select
                                                                                    className={`select2 form-control mb-3 custom-select ${image.error && !image.country ? 'is-invalid' : ''}`}
                                                                                    style={{ width: '100%', height: '36px',  objectFit: 'cover' }}
                                                                                    value={image.country}
                                                                                    onChange={(e) => handleImageDetailChange(index, 'country', e.target.value)}
                                                                                >
                                                                                    <option value="" disabled>Select a country</option>
                                                                                    {countries.map(country => (
                                                                                        <option key={country.cca3} value={country.cca3}>
                                                                                            {country.name.common}
                                                                                        </option>
                                                                                    ))}
                                                                                </select>
                                                                                {image.error && !image.country && <div className="invalid-feedback">Please select a country.</div>}
                                                                            </div>

                                                                            <div className="mb-3">
                                                                                <label className="form-label">Select a Document Type <span style={{ color: 'red' }}>*</span></label>
                                                                                <select
                                                                                    className={`select2 form-control mb-3 custom-select ${image.error && !image.documentType ? 'is-invalid' : ''}`}
                                                                                    // style={{ width: '100%', height: '36px' }}
                                                                                    value={image.documentType}
                                                                                    onChange={(e) => handleImageDetailChange(index, 'documentType', e.target.value)}
                                                                                >
                                                                                    <option value="" disabled>Select a document type</option>
                                                                                    {documentTypes.map((type, index) => (
                                                                                        <option key={index} value={type}>{type}</option>
                                                                                    ))}
                                                                                </select>
                                                                                {image.error && !image.documentType && <div className="invalid-feedback">Please select a document type.</div>}
                                                                            </div>

                                                                            <div className="d-grid gap-2">
                                                                                {/* <button type="button" className="btn btn-primary" onClick={handleAddTextField}>Add</button> */}
                                                                                <button 
                                                                                    type="button" 
                                                                                    className="btn btn-primary" 
                                                                                    onClick={() => handleAddTextField(index)}
                                                                                    disabled={images[index].isAddFieldDisabled}
                                                                                >
                                                                                    Add 
                                                                                </button>

                                                                                <button type="button" className="btn btn-danger" onClick={() => handleDeleteImage(index)}>Delete</button>
                                                                            </div>
                                                                        </div>
                                                                        <div className="col-md-12">
                                                                            <p>File Name: <b>{image.name}</b> <br />
                                                                                File Size: <b>{formatBytes(image.size)}</b></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ))}

                                                            {textFields.map((field, index) => (
                                                                <div className='card' key={index}>
                                                                    <div className="accordion-body">
                                                                        <div className="card-body">
                                                                            <div className="row">
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="firstName">First name</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        className="form-control"
                                                                                        id="firstName"
                                                                                        placeholder="First name"
                                                                                        required
                                                                                        value={firstName}
                                                                                        onChange={(e) => setFirstName(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="lastName">Last Name</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        className="form-control"
                                                                                        id="lastName"
                                                                                        required
                                                                                        placeholder="Last name"
                                                                                        value={lastName}
                                                                                        onChange={(e) => setLastName(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                               <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="middleName">Middle Name</label>
                                                                                    <input
                                                                                        type="text"
                                                                                        className="form-control"
                                                                                        id="middleName"
                                                                                        required
                                                                                        placeholder="Middle name" 
                                                                                        value={middleName}
                                                                                        onChange={(e) => setMiddleName(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="middleName">Issued Date</label>
                                                                                    <input
                                                                                        type="date"
                                                                                        className="form-control"
                                                                                        id="issueddate"
                                                                                        required
                                                                                        placeholder="Issued Date" 
                                                                                        value={issueddate}
                                                                                        onChange={(e) => setIssuedDate(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="firstname">Valid Until Date</label>
                                                                                     <input
                                                                                        type="date"
                                                                                        className="form-control"
                                                                                        id="issueddate"
                                                                                        required
                                                                                        placeholder="Valida Until Date" 
                                                                                        value={validUntilDate}
                                                                                        onChange={(e) => setValidUntilDate(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="firstname">Document Number</label>
                                                                                    <input
                                                                                        type="date"
                                                                                        className="form-control"
                                                                                        id="number"
                                                                                        required
                                                                                        placeholder="Document Number" 
                                                                                        value={documentNumber}
                                                                                        onChange={(e) => setDocumentNumber(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="firstname">Appicant date of Birth</label>
                                                                                    <input
                                                                                        type="date"
                                                                                        className="form-control"
                                                                                        id="dateofBirth"
                                                                                        required
                                                                                        placeholder="Appicant date of Birth" 
                                                                                        value={dataofBirth}
                                                                                        onChange={(e) => setDataOfBirth(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                <div className="col-md-12 mb-2">
                                                                                    <label className="form-label" htmlFor="firstname">Appicant Place of Birth</label>
                                                                                    <input
                                                                                        type="date"
                                                                                        className="form-control"
                                                                                        id="placeofBirth"
                                                                                        required
                                                                                        placeholder="Appicant Place of Birth" 
                                                                                        value={placeOfBirth}
                                                                                        onChange={(e) => setPlaceOfBirth(e.target.value)}
                                                                                    />
                                                                                </div>
                                                                                <br/>
                                                                                <button type="button" className="btn btn-danger" onClick={() => handleDeleteTextField(index)}>Delete</button>

                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            ))}

                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                           
                                            <div class="col-md-12 p-3">
                                           
                                                {slug && (
                                                    <><span style={{ color: 'red', fontSize: '13px' }}> Note: You will be charged {new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' }).format(slug.fee)}  for each {slug.name}</span><br /></>
                                                )}
                                                {wallet && (
                                                    <> <span style={{color:'darkblue', fontSize:'13px'}}>Your wallet Balance is {new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' }).format(wallet.avail_balance)} </span> <br/></>
                                                )}
                                               
                                                <input
                                                    type="checkbox"
                                                    // checked={isCheckboxChecked}
                                                    onChange={handleCheckboxChange}
                                                    required
                                                />

                                                <span style={{fontSize:'11px'}}> By checking this box you acknowledge that you have gotten consent from that data subject to use their data for verification purposes on our platform in accourdance to our <a href="#"> Privacy Policy</a></span>
                                            </div>
                                            {/* <span class="float-center p-2"><button type="submit" class="btn btn-primary w-23">Create Candidate</button> </span> */}
                                        </div>

                                        <div className="document-details" id="document-details"></div>
                                        <div id="accordionExample"></div>
                                        <div className="row mt-4">
                                            <div className="col-sm-12 d-grid">
                                                {/* <button style={{ backgroundColor: '#25B794', borderColor: '#25B794' }} onClick={handleUpload} className="btn btn-primary btn-lg submitbtn"> Create Identity Verification <i className="dripicons-arrow-thin-right mt-1"></i></button> */}
                                                <button
                                                    style={{ backgroundColor: '#25B794', borderColor: '#25B794' }}
                                                    onClick={handleUpload}
                                                    className="btn btn-primary btn-lg submitbtn"
                                                    disabled={isLoading}
                                                >
                                                    {isLoading ? 'Loading...' : 'Create Identity Verification '}
                                                    {!isLoading && <i className="dripicons-arrow-thin-right mt-1"></i>}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-lg-6">
                                        <div className="card">
                                            <div className="card-body">
                                                <div className="row">
                                                    <div className="card-header">
                                                        <h4 className="card-title">Success Notification</h4>
                                                    </div>
                                                    <div className="card-body">
                                                        <div className="row d-flex justify-content-center">
                                                            <div className="col">
                                                                <p className="mb-0 fw-semibold text-black"> Identity verifications</p>
                                                                <br/>
                                                                {successMessage && <div className="alert alert-success">{successMessage}</div>}
                                                                {responseData && <div className="alert alert-info">{responseData}</div>}
                                                                {isLoading && <p>Loading...</p>} {/* Loading indicator */}
                                                            </div>
                                                            <div className="col-auto align-self-center">
                                                                <div className="report-main-icon bg-light-alt">
                                                                    <i data-feather="users" className="align-self-center text-muted icon-sm"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div> 
                                                        {errorMessage ? (
                                                            <p style={{color:'red'}}> {errorMessage}</p>
                                                        ) : responseData ? (
                                                            <div>
                                                                {/* <h2>Identity Details {responseData}</h2> */}
                                                                <a  onClick={(e)=>handleLearn(e, responseData)}  className='btn btn-secondary'>
                                                                    View Applicant Details
                                                                </a>
                                                            </div>
                                                        ) : (
                                                            <p></p>
                                                        )}
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

                <div className="row">
                    <div className="col-lg-12">
                        <div className="card">
                            <div className='card-header'>
                                <h4 class="card-title">Identity Verification Log</h4>
                            </div>
                            <div className="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-hover dt-responsive nowrap " style={{borderCollapse: 'collapse', borderSpacing: '0', width: '100%'}}>
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
                                            {identityData.map((data, index) => (
                                                <tr key={index}>
                                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3"><td>{index + 1}</td></div></a></td>
                                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">{data.applicantId}</div></a></td>
                                                    <td class="px-0 py-0"><a class="table-link" href=""><div class="px-2 py-3">{data.firstName} {data.lastName}</div></a></td>
                                                    
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
                                                    
                                                        <a onClick={(e)=>handleLearn(e, data.imageID)}>View Details</a>
                                                    
                                                        </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    );
}

if (document.getElementById('identityVerification')) {
    ReactDOM.render(<IdentityVerification />, document.getElementById('identityVerification'));
}
