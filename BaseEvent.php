<?php
/*
 * This file is a part of Solve framework.
 *
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 * @copyright 2009-2014, Alexandr Viniychuk
 * created: 23.11.13 20:37
 */

namespace Solve\EventDispatcher;
use Traversable;


/**
 * Class BaseEvent
 * @package Solve\EventDispatcher
 *
 * Class BaseEvent is used to ...
 *
 * @version 1.0
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 */
class BaseEvent implements \ArrayAccess, \IteratorAggregate {

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

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator() {
        return new \ArrayIterator($this->_params);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset) {
        // TODO: Implement offsetExists() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset) {
        // TODO: Implement offsetGet() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value) {
        // TODO: Implement offsetSet() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset) {
        // TODO: Implement offsetUnset() method.
    }


} 