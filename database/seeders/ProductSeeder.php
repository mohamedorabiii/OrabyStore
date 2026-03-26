<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // ─── Electronics > Phones ─────────────────────────────────────
            ['subcategory' => 'Phones', 'brand' => 'Apple',   'name_en' => 'iPhone 15',       'name_ar' => 'ايفون 15',    'image' => 'products/iphone-15.jpg',   'price' => 799.00,  'quantity' => 80,  'status' => 1],

            // ─── Electronics > Laptops ────────────────────────────────────
            ['subcategory' => 'Laptops', 'brand' => 'Apple',  'name_en' => 'MacBook Pro 14 M3',       'name_ar' => 'ماك بوك برو 14 M3',      'image' => 'products/macbook-pro-14-m3.jpg',       'price' => 1999.00, 'quantity' => 30,  'status' => 1],

            // ─── Electronics > Tablets ────────────────────────────────────
            ['subcategory' => 'Tablets', 'brand' => 'Apple',   'name_en' => 'iPad Air 5',              'name_ar' => 'ايباد اير 5',            'image' => 'products/ipad-air-5.jpg',              'price' => 749.00,  'quantity' => 55,  'status' => 1],
            // ─── Electronics > TVs ────────────────────────────────────────
            ['subcategory' => 'TVs', 'brand' => 'Samsung', 'name_en' => 'Samsung QLED 55" 4K',        'name_ar' => 'سامسونج QLED 55 بوصة 4K', 'image' => 'products/samsung-qled-55-4k.jpg',        'price' => 899.00,  'quantity' => 20,  'status' => 1],

            // ─── Clothes > T-Shirts ───────────────────────────────────────
            ['subcategory' => 'T-Shirts', 'brand' => 'Nike', 'name_en' => 'Nike Dri-FIT Training Tee',  'name_ar' => 'تيشرت نايك دراي فيت',   'image' => 'products/nike-dri-fit-training-tee.jpg',   'price' => 35.00,  'quantity' => 200, 'status' => 1],

            // ─── Clothes > Shoes ──────────────────────────────────────────
            ['subcategory' => 'Shoes', 'brand' => 'Nike', 'name_en' => 'Nike Air Max 270',              'name_ar' => 'نايك اير ماكس 270',      'image' => 'products/nike-air-max-270.jpg',              'price' => 150.00, 'quantity' => 90,  'status' => 1],

            // ─── Clothes > Jackets ────────────────────────────────────────
            ['subcategory' => 'Jackets', 'brand' => 'Nike', 'name_en' => 'Nike Windrunner Jacket',      'name_ar' => 'جاكيت نايك ويند رانر',   'image' => 'products/nike-windrunner-jacket.jpg',   'price' => 110.00, 'quantity' => 60,  'status' => 1],

            // ─── Clothes > Pants ──────────────────────────────────────────
            ['subcategory' => 'Pants', 'brand' => 'zara', 'name_en' => 'Zara High Waist Straight Jeans', 'name_ar' => 'جينز زارا هاي ويست',     'image' => 'products/zara-high-waist-straight-jeans.jpg',        'price' => 59.00,  'quantity' => 100, 'status' => 1],

            // ─── Computer Accessories > Keyboards ────────────────────────
            ['subcategory' => 'Keyboards', 'brand' => 'Apple',   'name_en' => 'Apple Magic Keyboard',   'name_ar' => 'كيبورد ابل ماجيك',   'image' => 'products/apple-magic-keyboard.jpg',    'price' => 99.00,  'quantity' => 75,  'status' => 1],

            // ─── Computer Accessories > Mice ──────────────────────────────
            ['subcategory' => 'Mice', 'brand' => 'Apple',   'name_en' => 'Apple Magic Mouse 3',         'name_ar' => 'ماوس ابل ماجيك 3',       'image' => 'products/apple-magic-mouse-3.jpg',       'price' => 79.00,  'quantity' => 85,  'status' => 1],

            // ─── Computer Accessories > Monitors ─────────────────────────
            ['subcategory' => 'Monitors', 'brand' => 'Samsung', 'name_en' => 'Samsung 27" Curved Monitor', 'name_ar' => 'شاشة سامسونج 27 بوصة منحنية', 'image' => 'products/samsung-27-curved-monitor.jpg',        'price' => 349.00, 'quantity' => 35, 'status' => 1],

            // ─── Computer Accessories > Headsets ─────────────────────────
            ['subcategory' => 'Headsets', 'brand' => 'Apple',   'name_en' => 'AirPods Pro 2nd Gen',      'name_ar' => 'ايربودز برو الجيل الثاني', 'image' => 'products/airpods-pro-2nd-gen.jpg',        'price' => 249.00, 'quantity' => 70,  'status' => 1],

            // ─── Bicycles > Mountain Bikes ────────────────────────────────
            ['subcategory' => 'Mountain Bikes', 'brand' => 'Xiaomi', 'name_en' => 'Xiaomi HIMO C30S Mountain Bike', 'name_ar' => 'دراجة شاومي هيمو C30S جبلية', 'image' => 'products/xiaomi-himo-c30s-mountain-bike.jpg',        'price' => 599.00, 'quantity' => 20, 'status' => 1],

            // ─── Bicycles > Road Bikes ────────────────────────────────────
            ['subcategory' => 'Road Bikes', 'brand' => 'Xiaomi', 'name_en' => 'Xiaomi HIMO R16 Road Bike', 'name_ar' => 'دراجة شاومي هيمو R16 طريق', 'image' => 'products/xiaomi-himo-r16-road-bike.jpg',        'price' => 499.00, 'quantity' => 20, 'status' => 1],

            // ─── Bicycles > Kids Bikes ────────────────────────────────────
            ['subcategory' => 'Kids Bikes', 'brand' => 'Xiaomi', 'name_en' => 'Xiaomi MITU Kids Bike 14"', 'name_ar' => 'دراجة شاومي ميتو أطفال 14', 'image' => 'products/xiaomi-mitu-kids-bike-14.jpg',        'price' => 149.00, 'quantity' => 40, 'status' => 1],

            // ─── Books > Programming ──────────────────────────────────────
            ['subcategory' => 'Programming', 'brand' => 'Apple', 'name_en' => 'Clean Code by Robert Martin',     'name_ar' => 'كلين كود',                'image' => 'products/clean-code.jpg',    'price' => 35.00,  'quantity' => 80,  'status' => 1],

            // ─── Books > Novels ───────────────────────────────────────────
            ['subcategory' => 'Novels', 'brand' => 'Apple', 'name_en' => 'The Alchemist',                       'name_ar' => 'الخيميائي',               'image' => 'products/the-alchemist.jpg',        'price' => 14.00,  'quantity' => 150, 'status' => 1],

            // ─── Books > Science ──────────────────────────────────────────
            ['subcategory' => 'Science', 'brand' => 'Apple', 'name_en' => 'A Brief History of Time',            'name_ar' => 'تاريخ موجز للزمن',        'image' => 'products/a-brief-history-of-time.jpg',        'price' => 18.00,  'quantity' => 90,  'status' => 1],

            // ─── Home & Kitchen > Cookware ────────────────────────────────
            ['subcategory' => 'Cookware', 'brand' => 'Lg',      'name_en' => 'LG NeoChef Microwave 42L',        'name_ar' => 'مايكرويف ال جي نيوشيف',  'image' => 'products/lg-neochef-microwave-42l.jpg',        'price' => 199.00, 'quantity' => 45,  'status' => 1],

            // ─── Home & Kitchen > Furniture ───────────────────────────────
            ['subcategory' => 'Furniture', 'brand' => 'zara',   'name_en' => 'Zara Home Linen Sofa 3-Seater',  'name_ar' => 'كنبة زارا هوم كتان 3 مقاعد', 'image' => 'products/zara-home-linen-sofa-3-seater.jpg',        'price' => 899.00, 'quantity' => 15,  'status' => 1],

            // ─── Home & Kitchen > Appliances ──────────────────────────────
            ['subcategory' => 'Appliances', 'brand' => 'Samsung', 'name_en' => 'Samsung 8kg Front Load Washer', 'name_ar' => 'غسالة سامسونج 8 كيلو فرونت', 'image' => 'products/samsung-8kg-front-load-washer.jpg',        'price' => 699.00, 'quantity' => 20,  'status' => 1],
        ];

        foreach ($products as $item) {
            $subcategory = Subcategory::where('name_en', $item['subcategory'])->first();
            $brand       = Brand::where('name_en', $item['brand'])->first();

            if (! $subcategory || ! $brand) {
                continue;
            }

            $category = Category::find($subcategory->category_id);

            $prefix = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $item['name_en']), 0, 3));
            $code   = $prefix . '-' . strtoupper(Str::random(4));

            Product::firstOrCreate(
                [
                    'name_en'        => $item['name_en'],
                    'subcategory_id' => $subcategory->id,
                ],
                [
                    'name_ar'        => $item['name_ar'],
                    'desc_en' => $item['name_en'],
                    'desc_ar' => $item['name_ar'],
                    'price'          => $item['price'],
                    'quantity'       => $item['quantity'],
                    'status'         => $item['status'],
                    'code'           => $code,
                    'brand_id'       => $brand->id,
                    'category_id'    => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'image'          => $item['image'],
                ]
            );
        }
    }
}
