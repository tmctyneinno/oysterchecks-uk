import React, { useState, useEffect }  from 'react';
import axios from 'axios';

const IndividualForm = ({ formData, onSubmit, onChange }) => {
    let url = window.location.origin;
    const [errorMessage, setErrorMessage] = useState('');
    const [successMessage, setSuccessMessage] = useState('');
    const [countries, setCountries] = useState([]);
    const [countriesOfbirth, setCountriesOfbirth] = useState([]);
   
    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(formData);
    };

    useEffect(() => {
        fetchCountries();
        fetchCountriesOfbirth();
    }, []);

    const fetchCountries = () => {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
            const sortedCountries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            setCountries(sortedCountries);
            })
            .catch(error => console.error('Error fetching countries:', error));
    };
    const fetchCountriesOfbirth = () => {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
            const sortedCountriesOfbirth = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            setCountriesOfbirth(sortedCountriesOfbirth);
            })
            .catch(error => console.error('Error fetching countries:', error));
    };
    
    
    return (
        <div>
            {errorMessage && <div className="alert alert-danger">{errorMessage}</div>}
            {successMessage && <div className="alert alert-success">{successMessage}</div>}

            <form onSubmit={handleSubmit} className="add-individual-form">
            <div className="card-body">
                <div className="row">
                <input type="hidden" value={formData.applicantType} onChange={onChange} name="applicantType" className="form-control mb-3 custom-select"  required />

                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>First Name</label>
                    <input type="text" value={formData.firstname} onChange={onChange} name="firstname" className="form-control mb-3 custom-select" placeholder="First Name" required />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Last Name</label>
                    <input type="text" value={formData.lastname} onChange={onChange} name="lastname" className="form-control mb-3 custom-select" placeholder="Last Name" required />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Middle Name</label>
                    <input type="text" value={formData.middlename} onChange={onChange} name="middlename" className="form-control mb-3 custom-select" placeholder="Middle Name" required />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Email</label>
                    <input type="email" value={formData.email} onChange={onChange} name="email" className="form-control mb-3 custom-select" placeholder="Email" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Phone</label>
                    <input type="number" value={formData.phone} onChange={onChange} name="phone" className="form-control mb-3 custom-select" placeholder="Phone" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Place of birth</label>
                    <input type="text" value={formData.placeofbirth} onChange={onChange} name="placeofbirth" className="form-control mb-3 custom-select" placeholder="Place of birth" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Date of birth</label>
                    <input type="date" value={formData.dateofbirth} onChange={onChange} name="dateofbirth" className="form-control mb-3 custom-select" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Country</label>
                    <select required value={formData.country} onChange={onChange} id="country-select" name="country" className="select2 form-control mb-3 custom-select" style={{ width: '100%', height: '36px' }}>
                    <option value="">Select</option>
                    {countries.map(country => (
                        <option key={country.cca2} value={country.name.common}>{country.name.common} ({country.cca2})</option>
                    ))}
                    </select>
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Country of birth</label>
                    <select value={formData.countryofbirth} onChange={onChange} id="country-of-birth" name="countryofbirth" className="select2 form-control mb-3 custom-select" style={{ width: '100%', height: '36px' }}>
                    <option value="">Select</option>
                    {countriesOfbirth.map(country => (
                        <option key={country.cca2} value={country.name.common}>{country.name.common} ({country.cca2})</option>
                    ))}
                    </select>
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Gender</label>
                    <select value={formData.gender} onChange={onChange} className="select form-control mb-3 custom-select" id="gender" name="gender" style={{ width: '100%', height: '36px' }}>
                    <option>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    </select>
                </div>
                <div className="col-md-12">
                    <label className="form-label" style={{ fontWeight: 500 }}>Address</label>
                    <textarea value={formData.address} onChange={onChange} className="form-control" id="address" name="address" rows="3"></textarea>
                </div>
                </div>
            </div>
            <div className="row mt-4">
                <div className="col-sm-12 d-grid">
                <button type="submit" className="btn btn-primary btn-lg submitbtn">Create applicant</button>
                </div>
            </div>
            </form>
        </div>
    
  );
}

export default IndividualForm;
