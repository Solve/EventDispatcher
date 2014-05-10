<?php
/*
 * This file is a part of Solve framework.
 *
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 * @copyright 2009-2014, Alexandr Viniychuk
 * created: 25.11.13 01:34
 */

namespace Solve\EventDispatcher;


/**
 * Class EventState
 *
 * @package Solve\EventDispatcher
 *
 * Class EventState is used to ...
 *
 * @version 1.0
 * @author Alexandr Viniychuk <alexandr.viniychuk@icloud.com>
 */
class EventState {

    const CREATED    = 'created';
    const FIRED      = 'fired';
    const STOPPED    = 'stopped';
    const TERMINATED = 'terminated';
    const FINISHED   = 'finished';

} 