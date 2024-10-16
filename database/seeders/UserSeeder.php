<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['firstname' => 'Morgans','lastname'=>'Admin', 'email'=>'support@oysterchecks.com', 'phone'=>'', 'password'=>Hash::make('oysterchecks_admin'),'user_type'=>3, 'role_id'=>1],
            ['firstname' => 'Dan','lastname'=>'Code', 'email'=>'eshanokpe@gmail.com', 'phone'=>'080', 'password'=>Hash::make('12345678'),'user_type'=>2, 'role_id'=>1],
        ];
        foreach($data as $datum){
            User::create($datum);
        }
    }
}
