<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Green module configuration defines that all controller access is logged
 * using the Yellow module.
 * 
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
return array(
    'logger' => array(
        'model' => FALSE,
        'controller' => new Yellow(Yellow::CONTROLLER),
    ),
);