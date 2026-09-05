<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductTagTableSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::pluck('id', 'name');

        $productTags = [

            'Apple AirPods Pro 2' => [
                'Apple',
            ],

            'Sony WH-1000XM5' => [
                'Sony',
            ],

            'Samsung Galaxy S25 Ultra' => [
                'Samsung',
            ],

            'Apple MacBook Air M3' => [
                'Apple',
                'Mac',
            ],

            'Logitech K380 Keyboard' => [
                'Logitech',
            ],

            'JBL Charge 5' => [
                'JBL',
            ],

            'SanDisk Ultra 128GB' => [
                'SanDisk',
            ],

            'Apple Watch Series 10' => [
                'Apple',
            ],

            'Casio G-Shock GA-2100' => [
                'Casio',
            ],

            'Nike Air Max 270' => [
                'Nike',
            ],

            'Adidas Ultraboost Light' => [
                'Adidas',
            ],

            'Nike Air Force 1' => [
                'Nike',
            ],

            'Adidas Stan Smith' => [
                'Adidas',
            ],

            "Levi's 501 Original Jeans" => [
                'Levi’s',
            ],

            'Nike Sportswear Hoodie' => [
                'Nike',
            ],

            'Zara Basic T-Shirt' => [
                'Zara',
            ],

            'Adidas Essentials Hoodie' => [
                'Adidas',
            ],

            'Nike Sportswear Kids Set' => [
                'Nike',
            ],

            'Samsung Galaxy Buds3 Pro' => [
                'Samsung',
            ],

            'Apple Magic Keyboard' => [
                'Apple',
            ],
        ];

        foreach ($productTags as $productName => $tagNames) {

            $product = Product::where(
                'name',
                $productName
            )->first();

            if (!$product) {
                continue;
            }

            $tagIds = collect($tagNames)
                ->map(fn ($tagName) => $tags[$tagName] ?? null)
                ->filter()
                ->values()
                ->toArray();

            $product->tags()->sync($tagIds);
        }

        $this->command?->info(
            'Product tags synced successfully.'
        );
    }
}