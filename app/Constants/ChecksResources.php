<?php

namespace App\Constants;

class ChecksResources
{
    public const CHECK_TYPES = [
        ['id' => 1, 'name' => 'Standard AML Screening Check', 'type' => 'standard_screening_check'],
        ['id' => 2, 'name' => 'Extensive AML Screening Check', 'type' => 'extensive_screening_check'],
        ['id' => 3, 'name' => 'Document Check', 'type' => 'document_check'],
        ['id' => 4, 'name' => 'Identity Check', 'type' => 'identity_check'],
        ['id' => 5, 'name' => 'Age Estimation Check', 'type' => 'age_estimation_check'],
        ['id' => 6, 'name' => 'Proof of Address Check', 'type' => 'proof_of_address_check'],
        ['id' => 7, 'name' => 'Multi-Bureau Check', 'value' => 'multi_bureau_check'],
    ];

    public const DOCUMENT_TYPES = [
        ['id' => 1,  'name' => 'Passport', 'description' => 'Government-issued international travel document'],
        ['id' => 2,  'name' => 'National ID', 'description' => 'Government-issued identification card'],
        ['id' => 3,  'name' => 'Driver\'s License', 'description' => 'Official permit to operate motor vehicles'],
        ['id' => 4,  'name' => 'Birth Certificate', 'description' => 'Official record of a person\'s birth'],
        ['id' => 5,  'name' => 'Utility Bill', 'description' => 'Proof of address (electricity, water, gas)'],
        ['id' => 6,  'name' => 'Bank Statement', 'description' => 'Official record of account activity'],
        ['id' => 7,  'name' => 'Tax Identification Document', 'description' => 'Official tax registration document'],
        ['id' => 8,  'name' => 'Social Security Card', 'description' => 'Government-issued social insurance document'],
        ['id' => 9,  'name' => 'Visa', 'description' => 'Authorization for entry/residence in a country'],
        ['id' => 10, 'name' => 'Proof of Employment', 'description' => 'Letter or document from employer'],
        ['id' => 11, 'name' => 'Academic Certificate', 'description' => 'Diploma or educational qualification'],
        ['id' => 12, 'name' => 'Marriage Certificate', 'description' => 'Official record of marriage'],
        ['id' => 13, 'name' => 'Divorce Decree', 'description' => 'Legal document dissolving a marriage'],
        ['id' => 14, 'name' => 'Property Deed', 'description' => 'Document proving property ownership'],
        ['id' => 15, 'name' => 'Vehicle Registration', 'description' => 'Document proving vehicle ownership'],
        ['id' => 16, 'name' => 'Insurance Policy', 'description' => 'Contract with insurance provider'],
        ['id' => 17, 'name' => 'Medical Records', 'description' => 'Confidential health documentation'],
        ['id' => 18, 'name' => 'Business License', 'description' => 'Authorization to operate a business'],
        ['id' => 19, 'name' => 'Articles of Incorporation', 'description' => 'Legal formation documents for a company'],
        ['id' => 20, 'name' => 'Power of Attorney', 'description' => 'Legal authorization to act for another person'],
    ];
}
