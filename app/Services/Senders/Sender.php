<?php

namespace App\Services\Senders;

/**
 *
 */
interface Sender
{
    /**
     * @param $message
     * @return bool
     */
    public function sendMessage($message): bool;
}
