<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'name'                  =>  'Ali Mohamed',
            'class'                 =>  'A',
            'email'                 =>  'ali-mohamed@gmail.com',
            'description'           =>  'clinic',
            'description_name'      =>  'عنوان العيادة',
            'specialty'             =>  'GYN',
            'mobile'                =>  '01014235842',
            'clinic_tel'            =>  '023822901',
            'address'               =>  'Ali\'s Address',
            'address_description'   =>  'Ali\'s Address Description',
            'am_working'            =>  '9:00:00',
            'mr_id'                 =>  3,
            'active'                =>  1,
            'created_at'            => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'            => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
