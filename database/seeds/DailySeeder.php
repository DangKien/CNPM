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
        DB::table('cate_menu')->insert([
        	['name' => 'Mẫu giáo lớn' ],
        	['name' => 'Mẫu giao nhỡ' ],
        	['name' => 'Mẫu giáo bé' ],
        ]);
    }
}
