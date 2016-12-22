<?php Use \yii\helpers\Html; ?>
<p> Текущая дата <?php  echo  (new\ DateTime($date_1 = date("Y-m-d")))->format('d.m.Y'); ?> </p>
	
<h1 align="center"> Заказать товар </h1>
<table  class="table">
		<tr>	<br>
			<th  > Номер </th> 
			<th > Наименование товара </th>
			<th  > Дата производства </th>
			<th  > Срок годности, дней  </th>
			
		</tr>	
		
		<?php 
	foreach($goods as $goods){ ?> 
		<tr>
			<td><?=$goods->id_goods ?> </td>
			<td><?=htmlspecialchars( $goods->name_goods)?> </td>
			<td><?=htmlspecialchars( $goods->date_manufacture)?> </td>
			<td><?=htmlspecialchars( $goods->shelf_life)?> </td>
		</tr>	
		<?php } ?>
		<tr>
		<td ></td>
		<td colspan="4" align="center"><?= Html::a('<span class="glyphicon glyphicon-th-list"></span> Заказать товар', ['order/add'], ['class'=>'btn btn-primary']) ?>
		</td>
	</tr>

		
	</table>	