<?php Use \yii\helpers\Html; ?>
<h1 align="center"> Архив выполненных заказов </h1>

<table class="table ">
  <tr class="danger" >
	
	<th class="in">№ заказа</th>
	<th class="in">Дата заказа</th>
	<th class="in">Товар</th>
	<th class="in">Заказчик</th>
	<th class="in">Количество</th>
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
		<?= Html::a('<span class="glyphicon glyphicon-remove"></span> Удалить', ['order/del', 'id_order' =>$order->id_order], ['class'=>'btn btn-primary']); ?>
	</td>
  </tr>
  <?php } ?>

 </table>