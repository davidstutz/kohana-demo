<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Red_User is overwritten in order to provide the configuration for
 * Gaps.
 *
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Model_User extends Model_Red_User {
    /**
     * Gaps configuration.
     * 
     * @return    array     gaps configuration
     */
    public function gaps() {
        return array(
            array(
                'first_name' => array(
                    'label' => 'First name',
                    'rules' => array(
                        array('not_empty', array(':value')),
                    ),
                ),
                'last_name' => array(
                    'label' => 'Last name',
                    'rules' => array(
                        array('not_empty', array(':value')),
                    ),
                ),
            ),
            array(
                'email' => array(
                    'label' => 'Email',
                    'rules' => array(
                        array('email', array(':value')),
                        array('not_empty', array(':value')),
                    ),
                ),
            ),
            array(
                'password' => array(
                    'label' => 'Password',
                    'driver' => 'password_confirm',
                    'rules' => array(
                        array('not_empty', array(':value')),
                        array('matches', array(':validation', 'password', 'password_confirm')),
                    ),
                ),
            ),
            array(
                'roles' => array(
                    'label' => 'Roles',
                    'orm' => 'name',
                    'rules' => array(
                        array('not_empty', array(':value')),
                    )
                )
            )
        );
    }
}
