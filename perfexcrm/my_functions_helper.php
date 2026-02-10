<?php

use Amostajo\PerfexCRM\Samples\ClientHooks;

/**
 * This file is a replica of Perfex CRM application/helpers/my_functions_helper.php
 * 
 * The original file is part of the Perfex CRM application,which is a customer
 * relationship management software.
 * This helper file contains custom functions that are used throughout the application
 * to perform various tasks and operations. The functions in this file are designed to
 * enhance the functionality of the application and provide additional features for users.
 * The file is typically included in the application to make these functions available
 * globally, allowing developers to easily call them from different parts of the codebase.
 * 
 * Here is were your action hooks are defined
 * 
 * @link https://help.perfexcrm.com/action-hooks/
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 */

// Bootstrap composer
require __DIR__ . '/../vendor/autoload.php';

/**
 * Register custom hooks defined in the ClientHooks class.
 */
ClientHooks::register();