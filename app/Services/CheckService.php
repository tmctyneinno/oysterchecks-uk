<?php

namespace App\Services;

use App\Models\AmlVerification;
use App\Models\DocumentVerification;
use App\Models\IdentityVerification;
use App\Models\AgeEstimation;
use App\Models\AddressVerification;
use App\Models\BureauCheck;
use App\Models\ProofOfAddressCheck;
use Illuminate\Http\Request;

class CheckService
{

    public const CHECK_TYPES = [
        [
            'id' => 1,
            'name' => 'Standard AML Screening Check',
            'type' => 'standard_screening_check',
            'description' => 'Screen clients against Sanctions & Watchlists, PEP, and Adverse Media database.',
            'fields' => []
        ],
        [
            'id' => 2,
            'name' => 'Extensive AML Screening Check',
            'type' => 'extensive_screening_check',
            'description' => 'Screen clients against Sanctions & Watchlists, PEP, and Adverse Media database.',
            'fields' => []
        ],
        [
            'id' => 3,
            'name' => 'Document Check',
            'type' => 'document_check',
            'description' => "Verify your clients' ID documents to extract details and confirm their authenticity.",
            'fields' => ['issuingCountry', 'classification', 'document']
        ],
        [
            'id' => 4,
            'name' => 'Identity Check',
            'type' => 'identity_check',
            'description' => "Ensure that your clients are who they say they are through our liveness solution.",
            'fields' => []
        ],
        // [
        //     'id' => 5,
        //     'name' => 'Enhanced Identity Check',
        //     'type' => 'enhanced_identity_check',
        //     'fields' => []
        // ],
        [
            'id' => 6,
            'name' => 'Age Estimation Check',
            'type' => 'age_estimation_check',
            'description' => "Effortlessly estimate your client's age by analyzing their selfie.",
            'fields' => []
        ],
        [
            'id' => 7,
            'name' => 'Proof of Address Check',
            'type' => 'proof_of_address_check',
            'description' => "Extracts data from proof of address documents and verifies them against your client details.",
            'fields' => []
        ],
        [
            'id' => 8,
            'name' => 'Multi-Bureau Check',
            'type' => 'multi_bureau_check',
            'description' => "Verify client identity and address details against trusted sources, such as government and credit bureaus.",
            'fields' => ['line', 'city', 'postalCode', 'state', 'country']
        ],
    ];

