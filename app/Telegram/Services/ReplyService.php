<?php

namespace App\Telegram\Services;

use App\Telegram\Replies\ReplyTexts;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Objects\Message;

class ReplyService
{
    /**
     * Replies with a HTML message to the user.
     *
     * @param $message
     * @return Message
     * @throws TelegramSDKException
     */
    public function replyHtml($message): Message
    {
        /** @var Api $telegram */
        $telegram = app(Api::class);
        $chatId = $telegram->getWebhookUpdate()->getChat()->getId();

        return $telegram->sendMessage([
            'chat_id'    => $chatId,
            'text'       => $message,
            'parse_mode' => 'HTML',
        ]);
    }

    /**
     * Replies with a default message to the user.
     *
     * @return Message
     * @throws TelegramSDKException
     */
    public function replyWithDefaultMessage(): Message
    {
        $message = ReplyTexts::DEFAULT_1 . ReplyTexts::DEFAULT_2 . ReplyTexts::DEFAULT_3;
        return $this->replyHtml($message);
    }
}
