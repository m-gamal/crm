<?php

use Illuminate\Database\Seeder;

class MrLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mr_lines')->insert([
            'mr_id'         =>  '3',
            'line_id'       =>  '2',
            'from'          =>  \Carbon\Carbon::parse('Jan-2015')->format('M-Y'),
            'to'            =>  \Carbon\Carbon::parse('Nov-2015')->format('M-Y'),
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('mr_lines')->insert([
            'mr_id'         =>  '3',
            'line_id'       =>  '1',
            'from'          =>  \Carbon\Carbon::parse('Dec-2015')->format('M-Y'),
            'to'            =>  NULL,
            'created_at'    =>  \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'    =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
