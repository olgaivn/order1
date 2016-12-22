 <?php use \yii\helpers\html;?>
<table class="table">
	<tr>
		<th>Номер</th>
		<th>Название товара</th>
	
	</tr>	
<?php foreach($goods as $goodss) { ?>
<tr>
	<td><?=$goodss->id_goods ?> </td>
	<td><?=htmlspecialchars( $goodss->name_goods)?> </td>

</tr>	
<?php } ?>
 </table>