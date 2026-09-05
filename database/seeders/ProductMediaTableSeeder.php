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

        /*
         * حذف الصور القديمة
         */
        foreach (File::files($path) as $file) {
            File::delete($file->getPathname());
        }

        /*
         * حذف Media القديمة
         */
        Product::query()->each(function (Product $product) {
            $product->media()->delete();
        });

        /*
         * إنشاء صورة SVG لكل منتج
         */
        Product::query()
            ->with('category')
            ->orderBy('id')
            ->get()
            ->each(function (Product $product) use ($path) {

                $slug = $product->slug ?: 'product-' . $product->id;

                $fileName = $slug . '.svg';

                $svg = $this->makeProductSvg($product);

                $filePath = "{$path}/{$fileName}";

                File::put($filePath, $svg);

                $product->media()->create([
                    'file_name' => $fileName,
                    'file_type' => 'image/svg+xml',
                    'file_size' => filesize($filePath),
                    'file_status' => true,
                    'file_sort' => 0,
                ]);
            });

        $this->command?->info(
            Product::count() . ' product images generated successfully.'
        );
    }

    /*
     * =========================================================
     * Generate Product SVG
     * =========================================================
     */
    private function makeProductSvg(Product $product): string
    {
        $name = htmlspecialchars(
            $product->name,
            ENT_XML1 | ENT_QUOTES,
            'UTF-8'
        );

        $category = htmlspecialchars(
            $product->category?->name ?? 'PRODUCT',
            ENT_XML1 | ENT_QUOTES,
            'UTF-8'
        );

        $style = $this->detectProductStyle(
            $product->name . ' ' . $category
        );

        return match ($style) {

            'phone' => $this->phoneSvg(
                $name,
                $category
            ),

            'headphone' => $this->headphoneSvg(
                $name,
                $category
            ),

            'watch' => $this->watchSvg(
                $name,
                $category
            ),

            'laptop' => $this->laptopSvg(
                $name,
                $category
            ),

            'shoe' => $this->shoeSvg(
                $name,
                $category
            ),

            'clothing' => $this->clothingSvg(
                $name,
                $category
            ),

            default => $this->genericSvg(
                $name,
                $category
            ),
        };
    }

    /*
     * =========================================================
     * Detect Product Type
     * =========================================================
     */
    private function detectProductStyle(string $text): string
    {
        $text = strtolower($text);

        if (
            str_contains($text, 'iphone') ||
            str_contains($text, 'galaxy s') ||
            str_contains($text, 'smartphone') ||
            str_contains($text, 'phone')
        ) {
            return 'phone';
        }

        if (
            str_contains($text, 'airpods') ||
            str_contains($text, 'buds') ||
            str_contains($text, 'headphone') ||
            str_contains($text, 'headset')
        ) {
            return 'headphone';
        }

        if (
            str_contains($text, 'watch') ||
            str_contains($text, 'g-shock')
        ) {
            return 'watch';
        }

        if (
            str_contains($text, 'macbook') ||
            str_contains($text, 'laptop') ||
            str_contains($text, 'notebook') ||
            str_contains($text, 'dell xps')
        ) {
            return 'laptop';
        }

        if (
            str_contains($text, 'nike air') ||
            str_contains($text, 'adidas') ||
            str_contains($text, 'shoe') ||
            str_contains($text, 'sneaker') ||
            str_contains($text, 'ultraboost')
        ) {
            return 'shoe';
        }

        if (
            str_contains($text, 'shirt') ||
            str_contains($text, 't-shirt') ||
            str_contains($text, 'hoodie') ||
            str_contains($text, 'jeans') ||
            str_contains($text, 'jacket') ||
            str_contains($text, 'clothing')
        ) {
            return 'clothing';
        }

        return 'generic';
    }

    /*
     * =========================================================
     * PHONE
     * =========================================================
     */
    private function phoneSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#111827"/>
            <stop offset="100%" stop-color="#374151"/>
        </linearGradient>

        <linearGradient id="phone"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#e5e7eb"/>
            <stop offset="100%" stop-color="#6b7280"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <circle cx="760"
            cy="180"
            r="180"
            fill="#ffffff"
            opacity=".04"/>

    <rect x="350"
          y="130"
          width="300"
          height="570"
          rx="42"
          fill="url(#phone)"
          transform="rotate(-7 500 415)"/>

    <rect x="370"
          y="155"
          width="260"
          height="515"
          rx="30"
          fill="#0f172a"
          transform="rotate(-7 500 415)"/>

    <circle cx="500"
            cy="640"
            r="8"
            fill="#ffffff"
            opacity=".5"/>

    <text x="500"
          y="790"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="34"
          font-weight="700">
        {$name}
    </text>

    <text x="500"
          y="835"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".55"
          font-family="Arial, Helvetica, sans-serif"
          font-size="20">
        {$category}
    </text>

</svg>
SVG;
    }

    /*
     * =========================================================
     * HEADPHONES
     * =========================================================
     */
    private function headphoneSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#020617"/>
            <stop offset="100%" stop-color="#334155"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <path d="M300 470
             C300 210 700 210 700 470"
          fill="none"
          stroke="#f8fafc"
          stroke-width="70"
          stroke-linecap="round"/>

    <rect x="245"
          y="440"
          width="150"
          height="250"
          rx="60"
          fill="#111827"
          stroke="#ffffff"
          stroke-width="10"/>

    <rect x="605"
          y="440"
          width="150"
          height="250"
          rx="60"
          fill="#111827"
          stroke="#ffffff"
          stroke-width="10"/>

    <text x="500"
          y="800"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="34"
          font-weight="700">
        {$name}
    </text>

    <text x="500"
          y="845"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".55"
          font-family="Arial, Helvetica, sans-serif"
          font-size="20">
        {$category}
    </text>

