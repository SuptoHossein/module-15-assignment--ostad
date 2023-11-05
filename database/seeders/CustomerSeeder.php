<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['first_name'=>'Sakib','last_name'=>'Hossain','age'=>31,'gender'=>'male','email'=>'sakib@gmail.com','mobile_number'=>'01716954214'],
            ['first_name'=>'Riya','last_name'=>'Akter','age'=>23,'gender'=>'female','email'=>'riya@gmail.com','mobile_number'=>'01716954547'],
            ['first_name'=>'Monir','last_name'=>'Hasan','age'=>26,'gender'=>'male','email'=>'monir@gmail.com','mobile_number'=>'01716952547'],
        ];

        $user = User::orderBy('id','asc')->first();
        foreach ($customers as $key => $customer) {
            Customer::updateOrCreate([
                'user_id'       => $user->id,
                'first_name'    => $customer['first_name'],
                'last_name'     => $customer['last_name'],
                'age'           => $customer['age'],
                'gender'        => $customer['gender'],
                'email'         => $customer['email'],
                'mobile_number' => $customer['mobile_number'],
            ]);
        }
    }
}
