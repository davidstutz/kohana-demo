<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Simple feedback helper. Through a factory, different messages can be added
 * and are then displayed in the template. The messages are stored in the session.
 * Note the $driver variable!
 *
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Feedback {

    const ALERT = 'danger';
    const INFO = 'info';
    const SUCCESS = 'success';

    /**
     * @var	string	session driver
     */
    public static $driver = 'native';

    /**
     * Factory for new feedback message.
     *
     * @param	string	type
     * @param	string	message
     * @param	boolean	translate
     */
    public static function factory($type, $message, $translate = TRUE) {
        $message = $translate ? __($message) : $message;

        $notifications = Feedback::get();
        $notifications[$message] = View::factory('alert', array(
            'type' => $type,
            'message' => ($translate ? __($message) : $message),
            'created' => time(),
        ));

        Session::instance(Feedback::$driver)->set('feedback', $notifications);
    }

    /**
     * Get all notifications as array.
     *
     * @return	array   feedback
     */
    public static function get() {
        return Session::instance(Feedback::$driver)->get_once('feedback', array());
    }

}