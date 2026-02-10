<?php

namespace Amostajo\PerfexCRM\Traits;

/**
 * This trait provides a method to register hooks in the application.
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 * @version 1.0.0
 */
trait Registerable
{
    /**
     * Register hooks.
     * @since 1.0.0
     */
    public static function register()
    {
        new static();
    }
}