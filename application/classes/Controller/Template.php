<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Base template for setting up navigation and including bootstrap.css.
 *
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
class Controller_Template extends Kohana_Controller_Template {

    /**
     * Used template.
     */
    public $template = 'template';
    
    /**
     * Before.
     */
    public function before() {
        parent::before();
        
        // Setup navigation using the array loader.
        $array = array();
        
        if (Green::instance()->has_role('admin')) {
            $array['user_management'] = array(
                'label' => 'User Management',
                'uri' => 'user_management/list',
            );
        }
        
        $array['user_logs'] = array(
            'label' => 'User Logs',
            'uri' => 'user_logs/list',
        );
         $array['user_config'] = array(
            'label' => 'User Configuration',
            'uri' => 'user_config/list',
        );
         $array['logout'] = array(
            'label' => 'Logout',
            'uri' => 'authentication/logout',
        );
        
        Navigation::instance('default')->load('array', $array);
        
        // Will add media/bootstrap.css, see views/template.php on how to enqueue
        // the media files.
        Media::instance()->css('screen')->add('bootstrap.css');
    }
}