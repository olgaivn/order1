<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="jumbotron ">
<p><?= htmlspecialchars($order->date_order) ?></p>
<h2> Редактировать заказ</h2>
<?php $form = ActiveForm::begin();?>
<?= $form->field($order, 'id_goodss')->listBox(ArrayHelper::map($goods, 'id_goods', 'name_goods')) ?>
<?= $form->field($order, 'id_customers')->listBox(ArrayHelper::map($customer, 'id_customer', 'name_company')) ?>
<?= $form->field($order, 'quantity') ?>
<?= $form->field($order, 'status')->checkBox() ?>

<button class="btn btn-primary" type="submit" > Сохранить </button>
<?php ActiveForm::end();?>
</div>