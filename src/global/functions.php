<?php

use Amostajo\PerfexCRM\PerfexCRM\Hooks;

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
     * @return Amostajo\PerfexCRM\PerfexCRM\Hooks
     */
    function hooks(): Hooks
    {
        return Hooks::instance();
    }
}
