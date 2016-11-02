<?php defined('SYSPATH') OR die('No direct script access.'); ?>

<p class="alert alert-info">
    <?php echo __('User logging, i.e. which controllers where accessed. Demonstrates the usage of Kohana Green and Kohana Yellow to control and log access control.'); ?>
</p>

<table class="table table-condensed table-striped">
    <thead>
        <tr>
            <th><?php echo __('User'); ?></th>
            <th><?php echo __('Controller'); ?></th>
            <th><?php echo __('Time'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (ORM::factory('log_controller')->order_by('created', 'DESC')->find_all() as $log): ?>
        <tr>
            <td><?php echo $log->user->first_name . ' ' . $log->user->last_name; ?></td>
            <td><?php echo $log->controller; ?></td>
            <td><?php echo date('d. M Y H:i:s', $log->created); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>