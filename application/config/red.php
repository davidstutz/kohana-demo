<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Red module configuration, defines settings for user password security, i.e.
 * the corresponding hash methods to use and the salts.
 * 
 * Note that the below settings should not be considered safe.
 * 
 * @package     Red
 * @author      David Stutz
 * @copyright   (c) 2013 - 2014 David Stutz
 * @license     http://opensource.org/licenses/bsd-3-clause
 */
return array(
    'password'  => array(
        'method' => 'sha256',
        'key' => 'demo',
        'iterations' => 10000,
        'salt' => 'demo', 
    ),
    'session' => array(
        'type' => 'database',
        'key'  => 'red_user',
    ),
    'login' => array(
        'method' => 'sha256', // Method for hashing IPs and user agents.
        'key' => 'demo',
        'delay' => 10, // Delay between logins in seconds.
        'store' => 604800, // Store logins for x seconds.
    ),
    'token' => array(
        'method' => 'sha256',
        'key' => 'demo',
        'lifetime' => 1209600, // Lifetime of the cookie and the token.
        'cookie_key' => '', // The key for the cookie to use.
        'gc' => 100, // Garbage collector is run in 1/100 of times.
    ),
);
