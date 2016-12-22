<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="jumbotron ">
<h2> Добавить заказчика</h2>
<?php $form = ActiveForm::begin();?>
<?= $form->field($customer, 'name_company') ?>
<?= $form->field($customer, 'head') ?>
<?= $form->field($customer, 'phone') ?>
<?= $form->field($customer, 'address') ?>

<button class="btn btn-primary" type="submit" > Сохранить </button>
<?php ActiveForm::end();?>
</div>