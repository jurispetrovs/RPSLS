<?php

class WinResult implements Result
{
    public function getMessage(): string
    {
        return 'You Win' . PHP_EOL;
    }
}