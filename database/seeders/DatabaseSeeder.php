<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([StudentSeeder::class,
                    UserSeeder::class
        ]);
        //đây là nơi sử dụng để tạo dữ liệu mẫu
//        $student = [
//          "name" => "Phạm việt đức ",
//          "email" =>"abc@gmail.com",
//            "address" => "số 9 TVB",
//            "date_of_birth" => "2003-09-03",
//            "created_at"=>date('Y-m-d H:i:s'),
//            "updated_at"=>date('Y-m-d H:i:s'),
//        ];
//        DB::table('students')->insert($student);
    }
}
