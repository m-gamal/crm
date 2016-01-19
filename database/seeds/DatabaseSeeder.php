<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();
        $this->call(LineTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(GiftTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(TerritoryTableSeeder::class);
        $this->call(VisitClassTableSeeder::class);
        $this->call(FormTableSeeder::class);
        $this->call(MrLinesTableSeeder::class);
        Model::reguard();
    }
}
