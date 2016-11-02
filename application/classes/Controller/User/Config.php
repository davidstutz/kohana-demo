<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Controller to create and edit user configuration. In this application,
 * the user configuration does only contain one option: navigation.top determining
 * whether the navigation is to be displayed on the top.
 * 
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Controller_User_Config extends Controller_Template {

    /**
     * Before.
     */
    public function before() {
        parent::before();
        
        // Check if user is logged in.
        if (!Red::instance()->logged_in()) {
            Feedback::factory(Feedback::ALERT, 'Login before acessing this site.');
            $this->redirect(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')));
        }
        
        try {
            Green::instance()->proceed();
        } catch (Green_Exception $e) {
            Feedback::factory(Feedback::ALERT, 'Access only for administrators.');
            $this->redirect(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')));
        }
        
        // Set the current menu item active.
        Navigation::instance('default')->breadcrumb('user_config');
    }
    
    /**
     * Create some demo configuration options.
     */
    public function action_create() {
        if (Blue::instance()->load('navigation', 'top') == NULL) {
            Blue::instance()->write('navigation', 'top', False);
        }
        
        Feedback::factory(Feedback::SUCCESS, 'Successfully created option navigation.top.');
        $this->redirect(Route::get('default')->uri(array('controller' => 'user_config', 'action' => 'list')));
    }
    
    /**
     * List configuration options.
     */
    public function action_list() {
        if ($this->request->method() === Request::POST) {
            $navigation_top = Arr::get($_POST, 'navigation_top', FALSE);
            
            if ($navigation_top) {
                Blue::instance()->write('navigation', 'top', TRUE);
            }
            else {
                Blue::instance()->write('navigation', 'top', FALSE);
            }
        }
        
        $this->template->content = View::factory('user_config');
    }
}