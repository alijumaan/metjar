<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductMediaTableSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/images/products');

        File::ensureDirectoryExists($path);

        $products = [
            'airpods-pro-2' => ['Apple AirPods Pro 2', '#111827', '#ffffff'],
            'sony-wh1000xm5' => ['Sony WH-1000XM5', '#1f2937', '#ffffff'],
            'galaxy-s25-ultra' => ['Samsung Galaxy S25 Ultra', '#334155', '#ffffff'],
            'macbook-air-m3' => ['Apple MacBook Air M3', '#64748b', '#ffffff'],
            'logitech-k380' => ['Logitech K380 Keyboard', '#7c3aed', '#ffffff'],
            'jbl-charge-5' => ['JBL Charge 5', '#f97316', '#ffffff'],
            'sandisk-ultra-128gb' => ['SanDisk Ultra 128GB', '#dc2626', '#ffffff'],
            'apple-watch-series-10' => ['Apple Watch Series 10', '#0f172a', '#ffffff'],
            'casio-gshock-ga2100' => ['Casio G-Shock GA-2100', '#111827', '#ffffff'],
            'nike-air-max-270' => ['Nike Air Max 270', '#2563eb', '#ffffff'],
            'adidas-ultraboost-light' => ['Adidas Ultraboost Light', '#16a34a', '#ffffff'],
            'nike-air-force-1' => ['Nike Air Force 1', '#f8fafc', '#111827'],
            'adidas-stan-smith' => ['Adidas Stan Smith', '#22c55e', '#ffffff'],
            'levis-501-jeans' => ["Levi's 501 Original Jeans", '#1d4ed8', '#ffffff'],
            'nike-sportswear-hoodie' => ['Nike Sportswear Hoodie', '#374151', '#ffffff'],
            'zara-basic-tshirt' => ['Zara Basic T-Shirt', '#e5e7eb', '#111827'],
            'adidas-essentials-hoodie' => ['Adidas Essentials Hoodie', '#9333ea', '#ffffff'],
            'nike-kids-set' => ['Nike Sportswear Kids Set', '#0891b2', '#ffffff'],
            'galaxy-buds3-pro' => ['Samsung Galaxy Buds3 Pro', '#e2e8f0', '#111827'],
            'apple-magic-keyboard' => ['Apple Magic Keyboard', '#94a3b8', '#ffffff'],
        ];

        /*
         * حذف الصور القديمة
         */
        foreach (File::files($path) as $file) {
            File::delete($file->getPathname());
        }

        /*
         * حذف Media القديمة للمنتجات
         */
        Product::query()->each(function (Product $product) {
            $product->media()->delete();
        });

        /*
         * إنشاء الصور وربطها بالمنتجات
         */
        Product::query()
            ->orderBy('id')
            ->get()
            ->each(function (Product $product, $index) use ($products, $path) {

                $data = array_values($products);

                /*
                 * نعيد استخدام المنتجات الـ 20 بالترتيب.
                 */
                if (!isset($data[$index])) {
                    return;
                }

                [$name, $background, $text] = $data[$index];

                $slug = array_keys($products)[$index];

                $fileName = "{$slug}.svg";

                $svg = $this->makeSvg(
                    $name,
                    $background,
                    $text
                );

                File::put(
                    "{$path}/{$fileName}",
                    $svg
                );

                /*
                 * تسجيل الصورة في جدول media
                 */
                $product->media()->create([
                    'file_name' => $fileName,
                    'file_type' => 'image/svg+xml',
                    'file_size' => filesize("{$path}/{$fileName}"),
                    'file_status' => true,
                    'file_sort' => 0,
                ]);
            });

        $this->command?->info(
            Product::count() . ' products processed successfully.'
        );
    }

    private function makeSvg(
        string $name,
        string $background,
        string $text
    ): string {
        $escapedName = htmlspecialchars(
            $name,
            ENT_XML1 | ENT_QUOTES,
            'UTF-8'
        );

        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="gradient"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="{$background}"/>
            <stop offset="100%" stop-color="#111827"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="40"
          fill="url(#gradient)"/>

    <circle cx="500"
            cy="390"
            r="210"
            fill="#ffffff"
            opacity="0.08"/>

    <circle cx="500"
            cy="390"
            r="150"
            fill="#ffffff"
            opacity="0.06"/>

    <rect x="180"
          y="650"
          width="640"
          height="2"
          fill="{$text}"
          opacity="0.3"/>

    <text x="500"
          y="720"
          text-anchor="middle"
          fill="{$text}"
          font-family="Arial, Helvetica, sans-serif"
          font-size="38"
          font-weight="700">
        {$escapedName}
    </text>

    <text x="500"
          y="775"
          text-anchor="middle"
          fill="{$text}"
          opacity="0.65"
          font-family="Arial, Helvetica, sans-serif"
          font-size="22">
        TEST PRODUCT
    </text>

</svg>
SVG;
    }
}