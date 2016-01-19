<?php

use Illuminate\Database\Seeder;

class VisitClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visit_class')->insert([
            'name'              =>  'A',
            'visits_count'      =>  '5',
            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('visit_class')->insert([
            'name'              =>  'B',
            'visits_count'      =>  '4',
            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        DB::table('visit_class')->insert([
            'name'              =>  'C',
            'visits_count'      =>  '3',
            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
