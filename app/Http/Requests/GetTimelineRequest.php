<?php

namespace App\Http\Requests;

use App\Constants\AppConstants;
use App\Traits\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GetTimelineRequest
 * @package App\Http\Requests
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.07
 */
class GetTimelineRequest extends FormRequest
{
    use FailedValidationResponse;

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            AppConstants::OFFSET => AppConstants::REQUIRED_INT,
            AppConstants::LIMIT  => AppConstants::REQUIRED_INT
        ];
    }
}
