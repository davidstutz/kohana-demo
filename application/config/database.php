<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Database configuration. Can be copied from modules/database/config/database.php.
 * The below configuration assumes a MySQL database running locally with database
 * name demo_336 and root user without password. This can easily be setup using
 * XAMPP (Windows) or LAMPP (Linux).
 * 
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
return array
(
    'default' => array(
        'type'       => 'MySQL',
        'connection' => array(
            'hostname'   => 'localhost',
            'database'   => 'kohana_demo',
            'username'   => 'root',
            'password'   => FALSE,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => FALSE,
    ),
);
