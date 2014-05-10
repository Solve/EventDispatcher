<?php
/*
 * This file is a part of Solve framework.
 *
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 * @copyright 2009-2014, Alexandr Viniychuk
 * created: 24.11.13 18:39
 */

namespace Solve\EventDispatcher;


/**
 * Class EventDispatcherInterface
 *
 * @package Solve\EventDispatcher
 *
 * Interface EventDispatcherInterface is used to be implemented in any dispatcher
 *
 * @version 1.0
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 */
Interface EventDispatcherInterface {


    /**
     * Add event listener for specified event name with priority
     *
     * @param string   $eventName
     * @param callable $listener
     * @param integer  $priority
     * @return EventDispatcherInterface
     */
    public function addEventListener($eventName, $listener, $priority = null);

    /**
     * Remove specified listener from event
     *
     * @param string   $eventName
     * @param callable $listener
     * @return EventDispatcherInterface
     */
    public function removeEventListener($eventName, $listener);

    /**
     * Remove all listeners from event
     *
     * @param string $eventName
     * @return EventDispatcherInterface
     */
    public function removeAllListeners($eventName);

    /**
     * Remove all events from listener
     * @param callable $listener
     * @return EventDispatcherInterface
     */
    public function removeAllEvents($listener);

    /**
     * Check whether specified event has at least one listener
     * @param string $eventName
     * @return mixed
     */
    public function hasListeners($eventName);

    /**
     * Check whether specified listener subscribed at least on one event
     * @param callable $listener
     * @return mixed
     */
    public function hasEvents($listener);

    /**
     * Dispatch event to all listener subscribed
     *
     * @param $event
     * @return BaseEvent mixed
     */
    public function dispatchEvent($event);

}