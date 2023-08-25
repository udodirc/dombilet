<?php

namespace App\Http\Api\V1\Controllers\ProductPrice;

use App\Http\Api\V1\Controllers\BaseController;
use App\Http\Repositories\ProductPriceRepository;
use App\Http\Resources\Schemas\ProductResponse;
use Illuminate\Http\JsonResponse;

class ProductPriceController extends BaseController
{
    protected ProductPriceRepository $productPriceRepository;

    public function __construct(ProductPriceRepository $productPriceRepository)
    {
        $this->productPriceRepository = $productPriceRepository;
    }
    public function index(): JsonResponse
    {
        $data = $this->productPriceRepository->all();
        $resource = ProductResponse::make($data);

        return $this->responseOk($resource);
    }
}
