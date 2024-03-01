<?php

namespace App\Telegram\Commands;

use App;
use Telegram\Bot\Commands\Command;
use App\Telegram\Replies\ReplyTexts;
use App\Telegram\Services\ReplyService;

/**
 * Class StartCommand
 */
class StartCommand extends Command
{
    protected string $name = 'start';

    public function __construct(protected ReplyService $replyService)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        // Log info
        info('chat log:', $this->update->getMessage()->getChat()->toArray());

        $message = ReplyTexts::START_1 . ReplyTexts::DEFAULT_2 . ReplyTexts::DEFAULT_2_2 . ReplyTexts::DEFAULT_3 . ReplyTexts::DEFAULT_3_2;
        $this->replyService->replyHtml($message);

        die();
    }
}
