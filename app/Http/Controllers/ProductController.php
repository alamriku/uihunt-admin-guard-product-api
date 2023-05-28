<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use \Symfony\Component\HttpFoundation\Response as ResponseStatus;

class ProductController extends Controller
{
    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $product = new Product();
        $product->setProduct();
        $product->setCategories();
        $product->setImages();
        $data = new ProductResource($product);

        if (empty($data->id)) {
            return response()->json(['error' => 'Product not found'], ResponseStatus::HTTP_NOT_FOUND);
        }

        return $data->response();
    }
}
