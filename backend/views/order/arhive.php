<?php Use \yii\helpers\Html; ?>
<table class="jumbotron ">
  <tr>
	
	<th class="in">№ заказа</th>
	<th class="in">Дата заказа</th>
	<th class="in">Товар</th>
	<th class="in">Заказчик</th>
	<th class="in">Количество</th>
	<th></th>
  </tr>
  <?php foreach($order as $order){ ?>
  <tr>
	<td><?= $order->id_order ?></td>
	<td><?= htmlspecialchars($order->date_order) ?></td>
	<td><?= htmlspecialchars($order->getIdOrder0()->one()->name_goods) ?></td>
	<td><?= htmlspecialchars($order->getIdOrder()->one()->name_company) ?>  </td>
	<td><?= htmlspecialchars($order->quantity) ?></td>
	<td>
		<?= Html::a('<span class="glyphicon glyphicon-remove"></span> Удалить', ['order/del', 'id_order' =>$order->id_order], ['class'=>'btn btn-primary']); ?>
	</td>
  </tr>
  <?php } ?>

 </table>