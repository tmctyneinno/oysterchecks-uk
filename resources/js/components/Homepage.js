import React from 'react';
import ReactDOM from 'react-dom';

export default function Homepage() { 
    return (  
        <div>
            <div class="main">
                {/* hero section start */}
                <section className="hero-equal-height pt-165 pb-100" style={{ background: "url('/landing_assets/img/bg-shape.svg') no-repeat bottom center / cover", marginBottom: "-200px" }}>
                    <div className="container">
                        <div className="row align-items-center">
                            <div className="col-md-12 col-lg-6">
                                <div className="hero-slider-content text-white">
                                    <span className="text-uppercase">Digital Verifications</span>
                                    <h1 className="text-white">Background Checking Services</h1>
                                    <p className="lead">Comprehensive and Exceptional background<br/> checks, KYC & AML compliance Solutions </p>
                                    <div className="action-btns mt-3">
                                        <a href="/login" className="btn secondary-solid-btn">Get Started Now</a>
                                    </div>
                                </div>
                            </div> 
                            <div className="col-md-12 col-lg-6">
                                <div className="img-wrap counter-number d-inline-flex align-items-center mb-4" >
                                    <img src="/landing_assets/fontpage.png" alt="hero single" className="custom-width img-fluid"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* hero section end */}

                {/* promo section start */}
                <section className="promo-block ptb-100">
                    <div className="container">
                        <div className="row no-gutters">
                            <div className="col-md-6 col-lg-6 box-1">
                                <div className="single-promo-block animated-hover p-5 text-center">
                                    <div className="promo-block-icon mb-3">
                                        <span className="fab fa-superpowers icon-md color-primary"></span>
                                    </div>
                                    <div className="promo-block-content">
                                        <h5>Had Enough Of Inconsistent KYC Check Results?</h5>
                                        <p>This has been a huge challenge to businesses and it always yields substandard results. This has subsequently led to acquisition of misleading information which has put organizations and businesses at a huge risk. As a result of this, Oysterchecks addresses these shortcomings by performing KYC checks on people, ID documents and companies in a more effective way. Our checks are automated which help you in optimizing your business processes and reduce risks while ensuring total compliance.</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-6 col-lg-6 box-2">
                                <div className="single-promo-block animated-hover p-5 text-center">
                                    <div className="promo-block-icon mb-3">
                                        <span className="far fa-clock icon-md color-primary"></span>
                                    </div>
                                    <div className="promo-block-content">
                                        <h5>Looking For Quality AML Solutions?</h5>
                                        <p>
                                            You are at the right place because Oysterchecks provides you with a wide range of AML solutions. 
                                            Our platform runs on the newest technology and infrastructure which places us in a position where we can monitor and interpret the rapid changes around AML areas. We provide work programs, 
                                            relevant training and insights to our team of professionals so that they can 
                                            help our clients stay ahead of the rapidly evolving issues.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* promo section end */}

                {/* about us section start */}
                <section className="about-us-section gray-light-bg p-3">
                    <div className="container">
                        <div className="row justify-content-around">
                            <div className="col-md-12 col-lg-6">
                                <div className="about-img-wrap">
                                    <img src="/landing_assets/fontpage2.png" width="400px" alt="video" className="img-fluid rounded shadow-sm color-bip shadow"/>
                                </div>
                            </div>
                            <div className="col-md-12 col-lg-5">
                                <div className="about-content-right mb-md-4 mb-lg-0">
                                    <h2>Do you really Know-Your-Customer?</h2>
                                    <p>Effectively verifying millions of profiles can be daunting. That’s where our 5000+ data points and 2000+ field agents come in, to help with background checks that meet set standards</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* about us section end */}

                {/* feature section start */}
                <section className="about-us-section gray-light-bg ptb-100" style={{ background: "#fff no-repeat center center / cover" }}>
                    <div className="container">
                        <div className="row justify-content-around">
                            <div className="col-md-12 col-lg-6">
                                <div className="about-img-wrap">
                                    <img src="/landing_assets/fontpage2.png" alt="video" className="img-fluid rounded shadow-sm"/>
                                </div>
                            </div>
                            <div className="col-md-12 col-lg-5">
                                <div className="about-content-right mb-md-4 mb-lg-0">
                                    <h2>Sector-Specific Solutions</h2>
                                    <p>Our single, unified platform, underpinned by powerful next-generation technology, connects suites of finance and HR applications integrated with industry specific solutions, uniquely delivered, transforming the way people work</p>
                                    <div className="feature-tabs-wrap"> 
                                        <div className="tab-content feature-tab-content">
                                            <div className="tab-pane active" id="feature-tab-1">
                                                <ul className="list-unstyled tech-feature-list">
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Health And Social Care</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Charities</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Education</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Hospitality</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Manufacturing</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Recruitment Agencies</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Professional Services</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Warehousing And Logistics</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Bank Service</li>
                                                    <li className="py-1"><span className="ti-control-forward mr-2 color-secondary"></span>Insurance Firms</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* feature section end */}

                {/* counter section start */}
                <section className="call-to-action" style={{ background: "url('/landing_assets/img/cta-bg.svg') no-repeat center center / cover" }}>
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-md-12 col-lg-12">
                                <div className="call-to-action-content text-white text-center mb-4">
                                    <h2 className="text-white mb-1">For a reason and more</h2>
                                </div>
                            </div>
                        </div>
                        <div className="row justify-content-center">
                            <div className="col-md-6 col-lg-3">
                                <div className="single-counter rounded p-4 text-center text-white">
                                    <span className="ti-medall-alt icon-md"></span>
                                    <h4 className="text-white">Zero bottlenecks</h4>
                                </div>
                            </div>
                            <div className="col-md-6 col-lg-3">
                                <div className="single-counter rounded p-4 text-center text-white">
                                    <span className="ti-headphone-alt icon-md"></span>
                                    <h4 className="text-white">Reliable Database</h4>
                                </div>
                            </div>
                            <div className="col-md-6 col-lg-3">
                                <div className="single-counter rounded p-4 text-center text-white">
                                    <span className="ti-cup icon-md"></span>
                                    <h4 className="text-white">Wide Verification Capacity</h4>
                                </div>
                            </div>
                            <div className="col-md-6 col-lg-3">
                                <div className="single-counter rounded p-4 text-center text-white">
                                    <span className="ti-user icon-md"></span>
                                    <h4 className="text-white">Ease of Enrollment</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* counter section start/ */}

                {/* our work process section start- */}
                <section class="work-process-new ptb-100 gray-light-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <div class="section-heading mb-5">
                                    <h2>More with Oysterchecks</h2>
                                    <p class="lead">Distinctively grow your business with us</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="work-process-wrap">
                                    <div class="single-work-process">
                                        <div class="work-process-icon-wrap primary-bg rounded">
                                            <i class="ti-vector icon-md text-white"></i>
                                        </div>
                                        <div class="work-process-content mt-4">
                                            <h5>Verify CAC registration</h5>
                                            <p>Conduct business (CAC) search report on Nigerian companies </p>
                                        </div>
                                    </div>
                                    <div class="single-work-process">
                                        <div class="work-process-icon-wrap primary-bg rounded">
                                            <i class="ti-layout-list-thumb icon-md text-white"></i>
                                        </div>
                                        <div class="work-process-content mt-4">
                                            <h5>Verify address claims</h5>
                                            <p>Verify that the candidate or company is available at the address they claim with address verification </p>
                                        </div>
                                    </div>
                                    <div class="single-work-process">
                                        <div class="work-process-icon-wrap primary-bg rounded">
                                            <i class="ti-palette icon-md text-white"></i>
                                        </div>
                                        <div class="work-process-content mt-4">
                                            <h5>Verify Tax Identification Numbers</h5>
                                            <p>Verify Nigerian companies with their Tax Identification Number (TIN)</p>
                                        </div>
                                    </div>
                                    <div class="single-work-process">
                                        <div class="work-process-icon-wrap primary-bg rounded">
                                            <i class="ti-cup icon-md text-white"></i>
                                        </div>
                                        <span class="work-process-divider"></span>
                                        <div class="work-process-content mt-4">
                                            <h5>Validate business owner identities</h5>
                                            <p>Validate the identities of the business owners </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* our work process section start- */}

                {/* blog section end- */}
                <section className="about-us-section ptb-100 border-bottom">
                    <div className="container">
                        <div className="row justify-content-between align-items-center">
                            <div className="col-md-12 col-lg-8">
                                <div className="video-promo-content mb-md-4 mb-lg-0">
                                    <h3>What Oysterchecks Background Screening Offers You</h3>
                                    <ul className="list-unstyled tech-feature-list">
                                        <li className="py-1"><span className="ti-check-box mr-2 color-secondary"></span>High level of customer service – we are not a call centre</li>
                                        <li className="py-1"><span className="ti-check-box mr-2 color-secondary"></span>Manage entire process from candidate set up to the final report</li>
                                        <li className="py-1"><span className="ti-check-box mr-2 color-secondary"></span>Communication of adverse results/unforeseen delays</li>
                                        <li className="py-1"><span className="ti-check-box mr-2 color-secondary"></span>High level of security around the information we process</li>
                                        <li className="py-1"><span className="ti-check-box mr-2 color-secondary"></span>Staff that have respect for the information they handle</li>
                                        <li className="py-1"><span className="ti-check-box mr-2 color-secondary"></span>Prompt turnaround time from 1 hour</li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-12 col-lg-4">
                                <div className="card border-0 shadow-sm text-white">
                                    <img src="/landing_assets/fontpage2.png" alt="video" className="img-fluid rounded shadow-sm"/>       
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* blog section end- */}

            </div>
        </div>
    );
}

if (document.getElementById('home')) {
    ReactDOM.render(<Homepage />, document.getElementById('home')); 
}
 