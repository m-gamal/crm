<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name'          =>  'Product 1',
            'line_id'       =>  '1',
            'unit_price'    =>  '11.5',
            'quantity'      =>  '20',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('product')->insert([
            'name'          =>  'Product 2',
            'line_id'       =>  '1',
            'unit_price'    =>  '11.5',
            'quantity'      =>  '20',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('product')->insert([
            'name'          =>  'Product 3',
            'line_id'       =>  '1',
            'unit_price'    =>  '20',
            'quantity'      =>  '14',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('product')->insert([
            'name'          =>  'Product 4',
            'line_id'       =>  '2',
            'unit_price'    =>  '12',
            'quantity'      =>  '10',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('product')->insert([
            'name'          =>  'Product 5',
            'line_id'       =>  '3',
            'unit_price'    =>  '12.5',
            'quantity'      =>  '27',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
