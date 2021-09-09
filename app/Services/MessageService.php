<?php

namespace App\Services;

use App\Constants\AppConstants;
use App\Libraries\DBUtils;
use App\Repository\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

/**
 * MessageService
 * @package App\Services
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.06
 */
class MessageService extends Service
{
    /**
     * Contains message repository
     * @var MessageRepository
     */
    private $oMessageRepository;

    /**
     * MessageService constructor
     * @param MessageRepository $oMessageRepository
     */
    public function __construct(MessageRepository $oMessageRepository)
    {
        $this->oMessageRepository = $oMessageRepository;
    }

    /**
     * Send message
     * @param Request $oRequest
     * @return MessageService
     */
    public function sendMessage(Request $oRequest): MessageService
    {
        $this->request($oRequest);
        $iId = $this->oMessageRepository->sendMessage(
            DBUtils::removeNullFields(
                Arr::only($this->aRequest['params'], AppConstants::MESSAGE_CREATE_FIELDS)
            )
        );
        $this->aResponse = DBUtils::formatResponse(true, $iId);
        return $this;
    }
}
