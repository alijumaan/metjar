<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            /*
            |--------------------------------------------------------------------------
            | ELECTRONICS
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'Apple AirPods Pro 2',
                'slug' => 'airpods-pro-2',
                'description' => 'سماعة Apple AirPods Pro 2 اللاسلكية بتقنية إلغاء الضوضاء النشط وصوت عالي الجودة.',
                'details' => 'إلغاء ضوضاء نشط، وضع الشفافية، شحن MagSafe، مقاومة للماء والعرق، اتصال لاسلكي.',
                'price' => 899,
                'quantity' => 32,
                'category' => 'Headphones',
                'featured' => true,
            ],

            [
                'name' => 'Sony WH-1000XM5',
                'slug' => 'sony-wh1000xm5',
                'description' => 'سماعة Sony WH-1000XM5 اللاسلكية بتقنية إلغاء الضوضاء وصوت عالي الدقة.',
                'details' => 'إلغاء ضوضاء متطور، اتصال Bluetooth، بطارية طويلة، ميكروفونات متعددة للمكالمات.',
                'price' => 1299,
                'quantity' => 15,
                'category' => 'Headphones',
                'featured' => true,
            ],

            [
                'name' => 'Samsung Galaxy S25 Ultra',
                'slug' => 'galaxy-s25-ultra',
                'description' => 'هاتف Samsung Galaxy S25 Ultra الرائد بتصميم فاخر وكاميرا احترافية.',
                'details' => 'شاشة Dynamic AMOLED، كاميرا عالية الدقة، S Pen، بطارية 5000mAh، ذاكرة 256GB.',
                'price' => 4899,
                'quantity' => 18,
                'category' => 'Smartphones',
                'featured' => true,
            ],

            [
                'name' => 'Apple MacBook Air M3',
                'slug' => 'macbook-air-m3',
                'description' => 'Apple MacBook Air بمعالج M3 وتصميم نحيف وخفيف للاستخدام اليومي والعمل.',
                'details' => 'شريحة Apple M3، شاشة Liquid Retina، ذاكرة 8GB، تخزين 256GB، تصميم نحيف.',
                'price' => 4499,
                'quantity' => 10,
                'category' => 'Laptops',
                'featured' => true,
            ],

            [
                'name' => 'Logitech K380 Keyboard',
                'slug' => 'logitech-k380',
                'description' => 'لوحة مفاتيح Logitech K380 اللاسلكية صغيرة الحجم ومتعددة الأجهزة.',
                'details' => 'اتصال Bluetooth، تصميم مدمج، دعم عدة أجهزة، بطارية طويلة.',
                'price' => 179,
                'quantity' => 40,
                'category' => 'Keyboards & Mice',
                'featured' => false,
            ],

            [
                'name' => 'JBL Charge 5',
                'slug' => 'jbl-charge-5',
                'description' => 'سماعة JBL Charge 5 المحمولة بصوت قوي وبطارية طويلة.',
                'details' => 'صوت JBL Pro، Bluetooth، مقاومة للماء والغبار، بطارية تصل إلى 20 ساعة.',
                'price' => 649,
                'quantity' => 22,
                'category' => 'Speakers',
                'featured' => true,
            ],

            [
                'name' => 'SanDisk Ultra 128GB',
                'slug' => 'sandisk-ultra-128gb',
                'description' => 'ذاكرة فلاش SanDisk Ultra بسعة 128GB لنقل وتخزين الملفات بسهولة.',
                'details' => 'سعة 128GB، USB 3.0، تصميم صغير، مناسبة للملفات والصور والفيديو.',
                'price' => 59,
                'quantity' => 75,
                'category' => 'USB Flash Drives',
                'featured' => false,
            ],

            [
                'name' => 'Apple Watch Series 10',
                'slug' => 'apple-watch-series-10',
                'description' => 'Apple Watch Series 10 بتصميم عصري وشاشة كبيرة ومزايا ذكية متقدمة.',
                'details' => 'شاشة Retina، تتبع النشاط، إشعارات، مراقبة التمارين، مقاومة للماء.',
                'price' => 1699,
                'quantity' => 14,
                'category' => 'Smart Watches',
                'featured' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | FASHION
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'Casio G-Shock GA-2100',
                'slug' => 'casio-gshock-ga2100',
                'description' => 'ساعة Casio G-Shock GA-2100 بتصميم رياضي قوي وعصري.',
                'details' => 'مقاومة للصدمات، مقاومة للماء، تصميم رياضي، عرض رقمي وعقارب.',
                'price' => 449,
                'quantity' => 20,
                'category' => 'Watches',
                'featured' => true,
            ],

            [
                'name' => 'Nike Air Max 270',
                'slug' => 'nike-air-max-270',
                'description' => 'حذاء Nike Air Max 270 بتصميم رياضي مريح للاستخدام اليومي.',
                'details' => 'وسادة Air Max، تصميم خفيف، نعل مريح، مناسب للاستخدام اليومي.',
                'price' => 599,
                'quantity' => 16,
                'category' => 'Men Shoes',
                'featured' => true,
            ],

            [
                'name' => 'Adidas Ultraboost Light',
                'slug' => 'adidas-ultraboost-light',
                'description' => 'حذاء Adidas Ultraboost Light بتقنية توسيد متقدمة وراحة عالية.',
                'details' => 'تقنية Boost، تصميم خفيف، نعل مرن، مناسب للجري والمشي.',
                'price' => 699,
                'quantity' => 12,
                'category' => 'Men Shoes',
                'featured' => true,
            ],

            [
                'name' => 'Nike Air Force 1',
                'slug' => 'nike-air-force-1',
                'description' => 'Nike Air Force 1 بتصميم كلاسيكي مناسب للإطلالات اليومية.',
                'details' => 'تصميم كلاسيكي، نعل مطاطي، خامة متينة، مناسب للاستخدام اليومي.',
                'price' => 499,
                'quantity' => 25,
                'category' => 'Men Shoes',
                'featured' => true,
            ],

            [
                'name' => 'Adidas Stan Smith',
                'slug' => 'adidas-stan-smith',
                'description' => 'حذاء Adidas Stan Smith بتصميم كلاسيكي بسيط وأنيق.',
                'details' => 'تصميم منخفض، نعل مطاطي، مظهر كلاسيكي، مناسب للإطلالات اليومية.',
                'price' => 429,
                'quantity' => 19,
                'category' => 'Men Shoes',
                'featured' => false,
            ],

            [
                'name' => "Levi's 501 Original Jeans",
                'slug' => 'levis-501-jeans',
                'description' => 'بنطال Levi’s 501 Original Jeans بقصة كلاسيكية وخامة متينة.',
                'details' => 'قصة مستقيمة، خامة Denim، تصميم كلاسيكي، مناسب للاستخدام اليومي.',
                'price' => 299,
                'quantity' => 30,
                'category' => 'Men Clothing',
                'featured' => true,
            ],

            [
                'name' => 'Nike Sportswear Hoodie',
                'slug' => 'nike-sportswear-hoodie',
                'description' => 'هودي Nike Sportswear بتصميم رياضي عصري وخامة مريحة.',
                'details' => 'خامة قطنية، غطاء رأس، جيب أمامي، تصميم رياضي.',
                'price' => 299,
                'quantity' => 28,
                'category' => 'Men Clothing',
                'featured' => true,
            ],

            [
                'name' => 'Zara Basic T-Shirt',
                'slug' => 'zara-basic-tshirt',
                'description' => 'تيشيرت Zara Basic بتصميم بسيط مناسب للإطلالات اليومية.',
                'details' => 'قصة عادية، خامة ناعمة، تصميم أساسي، مناسب للاستخدام اليومي.',
                'price' => 119,
                'quantity' => 45,
                'category' => 'Men Clothing',
                'featured' => false,
            ],

            [
                'name' => 'Adidas Essentials Hoodie',
                'slug' => 'adidas-essentials-hoodie',
                'description' => 'هودي Adidas Essentials بتصميم عصري ومريح.',
                'details' => 'خامة مريحة، غطاء رأس، تصميم رياضي، مناسب للاستخدام اليومي.',
                'price' => 279,
                'quantity' => 24,
                'category' => 'Men Clothing',
                'featured' => false,
            ],

            [
                'name' => 'Nike Sportswear Kids Set',
                'slug' => 'nike-kids-set',
                'description' => 'طقم Nike Sportswear للأطفال بتصميم رياضي مريح.',
                'details' => 'طقم رياضي، خامة مريحة، تصميم مناسب للاستخدام اليومي.',
                'price' => 229,
                'quantity' => 20,
                'category' => 'Women Clothing',
                'featured' => false,
            ],

            /*
            |--------------------------------------------------------------------------
            | MORE ELECTRONICS
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'Samsung Galaxy Buds3 Pro',
                'slug' => 'galaxy-buds3-pro',
                'description' => 'سماعات Samsung Galaxy Buds3 Pro اللاسلكية بصوت عالي الجودة.',
                'details' => 'إلغاء ضوضاء، Bluetooth، صوت عالي الدقة، علبة شحن لاسلكية.',
                'price' => 699,
                'quantity' => 21,
                'category' => 'Headphones',
                'featured' => true,
            ],

            [
                'name' => 'Apple Magic Keyboard',
                'slug' => 'apple-magic-keyboard',
                'description' => 'لوحة مفاتيح Apple Magic Keyboard بتصميم نحيف وتجربة كتابة مريحة.',
                'details' => 'اتصال لاسلكي، تصميم نحيف، بطارية قابلة للشحن، متوافقة مع أجهزة Apple.',
                'price' => 399,
                'quantity' => 17,
                'category' => 'Keyboards & Mice',
                'featured' => false,
            ],
        ];

        foreach ($products as $productData) {

            $category = Category::where(
                'name',
                $productData['category']
            )->first();

            if (!$category) {
                continue;
            }

            Product::updateOrCreate(
                [
                    'slug' => $productData['slug'],
                ],
                [
                    'name' => $productData['name'],
                    'description' => $productData['description'],
                    'details' => $productData['details'],
                    'price' => $productData['price'],
                    'quantity' => $productData['quantity'],
                    'category_id' => $category->id,
                    'featured' => $productData['featured'],
                    'status' => true,
                ]
            );
        }

        $this->command?->info(
            Product::count() . ' products seeded successfully.'
        );
    }
}