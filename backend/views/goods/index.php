<?php Use \yii\helpers\Html; ?>
<h1 align="center"> Продукция </h1>

<table class="table ">
  <tr class="danger">
	
	<th></th>
	<th class="in">Название</th>
	<th class="in"> Дата производства</th>
	<th class="in">Срок годности</th>
	<th ></th>
	<th></th>
  </tr>
  <?php foreach($goods as $goods){ ?>
  <tr class="danger1">
	<td><?= $goods->id_goods ?></td>
	<td><?= htmlspecialchars($goods->name_goods) ?></td>
	<td><?= htmlspecialchars($goods->date_manufacture) ?></td>
	<td><?= htmlspecialchars($goods->shelf_life) ?></td>
	
	<td>
		<?= Html::a('<span class="glyphicon glyphicon-edit"></span> Редактировать', ['goods/edit', 'id_goods' =>$goods->id_goods], ['class'=>'btn btn-primary']) ?>
	</td>
	
  </tr>
   <?php } ?>
	<tr>
		<td colspan="4"></td>
		<td><?= Html::a('<span class="glyphicon glyphicon-plus"></span>  Добавить', ['goods/add']) ?></td>
	</tr>

 </table>