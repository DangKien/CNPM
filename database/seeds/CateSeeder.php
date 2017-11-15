<?php

use Illuminate\Database\Seeder;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('catetogys')->insert([
        	['name' => 'Giới thiệu', 'slug'=>"gioi-thieu", 'cate_id'=>"0", 'user_create'=>"1"],
        	['name' => 'Giới thiệu chung', 'slug'=>"gioi-thieu-chung", 'cate_id'=>"1", 'user_create'=>"1"],
        	['name' => 'Cơ sở vật chất', 'slug'=>"co-so-vat-chat", 'cate_id'=>"1", 'user_create'=>"1"],
        	['name' => 'Đội ngũ giáo viên', 'slug'=>"doi-ngu-giao-vien", 'cate_id'=>"1", 'user_create'=>"1"],
        	['name' => 'Phương pháp dạy học', 'slug'=>"phuong-phap-day-hoc", 'cate_id'=>"1", 'user_create'=>"1"],

        	['name' => 'Chương trình học', 'slug'=>"chuong-trinh-hoc", 'cate_id'=>"0", 'user_create'=>"1"],
        	['name' => 'Tin tức', 'slug'=>"tin-tuc", 'cate_id'=>"6", 'user_create'=>"1"],
        	['name' => 'Thực đơn', 'slug'=>"thuc-don", 'cate_id'=>"6", 'user_create'=>"1"],
        	['name' => 'Ngày của bé', 'slug'=>"ngay-cua-be", 'cate_id'=>"6", 'user_create'=>"1"],
        	['name' => 'Sự kiện', 'slug'=>"su-kien", 'cate_id'=>"6", 'user_create'=>"1"],
        	['name' => 'Hoạt động ngoại khóa', 'slug'=>"hoat-dong-ngoai-khoa", 'cate_id'=>"6", 'user_create'=>"1"],

        	['name' => 'Thư viện', 'slug'=>"thu-vien", 'cate_id'=>"0", 'user_create'=>"1"],
        	['name' => 'Thư viện ảnh', 'slug'=>"thu-vien-anh", 'cate_id'=>"12", 'user_create'=>"1"],
        	['name' => 'Thư viện video', 'slug'=>"thu-vien-video", 'cate_id'=>"12", 'user_create'=>"1"],
        	['name' => 'Thư viện tài liệu', 'slug'=>"thu-vien-tai-lieu", 'cate_id'=>"12", 'user_create'=>"1"],

        	['name' => 'Tuyển sinh', 'slug'=>"tuyen-sinh", 'cate_id'=>"0", 'user_create'=>"1"],
            ['name' => 'Thông báo', 'slug'=>"thong-bao", 'cate_id'=>"0", 'user_create'=>"1"],
        	['name' => 'Thông tin tuyển sinh', 'slug'=>"thong-tin-tuyen-sinh", 'cate_id'=>"16", 'user_create'=>"1"],
        	['name' => 'Hướng dẫn', 'slug'=>"huong-dan", 'cate_id'=>"16", 'user_create'=>"1"],
        	['name' => 'Đăng kí tuyển sinh Online', 'slug'=>"dang-ki-online", 'cate_id'=>"16", 'user_create'=>"1"],

        	['name' => 'Liên hệ', 'slug'=>"dang-ki-online", 'cate_id'=>"0", 'user_create'=>"1"],
        ]);

    }
}
