<?php
declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    //use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
