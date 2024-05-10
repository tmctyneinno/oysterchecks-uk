import React, { useState, useEffect }  from 'react';

const CompanyForm = ({ formData, onSubmit, onChange }) => {
    let url = window.location.origin;
    const [errorMessage, setErrorMessage] = useState('');
    const [successMessage, setSuccessMessage] = useState('');
    const [countries, setCountries] = useState([]);
    const [countriesOfbirth, sortedCountriesOfbirth] = useState([]);
    const [responseData, setResponseData] = useState(null);

    const sendDataToParent = () => {
        if(responseData !== null){
            updateParentResponse(responseData);
        }
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(formData);
    };

    useEffect(() => {
        fetchCountries();
    }, []);

    const fetchCountries = () => {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
            const sortedCountries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            const sortedCountriesOfbirth = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
            setCountries(sortedCountries);
            sortedCountriesOfbirth(sortedCountriesOfbirth);
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
                <input type="hidden" value="company" onChange={onChange} name="applicantType" className="form-control mb-3 custom-select" placeholder="First Name" required />

                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Company Name</label> 
                    <input type="text" value={formData.companyname} onChange={onChange} name='companyname' class="form-control mb-3 custom-select" placeholder="Company Name"  required />
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Registration Number</label> 
                    <input type="text" value={formData.registrationnumber} onChange={onChange} name="registrationnumber" class="form-control mb-3 custom-select" placeholder="Registration Number"  required />
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Company Email</label> 
                    <input type="email" value={formData.companyemail} onChange={onChange} name="companyemail" class="form-control mb-3 custom-select" placeholder="Company Email" />
                </div>
                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Company Phone number</label> 
                    <input type="number" value={formData.companyphone} onChange={onChange} name="companyphone" class="form-control mb-3 custom-select" placeholder="Company Phone" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Created Date</label> 
                    <input type="date" value={formData.companycreateddate} onChange={onChange} name="companycreateddate" class="form-control mb-3 custom-select" placeholder="Date of borth"  />
                </div>
                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Company type </label>
                    <select value={formData.companyType} onChange={handleChange} class="select2 form-control mb-3 custom-select" name="companyType" style={{ width: '100%', height: '36px' }}>
                        <option>Select</option>
                        <option value="Private">Private company</option>
                        <option value="Public limited">Public limited company</option>
                        <option value="State-owned enterprised">State-owned enterprise</option>
                    </select>
                </div>
                      
                <div class="col-md-6">
                    <label class="form-label" style="font-weight:500">Taxpayer registration number</label>
                    <input type="text" value={formData.taxpayer} onChange={handleChange}  id="taxpayer" name="taxpayer" class="form-control mb-3 custom-select" placeholder="Taxpayer number" />
                </div>

                <div class="col-md-12">
                    <label class="form-label mt-2" style="font-weight:500">Company website</label>
                    <input type="text" value={formData.taxpayer} onChange={handleChange}  id="websitelink" name="websitelink" class="form-control mb-3 custom-select" placeholder="Website link" />
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

export default CompanyForm;
