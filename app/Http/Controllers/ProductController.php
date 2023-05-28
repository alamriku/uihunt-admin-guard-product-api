<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response as ResponseStatus;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
         $product = $this->setProduct();
         $this->associateCategories($product);
         $this->associateImages($product);
         $data = new ProductResource($product);

         if (empty($data->id)) {
             return response()->json(['error' => 'Product not found'], ResponseStatus::HTTP_NOT_FOUND);
         }

         return $data->response();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function setProduct(): Product
    {
        $product = new Product();
        $product->id = 1;
        $product->name = 'Besnik';
        $product->thumbnail = 'https://ae01.alicdn.com/kf/S95326c72e2b447f580464cbd35249e4dh/2023-New-POEDAGAR-Luxury-Watch-Business-Waterproof-Male-Clock-Luminous-Date-Stainless-Steel-Square-Quartz-Men.jpg_Q90.jpg_.webp';

        return $product;
    }

    /**
     * @param $product
     * @return void
     */
    private function associateCategories($product): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Premium watch'],
            ['id' => 2, 'name' => 'Category 2'],
        ];
        $categoriesCollect = collect();
        foreach ($categories as $categoryData) {
            $category = new Category();
            $category->id = $categoryData['id'];
            $category->name = $categoryData['name'];

            $categoriesCollect->push($category);
        }

        $product->categories = $categoriesCollect;
    }

    /**
     * @param $product
     * @return void
     */
    private function associateImages($product): void
    {
        $images = [
            ['id'=>1,'url' => 'one of the image/path/1'],
            ['id'=>2,'url' => 'one of the image/path/2'],
            ['id'=>3,'url' => 'one of the image/path/3'],
        ];

        $imageCollection = collect();
        foreach ($images as $item) {
            $image = new Gallery();
            $image->id = $item['id'];
            $image->url = $item['url'];

            $imageCollection->push($image);

        }

        $product->images = $imageCollection;
    }
}
