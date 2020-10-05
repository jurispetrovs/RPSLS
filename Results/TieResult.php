<?php

class TieResult implements Result
{
    public function getMessage(): string
    {
        return 'Tie' . PHP_EOL;
    }
}