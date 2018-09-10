<?php 

include 'Database.php';


class Order
{
	private $db;

	public function __construct() 
	{
		$this -> db = new Database();
	}

	public function getOrder()
	{
		$sql = "SELECT tbl_order.id as id, tbl_order.delivered,
				user.email, 
				vehicle.model, vehicle.company, vehicle.price 
				FROM tbl_order 
				JOIN user
				ON tbl_order.user_id = user.id
				JOIN vehicle
				ON tbl_order.vehicle_id = vehicle.id
				ORDER BY tbl_order.id DESC;";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
	
	public function makeOrder($vehicle_id)
	{
		if(Session::get("login") != true)
		{
			echo "<script type='text/javascript'>window.top.location='login.php';</script>";
		}
		else
		{
			if($vehicle_id == "")
			{
				$msg = '<span style="color: red; font-size: 30px;">Something went wrong!!!</span>';
				return $msg;
			}
			else
			{
				$user_id = Session::get("id");

				$sql = "INSERT INTO tbl_order(user_id, vehicle_id) VALUES(:user_id, :vehicle_id);";
				$query = $this->db->pdo->prepare($sql);
				$query->bindValue(':user_id', $user_id);
				$query->bindValue(':vehicle_id', $vehicle_id);
				$result = $query->execute();
				$msg = '<span style="color: green; font-size: 30px;">Please, specify your reachable phone number or EMAIL address. YOU MAY BE GIVEN A CALL or send mail TO VERIFY AND COMPLETE THE ORDER.!!!</span>';
				return $msg;
			}
		}

	}

	public function deliveryOrder($tbl_order_id)
	{
		$delivered = 1;

		$sql = "UPDATE tbl_order 
				SET
				delivered 	= :delivered
				WHERE 
				id 	= :tbl_order_id;";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':delivered', $delivered);
		$query->bindValue(':tbl_order_id', $tbl_order_id);
		$result = $query->execute();

		header('Location:voucher.php?order_id='.$tbl_order_id);

		// $msg = '<span style="color: green; font-size: 30px;">Vehicle Delivered Successfully!!!</span>';
		// return $msg;
	}

	private function sendMail($result)
	{
		foreach($result as $value)
		{		

		$msg = "<h2>Car Purchased</h2>
				<hr/>
				Model: ".$value['model']."
				<br/>
				Company: ".$value['company']."
				<br/>
				Price: ".$value['price']."
				<br/>
				Thank You";

				$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$headers .= "X-Mailer: PHP \r\n";
				$headers .= 'From: ".$name."<".$email.">' . "\r\n";
				$headers .= 'Reply-To: ".$email."' . "\r\n";

		// $msg = wordwrap($msg,70);

		mail($value['email'], "Car Purchase", $msg, $headers);
		 
		}
	}

	public function getOrderById($id)
	{
		$sql = "SELECT tbl_order.id as id, tbl_order.delivered,
				user.first_name, user.last_name, user.email, user.address,
				vehicle.model, vehicle.company, vehicle.price 
				FROM tbl_order 
				JOIN user
				ON tbl_order.user_id = user.id
				JOIN vehicle
				ON tbl_order.vehicle_id = vehicle.id
				WHERE
				tbl_order.id = :id;";

		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetchAll();

		$this->sendMail($result);

		return $result;
	}

	public function cancelOrder($id)
	{
		$sql = "DELETE FROM tbl_order WHERE id = :id;";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$result = $query->execute();
		if($result)
		{
			$msg = '<span style="color: green; font-size: 30px;">Order Canceled Successfully!!!</span>';
			return $msg;
		}
	}

}

?>