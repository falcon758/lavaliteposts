<?php

namespace Postbuffer\Channels\Facades;

use Illuminate\Support\Facades\Facade;

class Channels extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'postbuffer.channels';
    }
}
