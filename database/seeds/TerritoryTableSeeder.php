<?php

use Illuminate\Database\Seeder;

class TerritoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('territory')->insert([
            'name'          =>  'Territory 1',
            'area_id'       =>  '1',
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('territory')->insert([
            'name'          =>  'Territory 2',
            'area_id'       =>  '1',
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('territory')->insert([
            'name'          =>  'Territory 3',
            'area_id'       =>  '3',
            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}