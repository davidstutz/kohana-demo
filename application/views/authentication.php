<?php defined('SYSPATH') OR die('No direct script access.'); ?>

<div class="row">
    <div class="col-md-6">
        <?php
            $admin = ORM::factory('User', 1);
            $user = ORM::factory('User', 2);
            
            if ($user->loaded() && $admin->loaded()):
        ?>
            <table class="table table-condensed table-striped">
                <tr>
                    <td></td>
                    <td>E-Mail</td>
                    <td>Password</td>
                </tr>
                <tr>
                    <th>Administrator</th>
                    <td><?php echo $admin->email; ?></td>
                    <td>admin</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td><?php echo $user->email; ?></td>
                    <td>user</td>
                </tr>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">
                <?php echo __('You are starting this demo the first time. Please use the following link to create an admin and a user to login with.'); ?>
            </div>
            <a href="<?php echo Url::base() . Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'create')); ?>" class="btn btn-primary">Create Administrator and User</a>
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <?php echo Form::open(Route::get('default')->uri(array('controller' => 'authentication', 'action' => 'login')), array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email"><?php echo __('Email'); ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password"><?php echo __('Password'); ?></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="remember">
                            <input type="checkbox" name="remember"> <?php echo __('Remember me'); ?>
                        </label>
                    </div>
                </div>
            </div>
        <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><?php echo __('Login'); ?></button>
                </div>
            </div>
        <?php echo Form::close(); ?>
    </div>
</div>