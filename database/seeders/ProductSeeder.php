<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'CASUAL WATCH',
                "price"=>"14.99",
                "description"=>"Introducing our versatile CASUAL WATCH, perfect for effortlessly blending comfort and style in your everyday wardrobe.",
                "category"=>"Watches",
                "gallery"=>"img/Watches/Rectangle 7-2.png",
                "size"=>"M"
            ],
            [
                'name'=>'FORMAL WATCH',
                "price"=>"25.00",
                "description"=>"Introducing our versatile FORMAL WATCH, perfect for effortlessly blending comfort and style in your everyday wardrobe.",
                "category"=>"Watches",
                "gallery"=>"img/Watches/Rectangle 7-1.png",
                "size"=>"L"
            ],
            [
                'name'=>'SMART WATCH',
                "price"=>"34.99",
                "description"=>"Introducing our versatile SMART WATCH, perfect for effortlessly blending comfort and style in your everyday wardrobe.",
                "category"=>"Watches",
                "gallery"=>"img/Watches/Rectangle 7-3.png",
                "size"=>"M"
            ],
            [
                'name'=>'APPLE WATCH',
                "price"=>"44.99",
                "description"=>"Introducing our versatile APPLE WATCH, perfect for effortlessly blending comfort and style in your everyday wardrobe.",
                "category"=>"Watches",
                "gallery"=>"img/Watches/Rectangle 7-4.png",
                "size"=>"M"
            ],
            [
                'name'=>'SPORTS WATCH',
                "price"=>"24.99",
                "description"=>"Introducing our versatile SPORTS WATCH, perfect for effortlessly blending comfort and style in your everyday wardrobe.",
                "category"=>"Watches",
                "gallery"=>"img/Watches/Rectangle 7-5.png",
                "size"=>"M"
            ]
        ]);
    }
}
