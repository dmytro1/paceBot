<?php

namespace App\Http\Controllers;

use App\Telegram\Services\PaceService;
use App\Telegram\Services\ReplyService;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Objects\Message;
use Telegram\Bot\Objects\Update;

class PaceController extends Controller
{
    /**
     * @var array|Update|Update[]
     */
    protected Update|array $update;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected Api $telegram, protected PaceService $paceService, protected ReplyService $replyService)
    {
        $this->update = $this->telegram->commandsHandler(true);
    }

    /**
     * Handles webhook callback from Telegram.
     *
     * @return Message
     * @throws TelegramSDKException
     */

    public function webhookHandler(): Message
    {
        $message = $this->update->getMessage()->getText();
        $splitMessage = explode(' ', trim($message));

        if (count($splitMessage) !== 2) {
            return $this->replyService->replyWithDefaultMessage();
        }

        if (strpos($splitMessage[0], ':')) {
            $message = $this->paceService->paceResult($splitMessage);
            return $this->replyService->replyHtml($message);
        }

        if (strpos($splitMessage[1], ':')) {
            $message = $this->paceService->timeResult($splitMessage);
            return $this->replyService->replyHtml($message);
        }

        return $this->replyService->replyWithDefaultMessage();
    }


}
