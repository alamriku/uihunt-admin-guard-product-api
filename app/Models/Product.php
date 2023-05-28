<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return void
     */
    public function setProduct(): void
    {
        $this->id = 1;
        $this->name = 'Besnik';
        $this->thumbnail = 'https://ae01.alicdn.com/kf/S95326c72e2b447f580464cbd35249e4dh/2023-New-POEDAGAR-Luxury-Watch-Business-Waterproof-Male-Clock-Luminous-Date-Stainless-Steel-Square-Quartz-Men.jpg_Q90.jpg_.webp';
    }

    /**
     * @return void
     */
    public function setCategories(): void
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

        $this->categories = $categoriesCollect;
    }

    /**
     * @return void
     */
    public function setImages(): void
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

        $this->images = $imageCollection;
    }
}
