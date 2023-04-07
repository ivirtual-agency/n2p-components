<?php

namespace iVirtual\Net2phone\Actions;

class Stat
{
    /**
     * Build a Stat.
     */
    public static function make(int $number, string $text): array
    {
        return [
            'number' => $number,
            'text' => $text,
        ];
    }
}