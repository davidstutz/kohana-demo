<?php defined('SYSPATH') or die('No direct script access.');

/**
 * This controller is able to list all access logs, i.e. which controllers
 * have been accessed by which users and when.
 * 
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Controller_User_Logs extends Controller_Template {

    /**
     * Before.
     */
    public function before() {
        parent::before();
        
        // Check if user is logged in.
        if (!Red::instance()->logged_in()) {
            Feedback::factory(Feedback::ALERT, 'Login before acessing this site.');
            $this->request->redirect(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')));
        }
        
        try {
            Green::instance()->proceed();
        } catch (Green_Exception $e) {
            Feedback::factory(Feedback::ALERT, 'Access only for administrators.');
            $this->request->redirect(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')));
        }
        
        // Set the current menu item active.
        Navigation::instance('default')->breadcrumb('user_logs');
    }
    
    /**
     * List configuration options.
     */
    public function action_list() {
        $this->template->content = View::factory('user_logs');
    }
}