<?php

namespace Amostajo\PerfexCRM\Core;

/**
 * Abstract hook base class.
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 * @version 1.0.0
 */
abstract class Hook
{
    /**
     * Initialize the hook and register it with the application.
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Register hooks.
     * @since 1.0.0
     */
    protected function init()
    {
        // @todo: Implement the logic to register the hook with the application.
    }
}