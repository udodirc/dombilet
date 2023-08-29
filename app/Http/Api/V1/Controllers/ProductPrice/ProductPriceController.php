<?php

namespace App\Http\Api\V1\Controllers\ProductPrice;

use App\Http\Api\V1\Controllers\BaseController;
use App\Http\Api\V1\Requests\ProductPrice\ProductPriceUpdateRequest;
use App\Http\Repositories\ProductPriceRepository;
use App\Http\Resources\Schemas\ProductPriceResponse;
use App\Service\DBService;
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
        $resource = ProductPriceResponse::make($data);

        return $this->responseOk($resource);
    }

    public function update(string $guid, ProductPriceUpdateRequest $request): JsonResponse
    {
        if (!($prices = $this->productPriceRepository->findByProductID($guid))) {
            return $this->responseBadRequest();
        }

        $data = $request->validated();

        if (!$this->productPriceRepository->update(
            $data,
            'product_prices',
            'price',
            'product_id',
            'guid',
            'price'
        )) {
            return $this->responseBadRequest();
        }

        $resource = ProductPriceResponse::make($prices);

        return $this->responseOk($resource);
    }
}
