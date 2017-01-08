<?php Use \yii\helpers\Html; ?>

<h1 align="center"> Заказы активные </h1>
<table  class="table">
  <tr class="danger"><br>
	<th >№ заказа</th>
	<th >Дата заказа</th>
	<th >Товар</th>
	<th >Заказчик</th>
	<th >Количество</th>
	<th></th>
  </tr>
  <?php foreach($order as $order){ ?>
  <tr class="danger1">
	<td><?= $order->id_order ?></td>
	<td><?= htmlspecialchars($order->date_order) ?></td>
	<td><?= htmlspecialchars($order->getIdGoodss()->one()->name_goods) ?></td>
	<td><?= htmlspecialchars($order->getIdCustomers()->one()->name_company) ?>  </td>
	<td><?= htmlspecialchars($order->quantity) ?></td>
	<td>
		<?= Html::a('<span class="glyphicon glyphicon-edit"></span> Редактировать', ['order/edit', 'id_order' =>$order->id_order], ['class'=>'btn btn-primary']) ?>
		<?= Html::a('<span class="glyphicon glyphicon-remove"></span> Удалить', ['order/delete', 'id_order' =>$order->id_order], ['class'=>'btn btn-primary']); ?>
	</td>
  </tr>
  <?php } ?>

 </table>
