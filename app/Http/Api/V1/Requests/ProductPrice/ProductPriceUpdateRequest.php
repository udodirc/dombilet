<?php

namespace App\Http\Api\V1\Requests\ProductPrice;

use App\Http\Api\V1\Requests\BaseRequest;

class ProductPriceUpdateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'prices'   => $this->post('prices')
        ]);
    }

    public function rules(): array
    {
        return [
            //'prices' => 'required|array:guid,price'
        ];
    }
}
