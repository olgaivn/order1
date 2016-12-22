<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?><div  class="jumbotron">
<h2> Заказ</h2>
<?php $form = ActiveForm::begin();?>
<?= $form->field($customer, 'name_company')  ?>
<?= $form->field($customer, 'head') ?>
<?= $form->field($customer, 'phone')  ?>
<?= $form->field($customer, 'address')  ?>
<?= $form->field($order, 'id_goodss')->listBox(ArrayHelper::map($goods, 'id_goods', 'name_goods'))  ?>
<?= $form->field($order, 'quantity') ?>

<button class="btn btn-primary" type="submit" > Отправить </button>
<?php ActiveForm::end();?>
</div>
