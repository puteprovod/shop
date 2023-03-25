<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\FIlters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Requests\API\Product\WLRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class WLController extends Controller
{
    public function __invoke(WLRequest $request)
    {
        $data = $request->validated();
        $products=Product::find($data['wishlist']);
        return ProductResource::collection($products);
    }
}
