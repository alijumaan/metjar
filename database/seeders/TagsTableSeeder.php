<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
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
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
            ]);
        }
    }
}