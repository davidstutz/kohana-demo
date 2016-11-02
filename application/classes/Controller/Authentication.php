<?php defined('SYSPATH') or die('No direct script access.');

/**
 * This controller is responsible for authentication: login, logout as well as
 * creating a user and an admin. The credentials are displayed on the login page
 * after creation.
 *
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Controller_Authentication extends Controller_Template {

    /**
     * Login form.
     *
     * Will display a login form and process the logins. Will automatically login a user if he is already logged in.
     */
    public function action_login() {
        
        if (Red::instance()->logged_in()) {
            $this->redirect(Route::get('default')->uri(array('controller' => 'user_config', 'action' => 'list')));
        }
        
        if (Request::POST === $this->request->method()) {
            $remember = Arr::get($this->request->post(), 'remember', FALSE);
            
            if (Red::instance()->login($this->request->post('email'), $this->request->post('password'), $remember)) {
                $this->redirect(Route::get('default')->uri(array('controller' => 'user_config', 'action' => 'list')));
            }
            else {
                Feedback::factory(Feedback::ALERT, 'Login failed. Wrong email or password.');
            }
        }
        
        $this->template->content = View::factory('authentication');
    }

    /**
     * Logout the user.
     *
     * Will logout the user and redirect to the login page
     */
    public function action_logout() {
        Red::instance()->logout(TRUE);

        Feedback::factory(Feedback::SUCCESS, 'Successfully logged out.');
        $this->redirect(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')));
    }
    
    /**
     * Create two users, an admin, and a regular user.
     */
    public function action_create() {
        
        $admin = ORM::factory('User', 1);
        $user = ORM::factory('User', 2);
        
        $admin_role = ORM::factory('User_Role', 1);
        $user_role = ORM::factory('User_Role', 2);
        
        if (!$admin_role->loaded()) {
            // Create two roles: admin and user.
            $admin_role = ORM::factory('User_Role');
            $admin_role->values(array(
                'name' => 'admin',
                'description' => 'Admin user group',
            ));

            $admin_role->save();
        }
        
        if (!$user_role->loaded()) {
            $user_role = ORM::factory('User_Role');
            $user_role->values(array(
                'name' => 'user',
                'description' => 'Normal user group',
            ));

            $user_role->save();
        }
        
        if (!$admin->loaded()) {
            // Create an administrator
            $admin = ORM::factory('User');
            $admin->values(array(
                'first_name' => 'David',
                'last_name' => 'Stutz',
                'email' => 'admin@demo.com',
                'password' => 'admin',
            ));

            $admin->save();
            
            $admin->add('roles', ORM::factory('User_Role', array('name' => 'admin')));
            $admin->save();
        }
        
        if (!$user->loaded()) {
            // Create a regular user
            $user = ORM::factory('User');
            $user->values(array(
                'first_name' => 'David',
                'last_name' => 'Stutz',
                'email' => 'user@demo.com',
                'password' => 'user',
            ));
            
            $user->save();
            
            $user->add('roles', ORM::factory('User_Role', array('name' => 'user')));
            $user->save();
        }
        
        Feedback::factory(Feedback::SUCCESS, 'Successfully create an admin and a user. See below for the login details to use.');
        $this->redirect(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')));
    }
}