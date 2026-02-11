<?php

namespace Amostajo\PerfexCRM\Replica;

/**
 * This class replicates Perfex CRM and WordPress hook system.
 * 
 * It allows developers to register and execute custom functions (hooks) at specific points in the application.
 * 
 * @author Ale Mostajo <https://github.com/amostajo>
 * @version 1.0
 */
class Hooks
{
    /**
     * Singleton instance of the Hooks class.
     * @since 1.0.0
     * @var self
     */
    protected static self $instance;

    /**
     * Hooks storage structure:
     * @since 1.0.0
     * @var array
     */
    protected static array $hooks = [
        'actions' => [],
        'filters' => [],
    ];

    /**
     * Returns singleton instance of Hooks class.
     * @since 1.0.0
     * 
     * @return Amostajo\PerfexCrm\PerfexCrm\Hooks The singleton instance of the Hooks class.
     */
    public static function instance(): self
    {
        if (!isset(static::$instance)) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    /**
     * Add action replica.
     * @since 1.0.0
     * 
     * @param string   $tag           The name of the hook.
     * @param callable $callback      The function to be called when the hook is executed.
     * @param int      $priority      The priority of the hook (lower numbers correspond with earlier execution).
     * @param int      $accepted_args The number of arguments the callback accepts.
     */
    public function add_action($tag, $callback, $priority = 10, $accepted_args = 1)
    {
        static::$hooks['actions'][$tag][] = [
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $accepted_args,
        ];
    }

    /**
     * Add action replica.
     * @since 1.0.0
     * 
     * @param string   $tag           The name of the hook.
     * @param callable $callback      The function to be called when the hook is executed.
     * @param int      $priority      The priority of the hook (lower numbers correspond with earlier execution).
     * @param int      $accepted_args The number of arguments the callback accepts.
     */
    public function add_filter($tag, $callback, $priority = 10, $accepted_args = 1)
    {
        static::$hooks['filters'][$tag][] = [
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $accepted_args,
        ];
    }

    /**
     * Execute all functions hooked to an action.
     * @since 1.0.0
     *
     * @param string $tag     The name of the action to execute.
     * @param mixed  ...$args Optional additional arguments to pass to the hooked functions.
     */
    public function do_action($tag, $arg = '')
    {
        if (!array_key_exists($tag, static::$hooks['actions'])) {
            return;
        }
        usort(static::$hooks['actions'][$tag], function ($a, $b) {
            return $a['priority'] <=> $b['priority'];
        });
        foreach (static::$hooks['actions'][$tag] as $action) {
            call_user_func_array($action['callback'], array_slice(func_get_args(), 1, $action['accepted_args']));
        }
    }

    /**
     * Apply filters to a value.
     * @since 1.0.0
     * 
     * @param string $tag              The name of the filter to apply.
     * @param mixed  $value            The value to be filtered.
     * @param array  $additionalParams Optional additional parameters to pass to the hooked functions.
     * 
     * @return mixed The filtered value after all hooked functions have been applied.
     */
    public function apply_filters($tag, $value, $additionalParams = [])
    {
        if (!array_key_exists($tag, static::$hooks['filters'])) {
            return $value;
        }
        usort(static::$hooks['filters'][$tag], function ($a, $b) {
            return $a['priority'] <=> $b['priority'];
        });
        return array_reduce(static::$hooks['filters'][$tag], function ($value, $filter) use ($additionalParams) {
            return call_user_func_array($filter['callback'], array_merge([$value], array_slice(func_get_args(), 2, $filter['accepted_args'] - 1)));
        }, $value);
    }
}