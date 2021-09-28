<?php

namespace App\Services;

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Contains base service methods.
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class Service
{
    /**
     * Contains the service response.
     * @var array
     */
    protected $aResponse;

    /**
     * Contains the request object of every request.
     * @var Request
     */
    protected $oRequest = null;

    /**
     * Contains all the request parameters.
     * @var array
     */
    protected $aRequest = [];

    /**
     * Log and return result.
     * @return array
     */
    public function get(): array
    {
        Log::channel('info_stack')->info('DB Data Request', [
            AppConstants::RESPONSE => $this->aResponse,
            AppConstants::REQUEST => (empty($this->oRequest) === true) ? $this->oRequest : DBUtils::formatRequestLog($this->oRequest)
        ]);
        return $this->aResponse;
    }

    /**
     * Contains the current instance of the service.
     * @param Request $oRequest
     * @return $this
     */
    protected function request(Request $oRequest): Service
    {
        $this->oRequest = $oRequest;
        $this->aRequest = $this->oRequest->all();
        return $this;
    }

    /**
     * Validate response if empty.
     * @param array $aResponse
     * @param       $oService
     * @return mixed
     */
    protected function validateResponse(array $aResponse, $oService)
    {
        if (empty($aResponse) === true) {
            $this->aResponse = DBUtils::formatResponse(false);
            return $oService;
        }

        $this->aResponse = DBUtils::formatResponse(true, $aResponse);
        return $oService;
    }
}