    public const DOCUMENT_TYPES = [
        ['id' => 1, 'sides_required' => 1,  'name' => 'Passport', 'value' => 'passport',  'description' => 'Government-issued international travel document'],
        ['id' => 2, 'sides_required' => 2,  'name' => 'Driver\'s License', 'value' => 'driving_license', 'description' => 'Official permit to operate motor vehicles'],
        ['id' => 3, 'sides_required' => null,  'name' => 'National Insurance Number', 'value' => 'national_insurance_number', 'description' => 'UK social security identifier'],
        ['id' => 4, 'sides_required' => null,  'name' => 'Social Security Number', 'value' => 'social_security_number', 'description' => 'US social insurance identifier'],
        ['id' => 5, 'sides_required' => null,  'name' => 'Tax Identification Number', 'value' => 'tax_identification_number', 'description' => 'Official tax registration identifier'],
        ['id' => 6, 'sides_required' => null,  'name' => 'Utility Bill', 'value' => 'utility_bill', 'description' => 'Proof of address (electricity, water, gas)'],
        ['id' => 7, 'sides_required' => 2,  'name' => 'National Identity Card', 'value' => 'national_identity_card', 'description' => 'Government-issued identification card'],
        ['id' => 8, 'sides_required' => 1,  'name' => 'Visa', 'value' => 'visa', 'description' => 'Authorization for entry/residence in a country'],
        ['id' => 9, 'sides_required' => null,  'name' => 'Polling Card', 'value' => 'polling_card', 'description' => 'Document confirming voter registration'],
        ['id' => 10, 'sides_required' => 2, 'name' => 'Residence Permit', 'value' => 'residence_permit', 'description' => 'Authorization for long-term residence'],
        ['id' => 11, 'sides_required' => null, 'name' => 'Birth Certificate', 'value' => 'birth_certificate', 'description' => 'Official record of a person\'s birth'],
        ['id' => 12, 'sides_required' => null, 'name' => 'Bank Statement', 'value' => 'bank_statement', 'description' => 'Official record of account activity'],
        ['id' => 13, 'sides_required' => null, 'name' => 'Change of Name Document', 'value' => 'change_of_name', 'description' => 'Legal proof of name change'],
        ['id' => 14, 'sides_required' => null, 'name' => 'Tax Document', 'value' => 'tax_document', 'description' => 'Official tax-related record'],
        ['id' => 15, 'sides_required' => null, 'name' => 'Company Confirmation Statement', 'value' => 'company_confirmation_statement', 'description' => 'UK company annual filing'],
        ['id' => 16, 'sides_required' => null, 'name' => 'Company Annual Accounts', 'value' => 'company_annual_accounts', 'description' => 'Financial statements of a company'],
        ['id' => 17, 'sides_required' => null, 'name' => 'Company Statement of Capital', 'value' => 'company_statement_of_capital', 'description' => 'Document outlining share capital'],
        ['id' => 18, 'sides_required' => null, 'name' => 'Company Change of Address', 'value' => 'company_change_of_address', 'description' => 'Record of registered office update'],
        ['id' => 19, 'sides_required' => null, 'name' => 'Company Incorporation', 'value' => 'company_incorporation', 'description' => 'Legal formation documents for a company'],
        ['id' => 20, 'sides_required' => null, 'name' => 'Company Change of Officers', 'value' => 'company_change_of_officers', 'description' => 'Record of director/officer updates'],
        ['id' => 21, 'sides_required' => null, 'name' => 'Company Change of Beneficial Owners', 'value' => 'company_change_of_beneficial_owners', 'description' => 'Record of ownership updates'],
        ['id' => 22, 'sides_required' => null, 'name' => 'Unknown', 'value' => 'unknown', 'description' => 'Unspecified or uncategorized document'],
        ['id' => 23, 'sides_required' => null, 'name' => 'Other', 'value' => 'other', 'description' => 'Document not listed above'],
    ];

    public const DOCUMENT_CLASSIFICATIONS = [
        ['id' => 1, 'name' => 'Proof of Identity', 'value' => 'proof_of_identity', 'description' => 'Documents verifying personal identity'],
        ['id' => 2, 'name' => 'Source of Wealth', 'value' => 'source_of_wealth', 'description' => 'Documents showing origin of assets'],
        ['id' => 3, 'name' => 'Source of Funds', 'value' => 'source_of_funds', 'description' => 'Documents showing origin of transaction funds'],
        ['id' => 4, 'name' => 'Proof of Address', 'value' => 'proof_of_address', 'description' => 'Documents verifying residential address'],
        ['id' => 5, 'name' => 'Company Filing', 'value' => 'company_filing', 'description' => 'Official company registration documents'],
        ['id' => 6, 'name' => 'Other', 'value' => 'other', 'description' => 'Uncategorized document classification'],
    ];


    public function clientChecksCollection($client_id)
    {
        return collect()
            ->merge(AmlVerification::where('client_id', $client_id)->get())
            ->merge(DocumentVerification::where('client_id', $client_id)->get())
            ->merge(IdentityVerification::where('client_id', $client_id)->get())
            ->merge(AgeEstimation::where('client_id', $client_id)->get())
            ->merge(AddressVerification::where('client_id', $client_id)->get())
            ->merge(BureauCheck::where('client_id', $client_id)->get())
            ->merge(ProofOfAddressCheck::where('client_id', $client_id)->get())
            ->sortByDesc('created_at');
    }
}
