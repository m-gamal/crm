<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([
            'name'          =>  'Mohamed Gamal',
            'email'         =>  'mg.freelancer92@gmail.com',
            'password'      =>  Hash::make('password'),
            'level_id'      =>  2,
            'hiring_date'   =>  \Carbon\Carbon::createFromDate(2015, 11, 1),
            'leaving_date'  =>  '',
            'active'        =>  1,
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('employee')->insert([
            'name'          =>  'Ahmed Mohamed',
            'email'         =>  'ahmed-mohamed@gmail.com',
            'password'      =>  Hash::make('password'),
            'level_id'      =>  3,
            'hiring_date'   =>  \Carbon\Carbon::createFromDate(2015, 10, 1),
            'leaving_date'  =>  '',
            'active'        =>  1,
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('employee')->insert([
            'name'          =>  'Amr Mohamed',
            'email'         =>  'amr-mohamed@gmail.com',
            'password'      =>  Hash::make('password'),
            'level_id'      =>  7,
            'hiring_date'   =>  \Carbon\Carbon::createFromDate(2015, 9, 1),
            'leaving_date'  =>  '',
            'active'        =>  1,
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
