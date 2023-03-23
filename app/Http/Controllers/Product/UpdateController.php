<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data=$request->validated();
        $productImages = [];
        $tagsIds = [];
        $colorsIds = [];
        if (isset($data['product_images']))
        $productImages = $data['product_images'];
        if (isset($data['tags']))
        $tagsIds = $data['tags'];
        if (isset($data['colors']))
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors'],$data['product_images']);
        $product->tags()->sync($tagsIds);
        $product->colors()->sync($colorsIds);
        $product->update($data);
        if ($productImages) {
            foreach ($productImages as $productImage) {
                $currentImages = ProductImage::where('product_id', $product->id)->get();
                if (count($currentImages) >= 3)
                    break;
                $filePath = Storage::disk('public')->put('/images', $productImage);
                ProductImage::create(
                    [
                        'product_id' => $product->id,
                        'file_path' => $filePath
                    ]
                );
            }
        }
        return view('product.show', compact('product'));
    }
}
