<?php 
use app\core\form\Form;
?>
<h3>Create an Account</h3>

<?php $form = Form::begin('', 'post') ?>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->field($model, 'firstname') ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->field($model, 'lastname') ?>
    </div>
</div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Register</button>
<?php Form::end(); ?>
