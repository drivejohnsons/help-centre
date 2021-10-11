<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class HelpCentreFacade extends Facade
{
    /**
     * Get the Facade's accessor name.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'helpCentre';
    }
}
