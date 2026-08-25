<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Electronics' => [
                'Laptops',
                'Smartphones',
                'Tablets',
                'Headphones',
                'Speakers',
                'Keyboards & Mice',
                'Power Banks',
                'Smart Watches',
            ],

            'Computers & Accessories' => [
                'Monitors',
                'Gaming PCs',
                'Computer Accessories',
                'Storage',
                'USB Flash Drives',
                'Webcams',
            ],

            'Gaming' => [
                'PlayStation',
                'Xbox',
                'Nintendo',
                'Gaming Accessories',
                'Gaming Headsets',
                'Gaming Controllers',
            ],

            'Home Appliances' => [
                'Kitchen Appliances',
                'Coffee Machines',
                'Vacuum Cleaners',
                'Air Purifiers',
            ],

            'Fashion' => [
                'Men Clothing',
                'Women Clothing',
                'Men Shoes',
                'Women Shoes',
                'Bags',
                'Watches',
            ],
        ];

        foreach ($categories as $parentName => $children) {

            $parent = Category::create([
                'name' => $parentName,
                'status' => true,
            ]);

            foreach ($children as $childName) {
                Category::create([
                    'name' => $childName,
                    'status' => true,
                    'parent_id' => $parent->id,
                ]);
            }
        }
    }
}