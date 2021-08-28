<?php

namespace App\Http\Requests;

use App\Constants\AppConstants;
use App\Traits\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PageConfigRequest
 * @package App\Http\Requests\Auth
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>>
 * @since 2021.08.28
 */
class PageConfigRequest extends FormRequest
{
    use FailedValidationResponse;

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            AppConstants::PAGE_TAG => AppConstants::REQUIRED_STRING
        ];
    }
}
