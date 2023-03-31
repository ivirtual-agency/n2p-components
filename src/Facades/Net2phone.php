<?php

namespace iVirtual\Net2phone\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \iVirtual\Net2phone\Net2phone
 */
class Net2phone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \iVirtual\Net2phone\Net2phone::class;
    }
}
