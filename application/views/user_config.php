<?php defined('SYSPATH') OR die('No direct script access.'); ?>

<?php if (Blue::instance()->load('navigation', 'top', NULL) === NULL): ?>
    <p class="alert alert-warning">
        <?php echo __('No configuration option found. Click the link below to create an option.'); ?>
    </p>
    <a class="btn btn-primary" href="<?php echo Url::base() . Route::get('default')->uri(array('controller' => 'user_config', 'action' => 'create')); ?>">
        <?php echo __('Create Configuration Option'); ?>
    </a>
<?php else: ?>
    <p class="alert alert-info">
        <?php echo __('If checked, the navigation will be displayed on the top. This demonstrates the usage of Kohana Blue to manage user configurations.'); ?>
    </p>
    <?php echo Form::open(NULL, array('class' => 'form-horizontal')); ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="navigation.top" value="navigation_top" <?php if (Blue::instance()->load('navigation', 'top') == TRUE): ?>checked<?php endif; ?> /> <?php echo __('navigation.top'); ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><?php echo __('Save'); ?></button>
            </div>
        </div>
    <?php echo Form::close(); ?>
<?php endif; ?>
