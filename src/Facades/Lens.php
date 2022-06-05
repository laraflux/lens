<?php

namespace Laraflux\Lens\Facades;

use Illuminate\Support\Facades\Facade;
use Laraflux\Lens\Services\Lens as LensService;

class Lens extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LensService::class;
    }
}
