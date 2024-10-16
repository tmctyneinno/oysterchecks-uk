import React from 'react';
import ReactDOM from 'react-dom';

export default function FAQ() { 
    return (
        <div>
            <div class="main">

            {/* header section start */}
            <section class="hero-section ptb-100 gradient-overlay"
            style={{background: "url('/landing_assets/img/header-bg-5.jpg') no-repeat center center / cover"}}>
                <div class="hero-bottom-shape-two" style={{background: "url('/img/hero-bottom-shape.svg') no-repeat center center / cover"}}></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-7">
                            <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                                <h1 class="text-white mb-0">FAQ</h1>
                                <div class="custom-breadcrumb">
                                    <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                        <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="list-inline-item breadcrumb-item"><a href="#">FAQ</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* header section end */}

            <section className="gray-light-bg ptb-100">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-9 col-lg-8">
                        <div className="section-heading mb-3 text-center">
                            <h2>Frequently Asked Questions</h2>
                            <p className="lead">
                                Quickly morph client-centric results through performance based applications. Proactively facilitate professional human capital for cutting-edge.
                            </p>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-6">
                        <div className="single-faq mt-4">
                            <h5>The Company</h5>
                            <div className="accordion" id="accordion-1">
                                <div className="card">
                                    <div className="card-header py-4" id="heading-1-1">
                                        <h6 className="mb-0">
                                            <button className="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                                <span className="ti-receipt mr-3"></span> Who is Oysterchecks?
                                            </button>
                                        </h6>
                                    </div>
                                    <div id="collapse-1-1" className="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-1">
                                        <div className="card-body">
                                            <p>Oysterchecks trade as The Morgans Consortium Consulting Limited (TMC) a private registered company with a registration number 09045481 We specialize in providing comprehensive automated Background Screening, KYC , Transaction Monitoring & AML solutions across the globe. </p>
                                        </div>
                                    </div>
                                </div>
                                <div className="card">
                                    <div className="card-header py-4" id="heading-1-2">
                                        <h6 className="mb-0">
                                            <button className="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                                <span className="ti-gallery mr-3"></span> Where is Oysterchecks Located?
                                            </button>
                                        </h6>
                                    </div>
                                    <div id="collapse-1-2" className="collapse" aria-labelledby="heading-1-2" data-parent="#accordion-1">
                                        <div className="card-body">
                                            <p>UK Address: International House 24 Holborn Viaduct London EC1A 2BN United Kingdom, Nigeria Address: 2nd Floor, 1 Adeola Adeoye Street, Off Toyin Street, Ikeja, Lagos Nigeria</p>
                                        </div>
                                    </div>
                                </div>
                                <div className="card">
                                    <div className="card-header py-4" id="heading-1-3">
                                        <h6 className="mb-0">
                                            <button className="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3">
                                                <span className="ti-wallet mr-3"></span> What Industries Do Oysterchecks serve?
                                            </button>
                                        </h6>
                                    </div>
                                    <div id="collapse-1-3" className="collapse" aria-labelledby="heading-1-3" data-parent="#accordion-1">
                                        <div className="card-body">
                                            <p>Oysterchecks takes pride in providing background screening, KYC and AML checks services to a variety of clients in different industries. We have a great team of IT experts who ensure that our services meet the needs of our diverse clients. Our services are fully tested and automated for businesses in the following sectors:
                                                <ul>
                                                    <li>HR and Recruitment</li>
                                                    <li>Public sector</li>
                                                    <li>Finance</li>
                                                    <li>Construction</li>
                                                    <li>Hospitality</li>
                                                    <li>Retail</li>
                                                    <li>Fintech</li>
                                                    <li>Asset and wealth management.</li>
                                                    <li>Bank.</li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="single-faq mt-4">
                            <h5>Our Products</h5>
                            <div className="accordion" id="accordion-2">
                                {/* Add the remaining accordion items similar to the first column */}
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="single-faq mt-4">
                            <h5>Verification Solutions</h5>
                            <div className="accordion" id="accordion-3">
                                {/* Add the remaining accordion items similar to the second column */}
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="single-faq mt-4">
                            <h5>Customer Verification Process</h5>
                            <div className="accordion" id="accordion-4">
                                {/* Add the remaining accordion items similar to the third column */}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


            

            </div>
        </div>
    );
}

if (document.getElementById('Faq')) {
    ReactDOM.render(<FAQ />, document.getElementById('Faq')); 
}
 