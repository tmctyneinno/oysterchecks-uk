import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default function Login() { 
    let url = window.location.origin;
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [errors, setErrors] = useState({});
    const [errorMessage, setErrorMessage] = useState('');
    const [successMessage, setSuccessMessage] = useState('');

    const validateForm = () => {
        const errors = {};

        if (!email.trim()) {
            errors.email = 'Email is required';
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            errors.email = 'Email is invalid';
        }

        if (!password.trim()) {
            errors.password = 'Password is required';
        }

        setErrors(errors);
        return Object.keys(errors).length === 0;
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if(!validateForm()){
            return;
        }
        
        let urlLogin = `${url}/login/post`;
        const formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        try{
            const response = await axios.post(urlLogin, formData);
            setSuccessMessage(response.data.success);
            setErrorMessage('');
            setTimeout(()=>{
                window.location.href = `${url}/dashboard`;
            },1500)
        }catch (error){
            if (error.response && error.response.status === 401) {
                setErrorMessage(error.response.data.error);
                setSuccessMessage('');
            } else {
                setErrorMessage('An unexpected error occurred');
                setSuccessMessage('');
            }
        }
            
    }

    return (
        <div className="nk-app-root">
            <div className="nk-main">
                <div className="nk-wrap nk-wrap-nosidebar">
                    <div className="nk-content">
                        <div className="nk-split nk-split-page nk-split-md">
                            {/* Left content */}
                            <div className="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                                {/* Absolute top right */}
                                <div className="absolute-top-right d-lg-none p-3 p-sm-5">
                                    <a href="#" className="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em className="icon ni ni-info"></em></a>
                                </div>
                                {/* Brand logo */}
                                <div className="nk-block nk-block-middle nk-auth-body">
                                    <div className="brand-logo pb-5">
                                        <a href="{{route('landing)}}" className="logo-link">
                                            <img className="logo-light logo-img logo-img-lg" width="150px" src="/assets/images/logo.png" srcset="/assets/images/logo.png 2x" alt="logo" />
                                            <img className="logo-dark logo-img logo-img-lg" width="150px" src="/assets/images/logo.png" srcset="/assets/images/logo.png 2x" alt="logo-dark" />
                                        </a>
                                    </div>
                                    {/* Block head */}
                                    <div className="nk-block-head">
                                        <div className="nk-block-head-content">
                                            <h5 className="nk-block-title">Sign-In</h5>
                                            <div className="nk-block-des">
                                                <p>Access Oysterchecks using your email and password.</p>
                                            </div>
                                        </div>
                                    </div>
                                    {errorMessage && <div className="alert alert-danger">{errorMessage}</div>}
                                    {successMessage && <div className="alert alert-success">{successMessage}</div>}
                                    
                                                   
                                    {/* Form */}
                                    <form onSubmit={handleSubmit} id="signin_form">
                                       
                                        <div className="form-group">
                                            <div className="form-label-group">
                                                <label className="form-label" for="default-01">Email</label>
                                            </div>
                                            <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} className="form-control form-control-lg" id="email" placeholder="Enter your email address"/>
                                            {/* {errors.email && <span className="invalid-feedback" role="alert"> <strong>{errors.email}</strong></span>} */}
                                            {errors.email && <div className="text-danger">{errors.email}</div>}
                                          
                                        </div>
                                        <div className="form-group">
                                            <div className="form-label-group">
                                                <label className="form-label" for="password">Password</label>
                                            </div>
                                            <div className="form-control-wrap">
                                                <a tabIndex="-1" href="#" className="form-icon form-icon-right passcode-switch" data-target="password">
                                                    <em className="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em className="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                               
                                                <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} className="form-control form-control-lg " id="password" placeholder="Enter your password" />
                                                {errors.password && <div className="text-danger">{errors.password}</div>}
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <button type="submit" className="btn btn-lg btn-primary btn-block"  >SIGN IN <i className="icon ni ni-arrow-right-circle ml-3"></i></button>
                                        </div>
                                    </form>
                                    {/* Form note */}
                                    <div className="form-note-s2 pt-4"> Don't have an account yet? <a href="{{route('register')}}">Sign up</a> </div>
                                </div>
                                {/* Auth footer */}
                                <div className="nk-block nk-auth-footer">
                                    <div className="mt-3">
                                        <p>&copy; Oysterchecks {new Date().getFullYear()} All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                            {/* Right content */}
                            <div className="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div className="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                    <div className="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                        <div className="slider-item">
                                            <div className="nk-feature nk-feature-center">
                                                <div className="nk-feature-img">
                                                    <img className="round" src="/landing_assets/fontpage.png"  srcset="/landing_assets/fontpage.png 2x" alt="" />
                                                </div>
                                                <div className="nk-feature-content py-1 p-sm-3">
                                                    <h6>Comprehensive Customer Onboarding Platform </h6>
                                                    <p>Conduct detailed Know-Your-Customer (KYC) verification checks on your customers and employees.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="slider-item">
                                            <div className="nk-feature nk-feature-center">
                                                <div className="nk-feature-img">
                                                    <img className="round" src="/landing_assets/fontpage2.png" srcset="/landing_assets/fontpage2.png 2x" alt="" />
                                                </div>
                                                <div className="nk-feature-content py-2 p-sm-3">
                                                    <h6>Support Various Forms Of Verification </h6>
                                                    <p>Identity Verification, Anti- Money Laundering (AML) checks, Address Verification, Document Capture, Facial match</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="slider-dots"></div>
                                    <div className="slider-arrows"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login')); 
}
 