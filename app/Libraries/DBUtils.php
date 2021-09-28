<?php

namespace App\Libraries;

use App\Constants\AppConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/**
 * Class ApiRequestUtils
 * @package App\Libraries
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.08.28
 */
class DBUtils
{
    /**
     * Filter array, remove null fields.
     * @param array $aRequest
     * @return array
     */
    public static function removeNullFields(array $aRequest): array
    {
        return array_filter($aRequest);
    }

    /**
     * Format API response.
     * @param bool|null  $bSuccess
     * @param $mData
     * @return array
     */
    public static function formatResponse(bool $bSuccess, $mData = null): array
    {
        return [
            AppConstants::SUCCESS => $bSuccess,
            AppConstants::DATA    => $mData
        ];
    }

    /**
     * Get state token
     * @return array
     */
    public static function getStateToken(): array
    {
        return [
            AppConstants::STATE => Crypt::encryptString(config('app.key'))
        ];
    }

    /**
     * Format request data for logging.
     * @param Request $oRequest
     * @return array
     */
    public static function formatRequestLog(Request $oRequest): array
    {
        return [
            'ip'      => $oRequest->ip(),
            'headers' => $oRequest->header(),
            'server'  => $oRequest->server(),
            'data'    => $oRequest->all()
        ];
    }
}
