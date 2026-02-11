<?php

namespace Amostajo\PerfexCRM\Samples;

use Amostajo\PerfexCRM\Core\Hook;
use Amostajo\PerfexCRM\Traits\Registerable;

/**
 * This class demonstrates how to create a custom hook in the Perfex CRM application.
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 * @version 1.0.0
 */
class ClientHooks extends Hook
{
    use Registerable;

    /**
     * Init hooks for client actions and filters.
     * @since 1.0.0
     */
    public function init()
    {
        hooks()->add_action('after_client_added', [$this, 'notify']);
        hooks()->add_filter('client_name', [$this, 'parse_name']);
    }

    /**
     * Returns client name with the first letter capitalized.
     * @since 1.0.0
     * 
     * @param string $name The original client name.
     * 
     * @return string
     */
    public function parse_name(string $name): string
    {
        return ucfirst($name);
    }

    /**
     * Prints a notification message for a specific client ID when a client is added.
     * @since 1.0.0
     *
     * @param int $client_id The ID of the client that was added.
     */
    public function notify(int $client_id)
    {
        printf('Client (ID#%s) has been added successfully!', $client_id);
    }
}