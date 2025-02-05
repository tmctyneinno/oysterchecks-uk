import React from 'react';
import ReactDOM from 'react-dom';

export default function Resource() { 
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
                                <h1 class="text-white mb-0">Resource</h1>
                                <div class="custom-breadcrumb">
                                    <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                        <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="list-inline-item breadcrumb-item"><a href="#">Resource</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* header section end */}

            <section className="about-us-section ptb-100">
                <div className="container">
                    <div className="row justify-content-between align-items-center">
                        <div className="col-md-6 col-lg-6">
                            <div className="video-promo-content mb-md-4 mb-lg-0">
                                <img src="/landing_assets/img/screening.jpg" width="100px" alt="screening"/>
                                <h4>Screening Regulations</h4>
                                <p>Compliance knowledge and expertise is very important for organizations which provide employee screening services. At Oysterchecks we are always at the fore front ensuring that our screening services are in compliance with the dynamic regulatory requirements. We are committed and dedicated to ensure that we are in compliance with the latest regulatory programs in the industry.</p>
                            </div>
                        </div>
                        <div className="col-md-6 col-lg-6">
                            <div className="video-promo-content mb-md-4 mb-lg-0">
                                <img src="/landing_assets/img/data.jpg" width="100px" alt="data"/>
                                <h4>Data Protection Compliance</h4>
                                <p>Oysterchecks is registered with the Information Commissioner’s Office and strictly operates in compliance with rules stipulated under the Data Act 1998. This act regulates how a company gathers, handles, stores, retains and disposes personal information.</p>
                            </div>
                        </div>
                        <div className="col-md-6 col-lg-6 pt-2">
                            <div className="video-promo-content mb-md-4 mb-lg-0">
                                <img src="/landing_assets/img/com.jpg" width="100px" alt="compliance"/>
                                <h4>Data Protection Compliance</h4>
                                <p>Oysterchecks is registered with the Information Commissioner’s Office and strictly operates in compliance with rules stipulated under the Data Act 1998. This act regulates how a company gathers, handles, stores, retains and disposes personal information.</p>
                                <ul className="list-unstyled tech-feature-list">
                                    <li className="py-1"><span className="ti-check-box mr-2 color-secondary">Anonymity of collected data to protect privacy</span></li>
                                    <li className="py-1"><span className="ti-check-box mr-2 color-secondary">Asking for consent from the data owners before processing it</span></li>
                                    <li className="py-1"><span className="ti-check-box mr-2 color-secondary">Providing notifications when there are data breaches</span></li>
                                    <li className="py-1"><span className="ti-check-box mr-2 color-secondary">Easy and safe way of handling data across the borders</span></li>
                                    <li className="py-1"><span className="ti-check-box mr-2 color-secondary">Allocation of GDPR compliance officer to oversee a company’s data handling activities</span></li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-md-6 col-lg-6 pt-2">
                            <div className="video-promo-content mb-md-4 mb-lg-0">
                                <img src="/landing_assets/img/criminal.jpg" width="100px" alt="criminal"/>
                                <h4>Criminal Checks Records Compliance</h4>
                                <p>Oysterchecks ensures that any data collected about an individual or company is treated with at most confidentiality as required in Police Act 1997 and Data Act 1998. We have access to global databases and we will help you in conducting global employment screening with a lot of ease.</p>
                            </div>
                        </div>
                        <div className="col-md-6 col-lg-6 pt-2">
                            <div className="video-promo-content mb-md-4 mb-lg-0">
                                <img src="/landing_assets/img/com.jpg" width="100px" alt="compliance"/>
                                <h2>Compliance Standards</h2>
                                <p>We offer a wide range of screening packages which you can chose from to meet your requirements. In addition, we provide custom packages tailor-made to suit your specific needs and requirements. Our payment gateways for purchasing these packages are secure and are in compliance with HMG Baseline Personnel Security Standard, the Payment Card Industry Data Security Standard and the British Standard 7858:2012.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

             

            </div>
        </div>
    );
}

if (document.getElementById('resource')) {
    ReactDOM.render(<Resource />, document.getElementById('resource')); 
}
 