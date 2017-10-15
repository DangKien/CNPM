<?php

use Illuminate\Database\Seeder;

class DailySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily')->insert([
        	['name' => 'Thứ 2'],
        	['name' => 'Thứ 3'],
        	['name' => 'Thứ 4'],
        	['name' => 'Thứ 5'],
        	['name' => 'Thứ 6'],
        	['name' => 'Thứ 7'],
        ]);
    }
}
