<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DailySeeder::class);
        $this->call(CateSeeder::class);
        $this->call(UserSeeder::class);
    }
}
