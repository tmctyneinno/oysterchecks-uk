<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Verification;

class VerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $data = [
            ['slug' => 'address', 'name'=>'Address Verification', 'sub_name'=>'', 'sub2_name'=>'', 'report_type'=>'address', 'type'=>'address', 'fee'=>1000], 
            ['slug' => 'adverse-media-intelligence', 'name'=>'Aml', 'sub_name'=>'', 'sub2_name'=>'', 'report_type'=>'aml', 'type'=>'aml', 'fee'=>1000], 
            ['slug' => 'applicants', 'name'=>'Applicants', 'sub_name'=>'individual', 'sub2_name'=>'company', 'report_type'=>'Applicants', 'type'=>'applicants', 'fee'=>1000], 
            ['slug' => 'company', 'name'=>'company', 'sub_name'=>'', 'sub2_name'=>'', 'report_type'=>'company', 'type'=>'company', 'fee'=>1000], 
            ['slug' => 'individual', 'name'=>'individual', 'sub_name'=>'', 'sub2_name'=>'', 'report_type'=>'individual', 'type'=>'individual', 'fee'=>1000], 
          ];

    foreach($data as $datum){
        Verification::create($datum);
    }
    }
}
