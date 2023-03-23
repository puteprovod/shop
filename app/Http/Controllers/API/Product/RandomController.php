<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\FIlters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Requests\API\Product\RandomRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function __invoke(RandomRequest $request)
    {
        $data = $request->validated();
        $products =  Product::all()->random($data['count']);
        return ProductResource::collection($products);
    }
}
