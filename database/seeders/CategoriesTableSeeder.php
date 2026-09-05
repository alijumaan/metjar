<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
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

            $parent = Category::updateOrCreate(
                [
                    'name' => $parentName,
                    'parent_id' => null,
                ],
                [
                    'status' => true,
                ]
            );

            foreach ($children as $childName) {

                Category::updateOrCreate(
                    [
                        'name' => $childName,
                        'parent_id' => $parent->id,
                    ],
                    [
                        'status' => true,
                    ]
                );
            }
        }
    }
}