<?php

namespace Facades\XContains\XContains\Rec;

use Illuminate\Support\Facades\Facade;

/**
 * @see \XContains\XContains\Rec\DIG
 */
class DIG extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'XContains\XContains\Rec\DIG';
    }
}
