<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $subcategories = [
            // Electronics
            ['category' => 'Electronics', 'name_en' => 'Phones',    'name_ar' => 'موبايلات',       'image' => 'subcategories/phones.jpg',    'status' => 1],
            ['category' => 'Electronics', 'name_en' => 'Laptops',   'name_ar' => 'لابتوبات',       'image' => 'subcategories/laptops.jpg',   'status' => 1],
            ['category' => 'Electronics', 'name_en' => 'Tablets',   'name_ar' => 'تابلتات',        'image' => 'subcategories/tablets.jpg',   'status' => 1],
            ['category' => 'Electronics', 'name_en' => 'TVs',       'name_ar' => 'تليفزيونات',     'image' => 'subcategories/tvs.jpg',       'status' => 1],

            // Clothes
            ['category' => 'Clothes', 'name_en' => 'T-Shirts', 'name_ar' => 'تيشيرتات', 'image' => 'subcategories/tshirts.jpg', 'status' => 1],
            ['category' => 'Clothes', 'name_en' => 'Shoes',    'name_ar' => 'أحذية',     'image' => 'subcategories/shoes.jpg',   'status' => 1],
            ['category' => 'Clothes', 'name_en' => 'Jackets',  'name_ar' => 'جاكيتات',   'image' => 'subcategories/jackets.jpg', 'status' => 1],
            ['category' => 'Clothes', 'name_en' => 'Pants',    'name_ar' => 'بناطيل',    'image' => 'subcategories/pants.jpg',   'status' => 1],

            // Computer Accessories
            ['category' => 'Computer Accessories', 'name_en' => 'Keyboards', 'name_ar' => 'كيبوردات',  'image' => 'subcategories/keyboards.jpg', 'status' => 1],
            ['category' => 'Computer Accessories', 'name_en' => 'Mice',      'name_ar' => 'ماوسات',    'image' => 'subcategories/mice.jpg',      'status' => 1],
            ['category' => 'Computer Accessories', 'name_en' => 'Monitors',  'name_ar' => 'شاشات',     'image' => 'subcategories/monitors.jpg',  'status' => 1],
            ['category' => 'Computer Accessories', 'name_en' => 'Headsets',  'name_ar' => 'سماعات',    'image' => 'subcategories/headsets.jpg',  'status' => 1],

            // Bicycles
            ['category' => 'Bicycles', 'name_en' => 'Mountain Bikes', 'name_ar' => 'دراجات جبلية',   'image' => 'subcategories/mountain-bikes.jpg', 'status' => 1],
            ['category' => 'Bicycles', 'name_en' => 'Road Bikes',     'name_ar' => 'دراجات طريق',    'image' => 'subcategories/road-bikes.jpg',     'status' => 1],
            ['category' => 'Bicycles', 'name_en' => 'Kids Bikes',     'name_ar' => 'دراجات أطفال',   'image' => 'subcategories/kids-bikes.jpg',     'status' => 1],

            // Books
            ['category' => 'Books', 'name_en' => 'Programming', 'name_ar' => 'برمجة',      'image' => 'subcategories/programming.jpg', 'status' => 1],
            ['category' => 'Books', 'name_en' => 'Novels',      'name_ar' => 'روايات',     'image' => 'subcategories/novels.jpg',      'status' => 1],
            ['category' => 'Books', 'name_en' => 'Science',     'name_ar' => 'علوم',       'image' => 'subcategories/science.jpg',     'status' => 1],
           
            // Home & Kitchen
            ['category' => 'Home & Kitchen', 'name_en' => 'Cookware', 'name_ar' => 'أدوات الطبخ', 'image' => 'subcategories/cookware.jpg', 'status' => 1],
            ['category' => 'Home & Kitchen', 'name_en' => 'Furniture', 'name_ar' => 'أثاث', 'image' => 'subcategories/furniture.jpg', 'status' => 1],
            ['category' => 'Home & Kitchen', 'name_en' => 'Appliances', 'name_ar' => 'أجهزة منزلية', 'image' => 'subcategories/appliances.jpg', 'status' => 1],
        ];
        foreach ($subcategories as $item) {
            $category = Category::where('name_en', $item['category'])->first();

            if ($category) {
                Subcategory::firstOrCreate(
                    [
                        'name_en'     => $item['name_en'],
                        'category_id' => $category->id,
                    ],
                    [
                        'name_ar'     => $item['name_ar'],
                        'image'       => $item['image'],
                        'status'      => $item['status'],
                        'category_id' => $category->id,
                    ]
                );
            }
        }

    }
}
