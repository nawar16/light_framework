<?php
/** @var $model \app\models\User */
?>

<br><h1>Login</h1><br><br>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
    <br><button type="submit" class="btn btn-primary">Submit</button>
<?php echo \app\core\form\Form::end() ?>