<?php Use \yii\helpers\Html; ?>


<h1 align="center"> Заказчики </h1>
<table  class="table">
  <tr class="danger"><br>
	<th >№ </th>
	<th >название компании</th>
	<th>Владелец</th>
	
	<th></th>
  </tr>
  <?php foreach($customer as $customer){ ?>
  <tr class="danger1">
	<td><?= $customer->id_customer ?></td>
	<td><?= htmlspecialchars($customer->name_company) ?></td>
	<td><?= htmlspecialchars($customer->head) ?></td>

	<td>
		<?= Html::a('<span class="glyphicon glyphicon-th-list"></span> Подробнее', ['customer/view', 'id_customer' =>$customer->id_customer], ['class'=>'btn btn-primary']) ?>
		
	</td>
	
  </tr>
   <?php } ?>
	

 </table>