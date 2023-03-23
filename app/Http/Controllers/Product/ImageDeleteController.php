<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ImageDeleteController extends Controller
{
    public function __invoke(Product $product, ProductImage $image)
    {
        $image->delete();
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('product.edit', compact('product','tags', 'colors', 'categories'));
    }
}
