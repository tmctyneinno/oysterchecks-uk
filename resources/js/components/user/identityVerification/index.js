import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

export default function IdentityVerification() {
    let url = window.location.origin;
    const [applicants, setApplicants] = useState([]);
    const [selectedApplicant, setSelectedApplicant] = useState('');
    const [images, setImages] = useState([]);
    const [countries, setCountries] = useState([]);
    const [responseData, setResponseData] = useState(null);
    const [successMessage, setSuccessMessage] = useState('');
    const [errorMessage, setErrorMessage] = useState('');
    const [textFields, setTextFields] = useState([]);
    const [firstName, setFirstName] = useState('');
    const [lastName, setLastName] = useState('');
    const [middleName, setMiddleName] = useState('');
    const [issueddate, setIssuedDate] = useState('');
    const [validUntil, setValidUntil] = useState('');
    const [documentNumber, setDocumentNumber] = useState('');
    const [dataofBirth, setDateofBirth] = useState('');
    const [placeofBirth, setPlaaceofBirth] = useState('');
   

    useEffect(() => {
        const fetchApplicants = async () => {
            let urlGetApplicant = `${url}/user/getapplicant`;
            try {
                const response = await axios.get(urlGetApplicant);
                setApplicants(response.data.apiResponse);
            } catch (error) {
                console.error('Error fetching applicants:', error);
            }
        };
        fetchApplicants();
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
                    error: false
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

    useEffect(() => {
        const fetchCountries = async () => {
            try {
                const response = await axios.get('https://restcountries.com/v3.1/all');
                setCountries(response.data);
            } catch (error) {
                console.error('Error fetching countries:', error);
            }
        };

        fetchCountries();
    }, []);

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
        for (const image of images) {
            if (!image.country || !image.documentType) {
                setImages(images.map((img, index) => (
                    img === image ? { ...img, error: true } : img
                )));
                return;
            }
        }

        const formData = new FormData();
        formData.append('applicant_id', selectedApplicant);
        formData.append('firstName', firstName);
        formData.append('lastName', lastName);
        formData.append('middleName', middleName);
        formData.append('issueddate', issueddate);
        formData.append('validUntil', validUntil);
        formData.append('documentNumber', documentNumber);
        formData.append('dataofBirth', dataofBirth);
        formData.append('placeofBirth', placeofBirth);
        
        images.forEach((image, index) => {
            formData.append(`documents[${index}][file]`, image.file);
            formData.append(`documents[${index}][country]`, image.country);
            formData.append(`documents[${index}][documentType]`, image.documentType);
        });

        textFields.forEach((field, index) => {
            formData.append(`textFields[${index}]`, field);
        });

        try {
            let urlIdentify = `${url}/user/identities/store`;
            await axios.post(urlIdentify, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                setSuccessMessage(response.data.success);
                setResponseData(response.data.apiResponse);
                setErrorMessage('');
                console.log('Upload successful:', response.data);
            })
            .catch(error => {
                setErrorMessage(error.response.data.error);
                setSuccessMessage('');
                console.error('Upload failed:', error);
            });
        } catch (error) {
            console.error('Error uploading documents:', error);
        }
    };

   
    const handleAddTextField = (index) => {
        const updatedImages = images.map((image, imgIndex) => (
            imgIndex === index ? {  textFields: [...textFields, ''], isAddFieldDisabled: true } : image
        ));
        setTextFields(updatedImages);
    };

    const handleTextFieldChange = (index, value) => {
        const updatedTextFields = textFields.map((field, fieldIndex) => (
            fieldIndex === index ? value : field
        ));
        setTextFields(updatedTextFields);
    };

    const handleDeleteTextField = (index) => {
        const updatedTextFields = textFields.filter((_, fieldIndex) => fieldIndex !== index);
        setTextFields(updatedTextFields);
    };

    return (
        <div>
            <h2>Applicant Select</h2>
            <div>
                <label htmlFor="applicantSelect">Select Applicant: {selectedApplicant}</label>
            </div>

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
                                                                                    style={{ width: '100%', height: '36px' }}
                                                                                    value={image.country}
                                                                                    onChange={(e) => handleImageDetailChange(index, 'country', e.target.value)}
                                                                                >
                                                                                    <option value="" disabled>Select a country</option>
                                                                                    {countries.map(country => (
                                                                                        <option key={country.name.common} value={country.name.common}>
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
                                                                                    <label className="form-label" htmlFor="firstname">First name</label>
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
                                                                                        value={validdate}
                                                                                        onChange={(e) => setValidUntil(e.target.value)}
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
                                                                                        onChange={(e) => setDateofBirth(e.target.value)}
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
                                                                                        value={dataofBirth}
                                                                                        onChange={(e) => setPlaaceofBirth(e.target.value)}
                                                                                    />
                                                                                </div>
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

                                        <div className="document-details" id="document-details"></div>
                                        <div id="accordionExample"></div>
                                        <div className="row mt-4">
                                            <div className="col-sm-12 d-grid">
                                                <button style={{ backgroundColor: '#25B794', borderColor: '#25B794' }} onClick={handleUpload} className="btn btn-primary btn-lg submitbtn"> Request verification <i className="dripicons-arrow-thin-right mt-1"></i></button>
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
                                                            <p>Error: {errorMessage}</p>
                                                        ) : responseData ? (
                                                            <div>
                                                                <h2>Identity Details {responseData}</h2>
                                                                <a href="" className='btn btn-secondary'>
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
            </div>
        </div>
    );
}

if (document.getElementById('identityVerification')) {
    ReactDOM.render(<IdentityVerification />, document.getElementById('identityVerification'));
}
