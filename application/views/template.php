<?php defined('SYSPATH') OR die('No direct script access.'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo __('Kohana Demo Application'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL::base() . 'cache/' . Media::instance()->css('screen')->render(); ?>">
        <script type="text/javascript" src="<?php echo URL::base() . 'cache/' . Media::instance()->js()->render(); ?>"></script>
    </head>
    <body>
        <div style="margin-top:24px" class="container">
            
        </div>
        <div class="container">
            <div class="jumbotron">
                <h1><?php echo __('Kohana Demo Application'); ?></h1>
                <p>
                    <?php echo __('Demo application demonstrating the use of the following modules:'); ?>
                    &nbsp;<a href="https://github.com/davidstutz/kohana-red">Kohana Red</a>,
                    &nbsp;<a href="https://github.com/davidstutz/kohana-green">Kohana Green</a>,
                    &nbsp;<a href="https://github.com/davidstutz/kohana-blue">Kohana Blue</a>,
                    &nbsp;<a href="https://github.com/davidstutz/kohana-yellow">Kohana Yellow</a>,
                    &nbsp;<a href="https://github.com/davidstutz/kohana-gaps">Kohana Gaps</a>,
                    &nbsp;<a href="https://github.com/davidstutz/kohana-navigation">Kohana Navigation</a>
                </p>
            </div>
            
            <?php if (Red::instance()->logged_in() && Blue::instance()->load('navigation', 'top', FALSE) == TRUE): ?>
                <div style="margin-bottom:24px;">
                    <?php echo Navigation::instance('default')->render('bootstrap3/pills'); ?>
                </div>
            <?php elseif(Red::instance()->logged_in()): ?>
                <div class="row">
                    <div class="col-md-3">
                        <?php echo Navigation::instance('default')->render('bootstrap3/pills_stacked'); ?>
                    </div>
                    <div class="col-md-9">
            <?php endif; ?>
            
            <?php foreach (Feedback::get() as $notification): ?>
                <?php echo $notification; ?>
            <?php endforeach; ?>
                        
            <?php echo $content; ?>
                        
            <?php if (Red::instance()->logged_in() && Blue::instance()->load('navigation', 'top', FALSE) == FALSE): ?>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <?php echo __('Kohana:'); ?>&nbsp;3.3.6
            &nbsp;&dash;&nbsp;
            <?php echo __('Controller:'); ?>&nbsp;<?php echo Request::current()->controller(); ?>
            &nbsp;&dash;&nbsp;
            <?php echo __('Action:'); ?>&nbsp;<?php echo Request::current()->action(); ?>
        </div>
    </body>
</html>