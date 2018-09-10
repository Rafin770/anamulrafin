<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Voucher</title>
	<script type="text/javascript">window.print();</script>
 
</head>
<body>

<h2 style="text-align: center;">Voucher</h2>

<hr/>

<table width=680 border="0" cellpadding="20" cellspacing="0">

	<?php

	include 'lib/Order.php';

	$order = new Order;

	if(isset($_GET['order_id']))
	{
		$getOrderById = $order->getOrderById($_GET['order_id']);
	}

	if ($getOrderById) 
    {
        foreach ($getOrderById as $value) 
        { ?>
			
			<tr align="center">
				<td width="30px">Name</td>
				<td width="90px"><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
			</tr>
			<tr align="center">
				<td width="30px">Email</td>
				<td width="90px"><?php echo $value['email']; ?></td>
			</tr>
			<tr align="center">
				<td width="30px">Address</td>
				<td width="90px"><?php echo $value['address']; ?></td>
			</tr>
			<tr align="center">
				<td width="30px">Vehicle Company</td>
				<td width="90px"><?php echo $value['company']; ?></td>
			</tr>
			<tr align="center">
				<td width="30px">Vehicle Model</td>
				<td width="90px"><?php echo $value['model']; ?></td>
			</tr>
			<tr align="center">
				<td width="30px">Price</td>
				<td width="90px"><?php echo $value['price']; ?></td>
			</tr> <?php 

		}

	}

	?>

		
</table>

<br/><br/><br/><br/><br/><br/><br/><br/>

<span style="margin-left: 600px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...............................</span>
<span style="margin-left: 600px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Received By</span>
<br/><br/><br/><br/><br/><br/><br/><br/>
<script language="javascript">var today = new Date(); document.write(today); </script>
</body>
</html>