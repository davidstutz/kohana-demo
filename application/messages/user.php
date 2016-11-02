<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Validation messages for users. Also see the Gaps configuration in Model_User.
 *
 * @author      David Stutz
 * @copyright   (c) 2013 David Stutz
 */
return array(
    'first_name' => array(
        'not_empty' => __('Fill a first name.'),
        'default' => __('First name invalid.'),
    ),
    'last_name' => array(
        'not_empty' => __('Fill a last name.'),
        'default' => __('Last name invalid.'),
    ),
    'email' => array(
        'mail' => __('Not a valid e-mail address.'),
        'default' => __('E-Mail invalid.'),
        'Model_User::unique_email' => __('This email address is already in use. Are you sure you are not already registered?'),
    ),
    'password' => array(
        'not_empty' => __('Password cannot be empty.'),
        'matches' => __('Passwords do not match.'),
        'default' => __('Password invalid.'),
    ),
    'roles' => array(
        'not_empty' => __('Select a role.'),
        'default' => __('Roles invalid.'),
    )
);