<?php

use Illuminate\Database\Seeder;

class GiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gift')->insert([
            'name'          =>  'Gift 1',
            'quantity'      =>  '20',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('gift')->insert([
            'name'          =>  'Gift 2',
            'quantity'      =>  '20',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('gift')->insert([
            'name'          =>  'Gift 3',
            'quantity'      =>  '14',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('gift')->insert([
            'name'          =>  'Gift 4',
            'quantity'      =>  '10',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('gift')->insert([
            'name'          =>  'Gift 5',
            'quantity'      =>  '27',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
