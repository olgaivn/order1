<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>
	<div class="jumbotron ">
	<h2> Добавление нового товара </h2>
	<?php  $form=ActiveForm::begin();?>
	<?=$form->field($goods,'name_goods')?>
	<?=$form->field($goods,'date_manufacture')
	->widget(\yii\jui\DatePicker::classname(), [
		'language' => 'ru',
		'dateFormat' => 'yyyy-MM-dd',
	])?>
	<?=$form->field($goods,'shelf_life')?>
	<button class="btn btn-primary" type="submit"> Сохранить </button>
	<?php  ActiveForm::end(); ?>
	</div>