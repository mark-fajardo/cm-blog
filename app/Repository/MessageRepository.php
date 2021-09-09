<?php

namespace App\Repository;

use App\Models\Message;

/**
 * MessageRepository
 * @package App\Repository
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.09
 */
class MessageRepository extends Repository
{
    /**
     * Send Message
     * @param array $aRequest
     * @return int
     */
    public function sendMessage(array $aRequest): int
    {
        return Message::insertGetId($aRequest);
    }
}
