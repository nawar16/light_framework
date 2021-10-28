<?php
/** @var $this \app\core\View */

use app\core\form\Form;
use app\core\form\TextareaField;

/** @var $model \app\models\ContactForm */
$this->title = 'Contact';
?>

<br><h1>Contatc us</h1><br><br>
<?php $form = Form::begin('', "post") ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
    <br><button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end() ?>