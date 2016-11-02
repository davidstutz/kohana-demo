<?php defined('SYSPATH') OR die('No direct script access.'); ?>

<table class="table table-condensed table-striped">
    <thead>
        <tr>
            <th><?php echo __('First Name'); ?></th>
            <th><?php echo __('Last name'); ?></th>
            <th><?php echo __('E-Mail'); ?></th>
            <th><?php echo __('Roles'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (ORM::factory('User')->find_all() as $user): ?>
            <tr>
                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php foreach ($user->roles->find_all() as $role) echo $role->name . ';' ?></td>
                <td><a href="<?php echo Url::base() . Route::get('default')->uri(array('controller' => 'user_management', 'action' => 'edit', 'id' => $user->id)); ?>"><?php echo __('edit'); ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>