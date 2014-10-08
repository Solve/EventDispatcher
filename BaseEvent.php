<?php
/*
 * This file is a part of Solve framework.
 *
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 * @copyright 2009-2014, Alexandr Viniychuk
 * created: 23.11.13 20:37
 */

namespace Solve\EventDispatcher;

/**
 * Class BaseEvent
 * @package Solve\EventDispatcher
 *
 * Class BaseEvent is a basic event class
 *
 * @version 1.0
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 */
class BaseEvent {

    private $_params            = array();

    private $_dispatcher;

    private $_currentState      = EventState::CREATED;
    private $_stoppedPriority   = 0;

    private $_name;


    public function __construct($name, $params = array()) {
        $this->_name   = $name;
        $this->_params = $params;
    }

    public function setDispatcher(EventDispatcherInterface $dispatcher) {
        $this->_dispatcher = $dispatcher;
    }

    public function stopPropagation($forPriority = 0) {
        $this->_currentState = EventState::STOPPED;
        $this->_stoppedPriority = $forPriority;
    }

    public function isPropagationStopped($forPriority = 0) {
        return ($this->_currentState === EventState::STOPPED) && ($forPriority <= $this->_stoppedPriority);
    }

    public function getName() {
        return $this->_name;
    }

    /**
     * @return mixed
     */
    public function getParameters() {
        return $this->_params;
    }

} 