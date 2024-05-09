import React, { useState, useEffect }  from 'react';
import axios from 'axios';

const IndividualForm = () => {
    let url = window.location.origin;
    const [errorMessage, setErrorMessage] = useState('');
    const [successMessage, setSuccessMessage] = useState('');
    const [countries, setCountries] = useState([]);
    const [countriesOfbirth, sortedCountriesOfbirth] = useState([]);
    const [responseData, setResponseData] = useState(null);

    const sendDataToParent = () => {
        updateParentResponse(responseData);
    };

    const [formData, setFormData] = useState({
        applicantType: 'individual',
        firstname: '',
        lastname: '',
        middlename: '',
        email: '',
        phone: '',
        placeofbirth: '',
        dateofbirth: '',
        country: '',
        countryofbirth: '',
        gender: '',
        address: ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prevState => ({
          ...prevState,
          [name]: value
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        let urlApplicant = `${url}/user/applicant/store`;
        try{
            const response = await axios.post(urlApplicant, formData);
            console.log(response.data);
            setSuccessMessage(response.data.success);
            setResponseData(response.data.apiResponse);
            setErrorMessage('');
            //  sendDataToParent();
            
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

            {responseData && (
                <div>
                    {/* Display the retrieved data */}
                    <pre>{JSON.stringify(responseData, null, 2)}</pre>
                </div>
            )}

            <form onSubmit={handleSubmit} className="add-individual-form">
            <div className="card-body">
                <div className="row">
                <input type="hidden" value={formData.applicantType} onChange={handleChange} name="applicantType" className="form-control mb-3 custom-select" placeholder="First Name" required />

                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>First Name</label>
                    <input type="text" value={formData.firstname} onChange={handleChange} name="firstname" className="form-control mb-3 custom-select" placeholder="First Name" required />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Last Name</label>
                    <input type="text" value={formData.lastname} onChange={handleChange} name="lastname" className="form-control mb-3 custom-select" placeholder="Last Name" required />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Middle Name</label>
                    <input type="text" value={formData.middlename} onChange={handleChange} name="middlename" className="form-control mb-3 custom-select" placeholder="Middle Name" required />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Email</label>
                    <input type="email" value={formData.email} onChange={handleChange} name="email" className="form-control mb-3 custom-select" placeholder="Email" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Phone</label>
                    <input type="number" value={formData.phone} onChange={handleChange} name="phone" className="form-control mb-3 custom-select" placeholder="Phone" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Place of birth</label>
                    <input type="text" value={formData.placeofbirth} onChange={handleChange} name="placeofbirth" className="form-control mb-3 custom-select" placeholder="Place of birth" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Date of birth</label>
                    <input type="date" value={formData.dateofbirth} onChange={handleChange} name="dateofbirth" className="form-control mb-3 custom-select" />
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Country</label>
                    <select required value={formData.country} onChange={handleChange} id="country-select" name="country" className="select2 form-control mb-3 custom-select" style={{ width: '100%', height: '36px' }}>
                    <option value="">Select</option>
                    {countries.map(country => (
                        <option key={country.cca2} value={country.name.common}>{country.name.common} ({country.cca2})</option>
                    ))}
                    </select>
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Country of birth</label>
                    <select value={formData.countryofbirth} onChange={handleChange} id="country-of-birth" name="countryofbirth" className="select2 form-control mb-3 custom-select" style={{ width: '100%', height: '36px' }}>
                    <option value="">Select</option>
                    {countriesOfbirth.map(country => (
                        <option key={country.cca2} value={country.name.common}>{country.name.common} ({country.cca2})</option>
                    ))}
                    </select>
                </div>
                <div className="col-md-6">
                    <label className="form-label" style={{ fontWeight: 500 }}>Gender</label>
                    <select value={formData.gender} onChange={handleChange} className="select form-control mb-3 custom-select" id="gender" name="gender" style={{ width: '100%', height: '36px' }}>
                    <option>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    </select>
                </div>
                <div className="col-md-12">
                    <label className="form-label" style={{ fontWeight: 500 }}>Address</label>
                    <textarea value={formData.address} onChange={handleChange} className="form-control" id="address" name="address" rows="3"></textarea>
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
