<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Session configuration. Note that only Red (see config/red.php) and 
 * classes/Feedback.php needs access to the Session. Both are using the native driver.
 * 
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
return array(
    'native' => array(
        'name' => 'native',
        'lifetime' => 43200,
    ),
    'cookie' => array(
        'name' => 'cookie',
        'encrypted' => TRUE,
        'lifetime' => 43200,
    ),
    'database' => array(
        'name' => 'database',
        'encrypted' => TRUE,
        'lifetime' => 43200,
        'group' => 'default',
        'table' => 'sessions',
        'columns' => array(
            'session_id'  => 'session_id',
            'last_active' => 'last_active',
            'contents'    => 'contents'
        ),
        'gc' => 500,
    ),
);