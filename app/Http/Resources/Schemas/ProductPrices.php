<?php

namespace App\Http\Resources\Schemas;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPrices extends JsonResource
{
    public string $id;
    public string $product_id;
    public float $price;
}
