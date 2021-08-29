<?php

namespace App\Http\Requests;

use App\Constants\AppConstants;
use App\Traits\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GetRecipeRequest
 * @package App\Http\Requests\Auth
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>>
 * @since 2021.08.29
 */
class GetRecipeRequest extends FormRequest
{
    use FailedValidationResponse;

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            AppConstants::OFFSET          => AppConstants::REQUIRED_INT,
            AppConstants::LIMIT           => AppConstants::REQUIRED_INT,
            AppConstants::SEARCH_KEYWORD  => AppConstants::NULLABLE,
        ];
    }
}
