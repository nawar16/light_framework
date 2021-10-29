<?php
/** @var $model \app\models\User */
?>

<br><h1>Register</h1><br><br>
<?php $form = nawar\framework\form\Form::begin('', "post") ?>
     <div class="row">
         <div class="col">
             <?php echo $form->field($model, 'first_name') ?>
         </div>
         <div class="col">
             <?php echo $form->field($model, 'last_name') ?>
         </div>
     </div>
     <?php echo $form->field($model, 'email') ?>
     <?php echo $form->field($model, 'password')->passwordField() ?>
     <?php echo $form->field($model, 'confirm_password')->passwordField() ?>
     <button type="submit" class="btn btn-primary">Submit</button>
<?php echo \nawar\framework\form\Form::end() ?>