</svg>
SVG;
    }

    /*
     * =========================================================
     * WATCH
     * =========================================================
     */
    private function watchSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#0f172a"/>
            <stop offset="100%" stop-color="#475569"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <rect x="410"
          y="120"
          width="180"
          height="200"
          rx="40"
          fill="#111827"/>

    <rect x="350"
          y="270"
          width="300"
          height="360"
          rx="80"
          fill="#020617"
          stroke="#94a3b8"
          stroke-width="14"/>

    <rect x="390"
          y="310"
          width="220"
          height="280"
          rx="45"
          fill="#0f172a"/>

    <circle cx="500"
            cy="450"
            r="80"
            fill="none"
            stroke="#64748b"
            stroke-width="8"/>

    <line x1="500"
          y1="450"
          x2="500"
          y2="395"
          stroke="#ffffff"
          stroke-width="8"
          stroke-linecap="round"/>

    <line x1="500"
          y1="450"
          x2="540"
          y2="480"
          stroke="#ffffff"
          stroke-width="8"
          stroke-linecap="round"/>

    <rect x="410"
          y="610"
          width="180"
          height="200"
          rx="40"
          fill="#111827"/>

    <text x="500"
          y="870"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="32"
          font-weight="700">
        {$name}
    </text>

</svg>
SVG;
    }

    /*
     * =========================================================
     * LAPTOP
     * =========================================================
     */
    private function laptopSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#172033"/>
            <stop offset="100%" stop-color="#64748b"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <rect x="250"
          y="220"
          width="500"
          height="330"
          rx="25"
          fill="#cbd5e1"/>

    <rect x="275"
          y="245"
          width="450"
          height="280"
          rx="15"
          fill="#020617"/>

    <rect x="170"
          y="550"
          width="660"
          height="45"
          rx="22"
          fill="#94a3b8"/>

    <path d="M230 595
             L770 595
             L700 680
             L300 680 Z"
          fill="#64748b"/>

    <text x="500"
          y="790"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="32"
          font-weight="700">
        {$name}
    </text>

    <text x="500"
          y="835"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".55"
          font-family="Arial, Helvetica, sans-serif"
          font-size="20">
        {$category}
    </text>

</svg>
SVG;
    }

    /*
     * =========================================================
     * SHOE
     * =========================================================
     */
    private function shoeSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#0f172a"/>
            <stop offset="100%" stop-color="#475569"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <path d="M180 570
             C270 530 350 470 430 390
             L540 500
             C590 550 690 570 790 600
             C850 620 870 680 820 710
             L230 710
             C150 710 130 620 180 570Z"
          fill="#f8fafc"/>

    <path d="M430 390
             L540 500
             C590 550 690 570 790 600"
          fill="none"
          stroke="#94a3b8"
          stroke-width="18"/>

    <path d="M220 665
             L820 665"
          stroke="#0f172a"
          stroke-width="20"
          stroke-linecap="round"/>

    <text x="500"
          y="800"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="32"
          font-weight="700">
        {$name}
    </text>

    <text x="500"
          y="845"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".55"
          font-family="Arial, Helvetica, sans-serif"
          font-size="20">
        {$category}
    </text>

</svg>
SVG;
    }

    /*
     * =========================================================
     * CLOTHING
     * =========================================================
     */
    private function clothingSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#111827"/>
            <stop offset="100%" stop-color="#52525b"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <path d="M400 280
             L330 330
             L210 410
             L280 530
             L370 470
             L370 730
             L630 730
             L630 470
             L720 530
             L790 410
             L670 330
             L600 280
             C570 330 430 330 400 280Z"
          fill="#f8fafc"/>

    <path d="M430 285
             C450 350 550 350 570 285"
          fill="none"
          stroke="#cbd5e1"
          stroke-width="14"/>

    <text x="500"
          y="810"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="32"
          font-weight="700">
        {$name}
    </text>

    <text x="500"
          y="855"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".55"
          font-family="Arial, Helvetica, sans-serif"
          font-size="20">
        {$category}
    </text>

</svg>
SVG;
    }

    /*
     * =========================================================
     * GENERIC
     * =========================================================
     */
    private function genericSvg(
        string $name,
        string $category
    ): string {
        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg"
     width="1000"
     height="1000"
     viewBox="0 0 1000 1000">

    <defs>
        <linearGradient id="bg"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1">
            <stop offset="0%" stop-color="#111827"/>
            <stop offset="100%" stop-color="#64748b"/>
        </linearGradient>
    </defs>

    <rect width="1000"
          height="1000"
          rx="50"
          fill="url(#bg)"/>

    <circle cx="500"
            cy="400"
            r="180"
            fill="#ffffff"
            opacity=".07"/>

    <circle cx="500"
            cy="400"
            r="110"
            fill="none"
            stroke="#ffffff"
            stroke-width="3"
            opacity=".25"/>

    <rect x="390"
          y="290"
          width="220"
          height="220"
          rx="35"
          fill="#ffffff"
          opacity=".08"
          stroke="#ffffff"
          stroke-width="4"/>

    <text x="500"
          y="780"
          text-anchor="middle"
          fill="#ffffff"
          font-family="Arial, Helvetica, sans-serif"
          font-size="32"
          font-weight="700">
        {$name}
    </text>

    <text x="500"
          y="825"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".55"
          font-family="Arial, Helvetica, sans-serif"
          font-size="20">
        {$category}
    </text>

    <text x="500"
          y="875"
          text-anchor="middle"
          fill="#ffffff"
          opacity=".35"
          font-family="Arial, Helvetica, sans-serif"
          font-size="16"
          letter-spacing="4">
        PREMIUM STORE
    </text>

</svg>
SVG;
    }
}