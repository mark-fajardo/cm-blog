<?php

namespace App\Libraries;

use App\Constants\AppConstants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;

/**
 * Class ApiRequestUtils
 * @package App\Libraries
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>>
 * @since 2021.08.28
 */
class DBUtils
{
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
}
