<?php

namespace App\Providers;

use App\Services\Senders\Sender;
use App\Services\Senders\Telegram\TelegramSender;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 *
 */
class SendersServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Sender::class, TelegramSender::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [TelegramSender::class];
    }
}
