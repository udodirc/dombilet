<?php

namespace App\Http\Resources\Schemas;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResponse extends JsonResource
{
    public Product $data;
}
