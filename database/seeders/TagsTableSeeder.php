<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Apple',
            'Samsung',
            'Sony',
            'Microsoft',
            'Dell',
            'HP',
            'Lenovo',
            'ASUS',
            'Acer',
            'LG',
            'JBL',
            'Anker',
            'Logitech',
            'Corsair',
            'Razer',
            'Xiaomi',
            'Huawei',
            'Nintendo',
            'PlayStation',
            'Xbox',

            // New brands
            'Mac',
            'Nike',
            'Adidas',
            'Casio',
            'Levi’s',
            'Zara',
            'SanDisk',
            'DeLonghi',
        ];

        foreach ($tags as $tag) {

            Tag::updateOrCreate(
                [
                    'name' => $tag,
                ],
                []
            );
        }
    }
}