<?php
namespace App\Services\Slack;

use Illuminate\Notifications\Notifiable;
use App\Notifications\SlackNotification;

class SlackService
{
    use Notifiable;

    public function send($message = null, $attachment = null)
    {
        $this->notify(new SlackNotification($message, $attachment));
    }

    protected function routeNotificationForSlack()
    {
        return "https://hooks.slack.com/services/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";
    }
}