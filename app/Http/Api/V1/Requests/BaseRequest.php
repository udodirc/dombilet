<?php

namespace App\Http\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    protected static $optional_fields = [];

    /**
     * @return array
     * @throws ValidationException
     */
    /*public function validated(): array
    {
        $validated = parent::validated();

        foreach (static::$optional_fields as $field) {
            if ( ! isset($validated[$field])) {
                $validated[$field] = null;
            }
        }

        return $validated;
    }*/
}
