<?php

namespace App\Http\Api\V1\Controllers\Product;

use App\Http\Api\V1\Controllers\BaseController;
use App\Http\Repositories\ProductRepository;
use App\Http\Resources\Schemas\ProductResponse;
use Illuminate\Http\JsonResponse;
class ProductController extends BaseController
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index(): JsonResponse
    {
        $data = $this->productRepository->all()->paginate(10);
        $resource = ProductResponse::make($data);

        return $this->responseOk($resource);
    }
}
