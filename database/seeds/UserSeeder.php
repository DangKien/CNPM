<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
	       ['name' => 'Đặng Trung Kiên', 'account' => "dangkien", 'email' => "dangtrungkien96@gmail.com", 'password' => Hash::make("123456"), 'gender' => 'MALE', 'phone' =>"01659901941", 'birthday' => "1996-12-21", 'status'=>"1", 'address'=>"Long Biên, Hà Nội", 'avatar'=>"kiendang.jpg", 'is_admin'=> '1', 'job'=> 'Hiệu trưởng'],

	       ['name' => 'Dương Thị Thúy', 'account' => "duongthuy", 'email' => "duongthithuy@gmail.com", 'password' => Hash::make("123456"), 'gender' => 'FEMALE', 'phone' =>"01659901924", 'birthday' => "1996-11-05", 'status'=>"1", 'address'=>"Long Biên, Hà Nội", 'avatar'=>"kiendang.jpg", 'is_admin'=> '0', 'job'=> 'Giáo viên'],

	       ['name' => 'Phạm Hoài Nam', 'account' => "nampham", 'email' => "phamhoainam@gmail.com", 'password' => Hash::make("123456"), 'gender' => 'MALE', 'phone' =>"01659901951", 'birthday' => "1996-12-1", 'status'=>"1", 'address'=>"Long Biên, Hà Nội", 'avatar'=>"kiendang.jpg", 'is_admin'=> '0', 'job'=> 'Đầu bếp'],

	       ['name' => 'Nguyễn Thị Ngọc Hoàn', 'account' => "ngochoan", 'email' => "nguyenthingochoan@gmail.com", 'password' => Hash::make("123456"), 'gender' => 'FEMALE', 'phone' =>"01659901961", 'birthday' => "1996-12-17", 'status'=>"1", 'address'=>"Long Biên, Hà Nội", 'avatar'=>"kiendang.jpg", 'is_admin'=> '0', 'job'=> 'Loa Công'],

	       ['name' => 'Nguyễn Hồng Hạnh', 'account' => "hanhnguyen", 'email' => "nguyenhonghanh@gmail.com", 'password' => Hash::make("123456"), 'gender' => 'FEMALE', 'phone' =>"01659901971", 'birthday' => "1996-12-17", 'status'=>"1", 'address'=>"Long Biên, Hà Nội", 'avatar'=>"kiendang.jpg", 'is_admin'=> '0', 'job'=> 'Giáo vụ'],

	    	]);
    }
}
