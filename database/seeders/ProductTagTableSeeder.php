<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    public function run()
    {
        $tags = Tag::pluck('id', 'name');

        $productTags = [
            'Apple iPhone 16 Pro 256GB' => ['Apple'],
            'Samsung Galaxy S25 Ultra 256GB' => ['Samsung'],
            'Apple MacBook Air M3 15-inch' => ['Apple', 'Mac'],
            'Dell XPS 13' => ['Dell'],
            'Sony WH-1000XM5' => ['Sony'],
            'Apple AirPods Pro 2' => ['Apple'],
            'JBL Charge 5' => ['JBL'],
            'Apple Watch Series 10' => ['Apple'],
            'Samsung Galaxy Watch 7' => ['Samsung'],
            'Logitech MX Master 3S' => ['Logitech'],
            'Logitech MX Keys S' => ['Logitech'],
            'Samsung T7 Portable SSD 1TB' => ['Samsung'],
            'Anker PowerCore 20,000mAh' => ['Anker'],
            'PlayStation 5 Slim' => ['PlayStation', 'Sony'],
            'Xbox Series X' => ['Xbox', 'Microsoft'],
            'Razer BlackShark V2 Pro' => ['Razer'],
            'Corsair K70 RGB Pro' => ['Corsair', 'Razer'],
            'Xiaomi Robot Vacuum S10' => ['Xiaomi'],
            'DeLonghi Hot & Cold Coffee Machine' => [],
            'Apple MagSafe Charger' => ['Apple'],
        ];

        foreach ($productTags as $productName => $tagNames) {

            $product = Product::where('name', $productName)->first();

            if (!$product) {
                continue;
            }

            $tagIds = collect($tagNames)
                ->map(fn ($tag) => $tags[$tag] ?? null)
                ->filter()
                ->values()
                ->toArray();

            $product->tags()->sync($tagIds);
        }
    }
}