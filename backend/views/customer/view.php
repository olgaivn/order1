<div class="jumbotron">
  <h2><?=htmlspecialchars($customer->name_company); ?>  </h2>
  <p> Директор: <?=htmlspecialchars($customer->head); ?> </p>
  <p>Телефон:  <?=htmlspecialchars($customer->phone); ?></p>
  <p>Адрес:  <?=htmlspecialchars($customer->address); ?></p>
  <h3>История заказов</h3>
  <ul>
  <?php foreach($customer->getOrders()->all() as $order) { ?>
	<ul><?php
	echo $order->date_order;
	?>:<?php
	if ($order->status=="1"){
		echo 'Заказ выполнен';
	}else{
		echo 'Заказ не выполнен';
	}
	?> </ul>
	<?php } ?>
</div>