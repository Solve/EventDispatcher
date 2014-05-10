<?php
/*
 * This file is a part of Solve framework.
 *
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 * @copyright 2009-2014, Alexandr Viniychuk
 * created: 23.11.13 20:45
 */

namespace Solve\EventDispatcher;
use Solve\Storage\ArrayStorage;

/**
 * Class EventDispatcher
 * @package Solve\EventDispatcher
 *
 * Class EventDispatcher is used to ...
 *
 * @version 1.0
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 */
class EventDispatcher implements EventDispatcherInterface {

    private $_listeners;

    public function __construct() {
        $this->_listeners = new ArrayStorage();
    }

    /**
     * Add event listener for specified event name with priority
     *
     * @param string   $eventName
     * @param callable $listener
     * @param integer  $priority
     * @return EventDispatcherInterface
     */
    public function addEventListener($eventName, $listener, $priority = EventPriority::NORMAL) {
        if (!isset($this->_listeners[$eventName][$priority])) {
            $this->_listeners->extendDeepValue(array($priority=>array()), $eventName);
        }
        $this->_listeners[$eventName][$priority][] = $listener;
    }


    /**
     * Dispatch event to all listener subscribed
     *
     * @param mixed $event
     * @param mixed|array $parameters
     * @return BaseEvent mixed
     */
    public function dispatchEvent($event, $parameters = array()) {
        if (is_string($event)) {
            $event = new BaseEvent($event, $parameters);
        }
        $eventName = $event->getName();
        $event->setDispatcher($this);
        if ($this->hasListeners($eventName)) {
            foreach($this->_listeners[$eventName] as $priority=>$listeners) {
                foreach($listeners as $listener) {
                    if ($event->isPropagationStopped($priority)) {
                        break;
                    }
                    call_user_func($listener, $event);
                }
            }
        }
        return $event;
    }


    /**
     * Remove specified listener from event
     *
     * @param string   $eventName
     * @param callable $listener
     * @return EventDispatcherInterface
     */
    public function removeEventListener($eventName, $listener) {
        // TODO: Implement removeEventListener() method.
    }

    /**
     * Remove all listeners from event
     *
     * @param string $eventName
     * @return EventDispatcherInterface
     */
    public function removeAllListeners($eventName) {
        // TODO: Implement removeAllListeners() method.
    }

    /**
     * Remove all events from listener
     *
     * @param callable $listener
     * @return EventDispatcherInterface
     */
    public function removeAllEvents($listener) {
        // TODO: Implement removeAllEvents() method.
    }

    /**
     * Check whether specified event has at least one listener
     *
     * @param string $eventName
     * @return mixed
     */
    public function hasListeners($eventName) {
        return $this->_listeners->has($eventName);
    }

    /**
     * Check whether specified listener subscribed at least on one event
     *
     * @param callable $listener
     * @return mixed
     */
    public function hasEvents($listener) {
        // TODO: Implement hasEvents() method.
    }


} 