<?php

namespace App\Http\Repositories;

use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Collection;

class ProductPriceRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return ProductPrice::select([
            'id',
            'product_id',
            'price'
        ])
            ->with('product:id,name')
            ->get();
    }

    public function findByProductID($id): Collection
    {
        return ProductPrice::where(['product_id' => $id])
            ->get();
    }
}
