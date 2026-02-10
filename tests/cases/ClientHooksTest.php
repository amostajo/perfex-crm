<?php

use PHPUnit\Framework\TestCase;

/**
 * Test class.
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 * @version 1.0.0
 */
class ClientHooksTest extends TestCase
{
    /**
     * Test the parse_name method of the ClientHooks class to ensure it
     * correctly capitalizes the first letter of a client's name.
     * @version 1.0.0
     */
    public function test_parse_name()
    {
        // Prepare
        $name = 'ale mostajo';
        $expected_name = 'Ale mostajo';
        // Run
        $parsed = hooks()->apply_filters('client_name', $name);
        // Assert
        $this->assertIsString($parsed);
        $this->assertEquals($expected_name, $parsed);
    }

    /**
     * Test the notify method of the ClientHooks class to ensure it outputs the correct.
     * @version 1.0.0
     */
    public function test_notify()
    {
        // Prepare
        $client_id = 123;
        $expected_output = 'Client (ID#123) has been added successfully!';
        // Capture the output of the notify method
        ob_start();
        hooks()->do_action('after_client_added', $client_id);
        $output = ob_get_clean();
        // Assert
        $this->assertEquals($expected_output, $output);
    }
}