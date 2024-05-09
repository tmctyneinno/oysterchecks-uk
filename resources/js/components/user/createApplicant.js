import React, { useState, useEffect }  from 'react';
import ReactDOM from 'react-dom';
import IndividualForm from './individualForm';

export default function CreateApplicant() { 
    const [responseData, setResponseData] = useState(null);
    const updateResponseData = (data) => {
        setResponseData(data);
    };
    return (
        <div>
           
            <div className="page-content">
                <div className="container-fluid">
                    <div className="row">
                        <div className="col-sm-12">
                            <div className="page-title-box">
                                <div className="row">
                                    <div className="col">
                                        <h4 className="page-title">Applicant Onboarding</h4>
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
                        <div className="card">
                            <div className="card-header">
                                <h4 className="card-title">Create new  Applicant</h4>
                            </div>
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-lg-6">
                                        <div className="accordion" id="accordionApplicantcard">
                                            <div className="accordion-item">
                                                <h2 className="accordion-header">
                                                    <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseApplicantcard" aria-expanded="true" aria-controls="collapseApplicantcard">
                                                    <h4 className="card-title">Applicant Card</h4>
                                                    </button>
                                                </h2>
                                                <div id="collapseApplicantcard" className="accordion-collapse collapse show" data-bs-parent="#accordionApplicantcard">
                                                    <div className="accordion-body">
                                                    <div id="error-message" className="alert alert-danger border-0" role="alert" style={{ display: 'none' }}></div>
                                                    <div id="success-message" className="alert alert-success border-0" role="alert" style={{ display: 'none' }}></div>

                                                    <ul className="nav nav-tabs p-4" role="tablist">
                                                        <li className="nav-item" role="presentation">
                                                        <a className="nav-link active" data-bs-toggle="tab" href="#individuals" role="tab" aria-selected="true">Individual</a>
                                                        </li>
                                                        <li className="nav-item" role="presentation">
                                                        <a className="nav-link" data-bs-toggle="tab" href="#company" role="tab" aria-selected="false" tabIndex="-1">Company</a>
                                                        </li>
                                                    </ul>

                                                    <div className="tab-content">
                                                        <div className="tab-pane p-3 active show" id="individuals" role="tabpanel">
                                                            <IndividualForm   />
                                                        </div>
                                                        <div className="tab-pane p-3" id="company" role="tabpanel">
                                                        {/* Company form */}
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card-header">
                                                <h4 class="card-title">Applicant Success</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col">
                                                        <h4 id="applicantNameTab" class="mb-0 fw-semibold text-black"> Succeess Datails</h4>
                                                        <br/>
                                                        {responseData && (
                                                            <div>
                                                                {/* Display the retrieved data */}
                                                                <pre>{JSON.stringify(responseData, null, 2)}</pre>
                                                            </div>
                                                        )}
                                    
                                                    </div>
                                                    
                                                </div>
                                                <div id="apiResponseContainer"></div>
                                                {/* <a href="{{ route('applicant.showverify') }}" class="btn-secondary btn">View verification page</a>  */}

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

if (document.getElementById('createapplicant')) {
    ReactDOM.render(<CreateApplicant />, document.getElementById('createapplicant')); 
}
 