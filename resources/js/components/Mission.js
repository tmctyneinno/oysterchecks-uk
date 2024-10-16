import React from 'react';
import ReactDOM from 'react-dom';

export default function Mission() { 
    return (
        <div>
            <div class="main">
                {/* header section start */}
                <section className="hero-section ptb-100 gradient-overlay" style={{background: "url('/landing_assets/img/header-bg-5.jpg') no-repeat center center / cover"}}>
                <div className="hero-bottom-shape-two" style={{background: "url('/img/hero-bottom-shape.svg') no-repeat bottom center"}}></div>
                <div className="container">
                    <div className="row justify-content-center">
                    <div className="col-md-8 col-lg-7">
                        <div className="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 className="text-white mb-0">Mission</h1>
                        <div className="custom-breadcrumb">
                            <ol className="breadcrumb d-inline-block bg-transparent list-inline py-0">
                            <li className="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                            <li className="list-inline-item breadcrumb-item"><a href="#">About us</a></li>
                            <li className="list-inline-item breadcrumb-item active">Mission</li>
                            </ol>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </section>
                {/* header section start */}

            </div>

            <section class="about-us-section ptb-100">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-4">
                            <div class="video-promo-content mb-md-4 mb-lg-0">
                                <h2><img src="/landing_assets/img/mission.jpg" width="300px"/></h2>
                            
                                
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="video-promo-content mb-md-4 mb-lg-0">
                                <h2>Mission</h2>
                                <p>To Achieve Market Dominance In Providing Exceptional And Extensive Background, KYC And AML Screening Services Across The World..</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    );
}

if (document.getElementById('mission')) {
    ReactDOM.render(<Mission />, document.getElementById('mission')); 
}
 