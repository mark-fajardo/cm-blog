<?php

namespace App\Http\Requests;

use App\Constants\AppConstants;
use App\Traits\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SendMessageRequest
 * @package App\Http\Requests
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.09
 */
class SendMessageRequest extends FormRequest
{
    use FailedValidationResponse;

    /**
     * Request prefix.
     * @var string
     */
    private const REQUEST_PREFIX = 'params.';

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            self::REQUEST_PREFIX . AppConstants::SENDER_NAME        => [AppConstants::NULLABLE, AppConstants::STRING],
            self::REQUEST_PREFIX . AppConstants::SENDER_PHONE       => [AppConstants::NULLABLE, AppConstants::STRING],
            self::REQUEST_PREFIX . AppConstants::SENDER_EMAIL       => AppConstants::REQUIRED_STRING,
            self::REQUEST_PREFIX . AppConstants::MESSAGE_TITLE      => [AppConstants::NULLABLE, AppConstants::STRING],
            self::REQUEST_PREFIX . AppConstants::MESSAGE_REQUEST    => AppConstants::REQUIRED_STRING,
            self::REQUEST_PREFIX . AppConstants::RECAPTCHA_RESPONSE => AppConstants::REQUIRED_STRING
        ];
    }
}
