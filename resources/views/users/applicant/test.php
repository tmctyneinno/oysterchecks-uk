<script>
                        document.getElementById('add-photos').addEventListener('change', handleFileSelectAddPhotos);
                    
                        function handleFileSelectAddPhotos(event) {
                            const files = event.target.files;
                            const optionItems = [
                                'Passport',
                                'ID card',
                                'Drivers license',
                                'Residence permit',
                                'Selfie',
                                'Proof of address',
                                '2nd proof of address',
                                'Payment method',
                                'Proof of payment',
                                'Bank card',
                            ];
                    
                            for (let i = 0; i < files.length; i++) {
                                const file = files[i];
                                const reader = new FileReader();
                    
                                reader.onload = function(e) {
                                    const imageSrc = e.target.result;
                    
                                    
                    
                                    const colImg = document.createElement('div');
                                    colImg.classList.add('col-md-3', 'mb-3');
                    
                                    const imgElement = document.createElement('img');
                                    imgElement.src = imageSrc;
                                    imgElement.style.maxWidth = '100%';
                                    colImg.appendChild(imgElement);
                    
                                    const colSelect = document.createElement('div');
                                    colSelect.classList.add('col-md-3', 'mb-3');
                    
                                    const selectElement = document.createElement('select');
                                    selectElement.classList.add('form-select');
                                    
                                    selectElement.addEventListener('change', () => {
                                        const selectedOption = selectElement.options[selectElement.selectedIndex];
                                        const selectedOptionText = selectedOption.text;
                                        accordionButton.textContent = selectedOptionText;
                                    });
                    
                                    optionItems.forEach(itemText => {
                                        const option = document.createElement('option');
                                        option.text = itemText;
                                        selectElement.appendChild(option);
                                    });
                    
                                    colSelect.appendChild(selectElement);
                    
                                    // Create second select element
                                    const colSelect2 = document.createElement('div');
                                    colSelect2.classList.add('col-md-3', 'mb-3');
                                    const selectElement2 = document.createElement('select');
                                    selectElement2.classList.add('form-select');
                                    fetch('https://restcountries.com/v3.1/all')
                                        .then(response => response.json())
                                        .then(data => {
                                            // Sort countries alphabetically
                                            data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                    
                                            // Find index of Nigeria
                                            const nigeriaIndex = data.findIndex(country => country.name.common === 'Nigeria');
                    
                                            // Move Nigeria to the beginning of the array if found
                                            if (nigeriaIndex > 0) {
                                                const nigeria = data.splice(nigeriaIndex, 1);
                                                data.unshift(nigeria[0]);
                                            }
                    
                                            // Create options for each country
                                            data.forEach(country => {
                                                const option = document.createElement('option');
                                                option.value = country.name.common;
                                                option.text = country.name.common;
                    
                                                // Set data-image attribute with the URL to the flag
                                                if (country.flags && country.flags.png) {
                                                    option.style.backgroundImage = `url(${country.flags.png})`;
                                                    option.style.backgroundSize = 'contain';
                                                    option.style.backgroundRepeat = 'no-repeat';
                                                    option.style.backgroundPosition = 'left center';
                                                    option.style.paddingLeft = '20px'; // Adjust padding as needed
                                                }
                    
                                                selectElement2.appendChild(option);
                                            });
                                        })
                                        .catch(error => {
                                            console.error('Error fetching country data:', error);
                                        });
                                    colSelect2.appendChild(selectElement2);
                    
                                    const colDelete = document.createElement('div');
                                    colDelete.classList.add('col-md-3', 'mb-3');
                    
                                    const deleteButton = document.createElement('button');
                                    deleteButton.innerHTML = 'Delete';
                                    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-1');
                                    deleteButton.addEventListener('click', function() {
                                        accordionItem.removeChild(rowDiv);
                                    });
                                    colDelete.appendChild(deleteButton);
                    
                                    rowDiv.appendChild(colImg);
                                    rowDiv.appendChild(colSelect);
                                    rowDiv.appendChild(colSelect2);
                                    rowDiv.appendChild(colDelete);
                    
                                    accordionBody.appendChild(rowDiv);
                                    accordionCollapse.appendChild(accordionBody);
                                    accordionHeader.appendChild(accordionButton);
                                    accordionItem.appendChild(accordionHeader);
                                    accordionItem.appendChild(accordionCollapse);
                    
                                    document.getElementById('accordionExample').appendChild(accordionItem);
                                };
                    
                                reader.readAsDataURL(file);
                            }
                        }
                        let accordionItemCount = 0; // Counter for accordion items
                        document.getElementById('add-documents').addEventListener('click', function() {
                            var documentItem = document.createElement('div');
                            documentItem.className = 'document-item row ';
                            documentItem.innerHTML = `
                                <div class="row mt-2 justify-content-end">
                                    <div class="col-md-2 px-1"></div>
                                    <div class="col-md-3 px-1">
                                        <select class="form-select">
                                            <option value="passport">Passport</option>
                                            <option value="idcard">ID Card</option>
                                            <option value="diverslicense">Divers License</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <select class="form-select select-country"></select>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <button class="btn btn-primary upload mt-1 add-details" id="">
                                            <i class="fa fa-upload"></i> Add
                                        </button>
                                    </div>
                                    <div class="col-md-2 px-1">
                                        <button class="btn-danger addDocument btn mt-1">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            `;
                            document.getElementById('document-container').appendChild(documentItem);
                            fetchCountries();
                    
                            documentItem.querySelector('.upload').addEventListener('click', function() {
                                this.closest('.document-item').remove();
                            });
                            documentItem.querySelector('.addDocument').addEventListener('click', function() {
                                this.closest('.document-item').remove();
                            });
                    
                            documentItem.querySelector('.add-details').addEventListener('click', handleAddDetails);
                    
                        });

                        function handleAddDetails(event) {
                            var additionalContent = document.createElement('div');
                            accordionItemCount++;
                            additionalContent.innerHTML = `
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample${accordionItemCount}">
                                        <div class="accordion-item">
                                            <h5 class="accordion-header m-0" id="heading${accordionItemCount}">
                                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${accordionItemCount}" aria-expanded="true" aria-controls="collapse${accordionItemCount}">
                                                    Accordion Item #${accordionItemCount}
                                                </button>
                                            </h5>
                                            <div id="collapse${accordionItemCount}" class="accordion-collapse collapse show" aria-labelledby="heading${accordionItemCount}"  data-bs-parent="#accordionExample${accordionItemCount}" style="">
                                                <div class="accordion-body">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="firstname">First name</label>
                                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="lastname">Last name</label>
                                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="aliasname">Alias name</label>
                                                                <input type="text" class="form-control" id="aliasname" name="aliasname" placeholder="Alias name" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="passportnumber">Passport number</label>
                                                                <input type="text" class="form-control" id="passportnumber" name="passportnumber" placeholder="Passport number" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="issuedate">Issue date</label>
                                                                <input type="date" class="form-control" id="issuedate" name="issuedate" placeholder="Issue date" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="form-label" for="dateofbirth">Date of birth</label>
                                                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <label class="form-label" for="validuntil">Valid until</label>
                                                                <input type="date" class="form-control" id="validuntil" name="validuntil" required="">
                                                            </div>
                                                            <div class="col-md-12 mb-2 align-content-end">
                                                                <button type="button" class="btn btn-danger deleteAddDetails">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            document.getElementById('document-details').appendChild(additionalContent);
                            additionalContent.querySelector('.deleteAddDetails').addEventListener('click', function() {
                                additionalContent.remove(); // Remove the individual content
                            });
                        }
                    
                        // Function to fetch list of countries
                        function fetchCountries() {
                            fetch('https://restcountries.com/v3.1/all')
                                .then(response => response.json())
                                .then(data => {
                                    // Sort countries alphabetically
                                    data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                                    // Find Nigeria index
                                    const nigeriaIndex = data.findIndex(country => country.name.common === 'Nigeria');
                                    // If Nigeria found, remove it and add it to the beginning
                                    if (nigeriaIndex !== -1) {
                                        const nigeria = data.splice(nigeriaIndex, 1)[0];
                                        data.unshift(nigeria);
                                    }

                                    // Generate options for countries
                                    const selectOptions = data.map(country => `<option value="${country.name.common}">${country.name.common}</option>`).join('');
                                    const selectElements = document.querySelectorAll('.select-country');
                                    selectElements.forEach(selectElement => {
                                        selectElement.innerHTML = selectOptions;
                                    });
                                })
                                .catch(error => console.error('Error fetching countries:', error));
                        }
                    </script>