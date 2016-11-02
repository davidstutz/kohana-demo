<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Encryption config for database session driver.
 * 
 * @package     Kohana Demo
 * @author      David Stutz
 * @copyright   (c) 2016 David Stutz
 * @license     https://github.com/davidstutz/kohana-demo
 */
return array(
    'default' => array(
        /**
         * The following options must be set:
         *
         * string   key     secret passphrase
         * integer  mode    encryption mode, one of MCRYPT_MODE_*
         * integer  cipher  encryption cipher, one of the Mcrpyt cipher constants
         */
        'key' => 'demo',
        'cipher' => MCRYPT_RIJNDAEL_128,
        'mode'   => MCRYPT_MODE_NOFB,
    ),
);
