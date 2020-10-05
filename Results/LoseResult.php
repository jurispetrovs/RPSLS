<?php

class LoseResult implements Result
{
    public function getMessage(): string
    {
        return 'You Lose' . PHP_EOL;
    }
}