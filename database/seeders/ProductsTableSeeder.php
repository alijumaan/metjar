<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Apple iPhone 16 Pro 256GB',
                'slug' => 'apple-iphone-16-pro-256gb',
                'description' => 'هاتف iPhone 16 Pro بشاشة Super Retina XDR وتصميم من التيتانيوم وكاميرا احترافية.',
                'details' => 'شريحة A18 Pro، شاشة 6.3 بوصة، ذاكرة تخزين 256GB، كاميرا Pro، دعم USB-C.',
                'price' => 4299,
                'quantity' => 25,
                'category' => 'Smartphones',
                'featured' => true,
            ],

            [
                'name' => 'Samsung Galaxy S25 Ultra 256GB',
                'slug' => 'samsung-galaxy-s25-ultra-256gb',
                'description' => 'هاتف سامسونج الرائد مع شاشة Dynamic AMOLED 2X وكاميرا احترافية وقلم S Pen.',
                'details' => 'شاشة 6.9 بوصة، ذاكرة 256GB، كاميرا 200MP، S Pen، بطارية 5000mAh.',
                'price' => 4899,
                'quantity' => 18,
                'category' => 'Smartphones',
                'featured' => true,
            ],

            [
                'name' => 'Apple MacBook Air M3 15-inch',
                'slug' => 'apple-macbook-air-m3-15-inch',
                'description' => 'MacBook Air بشريحة Apple M3 وشاشة Liquid Retina مقاس 15 بوصة.',
                'details' => 'شريحة Apple M3، ذاكرة 8GB، تخزين SSD 256GB، شاشة 15.3 بوصة.',
                'price' => 4799,
                'quantity' => 12,
                'category' => 'Laptops',
                'featured' => true,
            ],

            [
                'name' => 'Dell XPS 13',
                'slug' => 'dell-xps-13',
                'description' => 'حاسوب محمول أنيق وخفيف من Dell مناسب للعمل والدراسة والاستخدام اليومي.',
                'details' => 'Intel Core Ultra 7، ذاكرة 16GB، SSD 512GB، شاشة 13.4 بوصة.',
                'price' => 4599,
                'quantity' => 10,
                'category' => 'Laptops',
                'featured' => true,
            ],

            [
                'name' => 'Sony WH-1000XM5',
                'slug' => 'sony-wh-1000xm5',
                'description' => 'سماعات Sony اللاسلكية الرائدة مع تقنية عزل الضوضاء النشطة.',
                'details' => 'عزل ضوضاء متقدم، Bluetooth، ميكروفونات متعددة، بطارية تصل إلى 30 ساعة.',
                'price' => 1299,
                'quantity' => 35,
                'category' => 'Headphones',
                'featured' => true,
            ],

            [
                'name' => 'Apple AirPods Pro 2',
                'slug' => 'apple-airpods-pro-2',
                'description' => 'سماعات AirPods Pro من Apple مع عزل ضوضاء نشط وصوت مكاني.',
                'details' => 'Active Noise Cancellation، Transparency Mode، USB-C، Spatial Audio.',
                'price' => 899,
                'quantity' => 50,
                'category' => 'Headphones',
                'featured' => true,
            ],

            [
                'name' => 'JBL Charge 5',
                'slug' => 'jbl-charge-5',
                'description' => 'سماعة JBL محمولة بصوت قوي وبطارية طويلة ومقاومة للماء.',
                'details' => 'Bluetooth 5.1، مقاومة ماء IP67، بطارية تصل إلى 20 ساعة.',
                'price' => 599,
                'quantity' => 30,
                'category' => 'Speakers',
                'featured' => false,
            ],

            [
                'name' => 'Apple Watch Series 10',
                'slug' => 'apple-watch-series-10',
                'description' => 'ساعة Apple Watch Series 10 بتصميم أنيق وشاشة أكبر وميزات صحية متقدمة.',
                'details' => 'شاشة Retina، GPS، مقاومة للماء، مراقبة النشاط والصحة.',
                'price' => 1799,
                'quantity' => 20,
                'category' => 'Smart Watches',
                'featured' => true,
            ],

            [
                'name' => 'Samsung Galaxy Watch 7',
                'slug' => 'samsung-galaxy-watch-7',
                'description' => 'ساعة Samsung الذكية مع تتبع النشاط والصحة وتصميم عصري.',
                'details' => 'شاشة Super AMOLED، GPS، تتبع النوم والرياضة، مقاومة للماء.',
                'price' => 1199,
                'quantity' => 22,
                'category' => 'Smart Watches',
                'featured' => false,
            ],

            [
                'name' => 'Logitech MX Master 3S',
                'slug' => 'logitech-mx-master-3s',
                'description' => 'ماوس احترافي للعمل والإنتاجية مع مستشعر عالي الدقة وتصميم مريح.',
                'details' => 'دقة 8000 DPI، اتصال Bluetooth، USB-C، يدعم عدة أجهزة.',
                'price' => 399,
                'quantity' => 40,
                'category' => 'Keyboards & Mice',
                'featured' => false,
            ],

            [
                'name' => 'Logitech MX Keys S',
                'slug' => 'logitech-mx-keys-s',
                'description' => 'لوحة مفاتيح لاسلكية احترافية مصممة للإنتاجية والكتابة المريحة.',
                'details' => 'إضاءة خلفية، Bluetooth، USB-C، اتصال متعدد الأجهزة.',
                'price' => 449,
                'quantity' => 25,
                'category' => 'Keyboards & Mice',
                'featured' => false,
            ],

            [
                'name' => 'Samsung T7 Portable SSD 1TB',
                'slug' => 'samsung-t7-portable-ssd-1tb',
                'description' => 'قرص SSD محمول سريع من Samsung بسعة 1TB.',
                'details' => 'سعة 1TB، USB 3.2، سرعة نقل عالية، تصميم صغير ومتين.',
                'price' => 399,
                'quantity' => 45,
                'category' => 'Storage',
                'featured' => false,
            ],

            [
                'name' => 'Anker PowerCore 20,000mAh',
                'slug' => 'anker-powercore-20000mah',
                'description' => 'بطارية متنقلة عالية السعة من Anker لشحن الأجهزة أثناء التنقل.',
                'details' => 'سعة 20000mAh، منافذ USB متعددة، نظام حماية متقدم.',
                'price' => 199,
                'quantity' => 60,
                'category' => 'Power Banks',
                'featured' => false,
            ],

            [
                'name' => 'PlayStation 5 Slim',
                'slug' => 'playstation-5-slim',
                'description' => 'جهاز PlayStation 5 Slim بتصميم أصغر وأداء ألعاب من الجيل الجديد.',
                'details' => 'SSD 1TB، دعم 4K، يد DualSense، قارئ أقراص.',
                'price' => 2299,
                'quantity' => 15,
                'category' => 'PlayStation',
                'featured' => true,
            ],

            [
                'name' => 'Xbox Series X',
                'slug' => 'xbox-series-x',
                'description' => 'جهاز Xbox Series X لألعاب الجيل الجديد بأداء عالي ودقة تصل إلى 4K.',
                'details' => 'SSD 1TB، دقة 4K، معدل إطارات مرتفع، يد Xbox Wireless.',
                'price' => 2199,
                'quantity' => 14,
                'category' => 'Xbox',
                'featured' => true,
            ],

            [
                'name' => 'Razer BlackShark V2 Pro',
                'slug' => 'razer-blackshark-v2-pro',
                'description' => 'سماعة ألعاب لاسلكية احترافية من Razer.',
                'details' => 'اتصال لاسلكي، ميكروفون احترافي، صوت محيطي، بطارية طويلة.',
                'price' => 699,
                'quantity' => 20,
                'category' => 'Gaming Headsets',
                'featured' => false,
            ],

            [
                'name' => 'Corsair K70 RGB Pro',
                'slug' => 'corsair-k70-rgb-pro',
                'description' => 'لوحة مفاتيح ميكانيكية احترافية للألعاب من Corsair.',
                'details' => 'مفاتيح ميكانيكية، RGB، هيكل ألمنيوم، USB-C.',
                'price' => 749,
                'quantity' => 16,
                'category' => 'Gaming Accessories',
                'featured' => false,
            ],

            [
                'name' => 'Xiaomi Robot Vacuum S10',
                'slug' => 'xiaomi-robot-vacuum-s10',
                'description' => 'مكنسة روبوت ذكية من Xiaomi للتنظيف الآلي للأرضيات.',
                'details' => 'تنظيف ومسح، خرائط ذكية، تحكم عبر التطبيق، بطارية طويلة.',
                'price' => 999,
                'quantity' => 18,
                'category' => 'Vacuum Cleaners',
                'featured' => false,
            ],

            [
                'name' => 'DeLonghi Hot & Cold Coffee Machine',
                'slug' => 'delonghi-coffee-machine',
                'description' => 'آلة قهوة منزلية لتحضير القهوة والمشروبات الساخنة.',
                'details' => 'تصميم عملي، تحضير قهوة متعددة الأنواع، نظام تبخير الحليب.',
                'price' => 899,
                'quantity' => 12,
                'category' => 'Coffee Machines',
                'featured' => false,
            ],

            [
                'name' => 'Apple MagSafe Charger',
                'slug' => 'apple-magsafe-charger',
                'description' => 'شاحن MagSafe لاسلكي متوافق مع أجهزة iPhone المدعومة.',
                'details' => 'شحن لاسلكي، اتصال مغناطيسي، تصميم Apple الأصلي.',
                'price' => 179,
                'quantity' => 80,
                'category' => 'Power Banks',
                'featured' => false,
            ],
        ];

        foreach ($products as $product) {

            $category = Category::where('name', $product['category'])->first();

            if (!$category) {
                continue;
            }

            Product::create([
                'name' => $product['name'],
                'slug' => $product['slug'],
                'description' => $product['description'],
                'details' => $product['details'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'category_id' => $category->id,
                'featured' => $product['featured'],
                'status' => true,
            ]);
        }
    }
}