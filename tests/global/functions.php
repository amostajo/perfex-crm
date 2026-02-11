<?php

use Amostajo\PerfexCRM\Replica\Hooks;

/**
 * Replica of global functions used in Perfex CRM application.
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 * @version 1.0.0
 */

if (!function_exists('hooks')) {
    /**
     * Get the Hooks instance.
     *
     * @return Amostajo\PerfexCRM\Replica\Hooks
     */
    function hooks(): Hooks
    {
        return Hooks::instance();
    }
}
