<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;

/**
 * MessageController
 * @package App\Http\Controllers
 * @author Mark Joshua Fajardo <mjt.fajardo@gmail.com>
 * @since 2021.09.09
 */
class MessageController extends Controller
{
    /**
     * Contains page timeline service instance.
     * @var MessageService
     */
    private $oMessageService;

    /**
     * TimelineController constructor
     * @param MessageService $oMessageService
     */
    public function __construct(MessageService $oMessageService)
    {
        $this->oMessageService = $oMessageService;
    }

    /**
     * Send message
     * @param SendMessageRequest $oRequest
     * @return JsonResponse
     */
    public function sendMessage(SendMessageRequest $oRequest): JsonResponse
    {
        return response()->json($this->oMessageService->sendMessage($oRequest)->get());
    }
}
