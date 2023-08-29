<?php

namespace App\Http\Repositories;

use App\Models\ProductPrice;
use App\Service\DBService;
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

    public function update(
        array $data,
        string $tableName,
        string $setColumn,
        string $whereColumn,
        string $whenIndex,
        string $valIndex): bool
    {
        return DBService::update(
            $data,
            $tableName,
            $setColumn,
            $whereColumn,
            $whenIndex,
            $valIndex
        );
    }
}
