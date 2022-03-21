<?php

namespace App\Services\Senders;

abstract class Sender
{
    abstract public function sendMessage($message): bool;
}
