import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

export default function IdentityVerification() { 
    let url = window.location.origin;
    const [applicants, setApplicants] = useState([]);
    const [selectedApplicant, setSelectedApplicant] = useState('');
    const [images, setImages] = useState([]);

    useEffect(() => {
        const fetchApplicants = async () => {
            let urlGetApplicant = `${url}/user/getapplicant`;
            try {
                const response = await axios.get(urlGetApplicant);
                setApplicants(response.data.apiResponse);
                console.log('success'.response.data.apiResponse);
            } catch (error) {
                setError(error.response.data.error);
                console.log('errorData');
            }
        };
        fetchApplicants();
    }, []);

    const handleSelectChange = (e) => {
        setSelectedApplicant(e.target.value);
    };

    const handleImageUpload = (e) => {
        alert('ok');
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            setImages([...images, { src: event.target.result, name: file.name }]);
        };

        reader.readAsDataURL(file);
    };

    return (
        <div>
           
            <h2>Applicant Select</h2>
            <div>
                    <label htmlFor="applicantSelect">Select Applicant:</label>
                    
                </div>
            {selectedApplicant && <p>Selected Applicant: {selectedApplicant}</p>}
            <div className="page-content">
                <div className="container-fluid">
                    <div className="row">
                        <div className="col-sm-12">
                            <div className="page-title-box">
                                <div className="row">
                                    <div className="col">
                                        <h4 className="page-title">IDENTITY Verification</h4>
                                        <ol className="breadcrumb">
                                            <li className="breadcrumb-item"></li>
                                        </ol>
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
                                        <form method="post" action="{{ route('applicant.store') }}" className="add-candidate-form">
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
                                                                <div className="row ">
                                                                    <div className="col-md-6 card">
                                                                        <div className="mb-3">
                                                                            <label className="form-label" htmlFor="firstname">Select Applicant </label>
                                                                            <select  className="form-select" id="applicantSelect" value={selectedApplicant} onChange={handleSelectChange}>
                                                                                <option value="">Select an applicant</option>
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

                                                                <div className="row mt-4">
                                                                    {images.map((image, index) => (
                                                                        <div key={index} className="mt-2">
                                                                            <img src={image.src} alt={image.name} style={{ maxWidth: '100px' }} />
                                                                            <p>{image.name}</p>
                                                                        </div>
                                                                    ))}
                                                                    <div className="document-container" id="document-container"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div className="document-details" id="document-details"></div>
                                            <div id="accordionExample"></div>
                                            <div className="row mt-4">
                                                <div className="col-sm-12 d-grid">
                                                    <button style={{ backgroundColor: '#25B794', borderColor: '#25B794' }} type="submit" className="btn btn-primary btn-lg submitbtn">Request verification <i className="dripicons-arrow-thin-right mt-1"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div className="col-lg-6">
                                        <div className="card">
                                            <div className="card-body">
                                                <div className="row">
                                                    <div className="card-header">
                                                        <h4 className="card-title">Payload Request</h4>
                                                    </div>
                                                    <div className="card-body">
                                                        <div className="row d-flex justify-content-center">
                                                            <div className="col">
                                                                <p className="mb-0 fw-semibold text-black">Successful Indentity verifications</p>
                                                                <h3 className="m-0 text-success"> Success </h3>
                                                                <p><snap className="text-muted">Created At:</snap> April 15, 2024, at 2:30:45 PM</p>
                                                            </div>
                                                            <div className="col-auto align-self-center">
                                                                <div className="report-main-icon bg-light-alt">
                                                                    <i data-feather="users" className="align-self-center text-muted icon-sm"></i>
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
                </div>

            </div>
        </div>
    );
}

if (document.getElementById('identityVerification')) {
    ReactDOM.render(<IdentityVerification />, document.getElementById('identityVerification')); 
}
 