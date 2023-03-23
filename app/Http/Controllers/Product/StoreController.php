<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $productImages=[];
        $tagsIds=[];
        $colorsIds=[];
        if (isset($data['product_images']))
            $productImages = $data['product_images'];
        if (isset($data['tags']))
            $tagsIds = $data['tags'];
        if (isset($data['colors']))
            $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors'], $data['product_images']);
        $product = Product::firstOrCreate([
            'title' => $data['title'],
        ], $data);
            $product->tags()->attach($tagsIds);
            $product->colors()->attach($colorsIds);
        foreach ($productImages as $productImage) {
            $currentImagesCount = count(ProductImage::where('product_id', $product->id)->get());
            if ($currentImagesCount >= 3)
                break;
            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create(
                [
                    'product_id' => $product->id,
                    'file_path' => $filePath
                ]
            );
        }

        return redirect()->route('product.index');
    }
}
