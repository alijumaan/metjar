<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $coupon = Coupon::active()->public()->first();

        $categories = Category::select('slug', 'cover', 'name')
            ->active()
            ->whereParentId(null)
            ->limit(4)
            ->get();

        $heroProducts = Product::query()
            ->active()
            ->hasQuantity()
            ->activeCategory()
            ->featured()
            ->with(['firstMedia', 'category'])
            ->whereHas('media')
            ->latest()
            ->take(3)
            ->get();

        if ($heroProducts->count() < 3) {

            $existingIds = $heroProducts->pluck('id');

            $fallbackProducts = Product::query()
                ->active()
                ->hasQuantity()
                ->activeCategory()
                ->with(['firstMedia', 'category'])
                ->whereHas('media')
                ->whereNotIn('id', $existingIds)
                ->latest()
                ->take(3 - $heroProducts->count())
                ->get();

            $heroProducts = $heroProducts
                ->concat($fallbackProducts);

        }

        return view('frontend.home', [
            'coupon' => $coupon,
            'categories' => $categories,
            'heroProducts' => $heroProducts,
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $data = Product::select('slug', 'name')
            ->where('name', 'LIKE', '%'.$request->productName. '%')
            ->active()
            ->hasQuantity()
            ->activeCategory()
            ->take(5)
            ->get();

        return response()->json($data);
    }
}
