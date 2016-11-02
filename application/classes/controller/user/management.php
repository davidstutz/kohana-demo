<?php defined('SYSPATH') or die('No direct script access.');

/**
 * This controller is used for user management, listing and editing all available
 * users. For this application this will be the user and the admin. The credentials
 * are available on the login page after installation.
 *
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Controller_User_Management extends Controller_Template {

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
        Navigation::instance('default')->breadcrumb('user_management');
    }
    
    /**
     * List configuration options.
     */
    public function action_list() {
        $this->template->content = View::factory('user_management');
    }
    
    /**
     * Edit a user.
     */
    public function action_edit() {
        
        $id = $this->request->param('id');
        $user = ORM::factory('user', $id);
        
        if (!$user->loaded()) {
            $this->request->redirect(Route::get('default')->uri(array('controller' => 'user_management', 'action' => 'list')));
        }
        
        $form = Gaps::form($user);
        if ($this->request->method() === Request::POST) {
            if ($form->load($_POST)) {
                $form->save();
                $form->save_rels();
                Feedback::factory(Feedback::SUCCESS, __('Successfully saved chagnes.'));
            }
            else {
                foreach ($form->errors() as $error) {
                    Feedback::factory(Feedback::ALERT, $error);
                }
            }
        }
        
        $this->template->content = View::factory('user_edit', array('form' => $form));
    }
}