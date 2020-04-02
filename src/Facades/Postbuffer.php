<?php

namespace Channels\Postbuffer\Facades;

use Illuminate\Support\Facades\Facade;

class Postbuffer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'channels.postbuffer';
    }
}
