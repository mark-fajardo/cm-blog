<?php

namespace App\Traits;

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class FailedValidationResponse
 * @package App\Traits
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.07.07
 */
trait FailedValidationResponse
{
    /**
     * Add failed validation response.
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(DBUtils::formatResponse(false, [
            AppConstants::CODE   => 422,
            AppConstants::MESSAGE => $validator->errors()->all()[0]
        ]), 422));
    }
}
