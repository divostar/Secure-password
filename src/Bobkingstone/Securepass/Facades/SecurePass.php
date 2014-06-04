<?php namespace Bobkingstone\Securepass\Facades;

use Illuminate\Support\Facades\Facade;

class SecurePass extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'Securepass';
    }
} 