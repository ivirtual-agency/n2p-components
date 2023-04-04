<?php

namespace iVirtual\Net2phone\Actions;

class FAQ
{
    /**
     * Build a FAQ.
     */
    public static function make(string $title, string $answer): array
    {
        return [
            'title' => $title,
            'answer' => $answer,
        ];
    }
}