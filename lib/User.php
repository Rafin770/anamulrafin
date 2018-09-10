<?php 

include_once 'Session.php';
include 'Database.php';

class User
{
	private $db;

	public function __construct() {
		$this -> db = new Database();
	}

	public function emailCheck($email) 
	{
		$sql = "SELECT email FROM user WHERE email = :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email', $email);
		$query->execute();
		if ($query->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function sendWelcomeMessage($email, $first_name, $last_name)
	{
		$msg = "<h2>Welcome ".$first_name." ".$last_name."</h2>
				<hr/>
				We are very glad to see that you have just registered to our system. You are cordially welcomed.
				<br/>
				Thank You";

				$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$headers .= "X-Mailer: PHP \r\n";
				$headers .= 'From: admin@anamulrafin.com' . "\r\n";
				$headers .= 'Reply-To: ".$email."' . "\r\n";

		mail($email, "Automobile Sales System", $msg, $headers);
	}

	public function userRegistration($data)
	{
		$first_name	= $data['first_name'];
		$last_name	= $data['last_name'];
		$cell 		= $data['cell'];
		$email 		= $data['email'];
		$password 	= $data['password'];
		$address 	= $data['address'];
		$city 		= $data['city'];
		$country 	= $data['country'];
		$pincode 	= $data['pincode'];
		$gender 	= $data['gender'];

		$chk_email	= $this->emailCheck($email);

		if($first_name == "" OR $last_name == "" OR $cell == "" OR $email == "" OR $password == "" OR $address == "" OR $city == "" OR $country == "" OR $pincode == "" OR $gender == "")
		{
			$msg = '<span style="color: red; font-size: 30px;">Fields must not be empty!!!</span>';
			return $msg;
		}

		if(strlen($password) < 5)
		{
			$msg = '<span style="color: red; font-size: 30px;">Password must be more than 5 digits long!!!</span>';
			return $msg;
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
		{
			$msg = '<span style="color: red; font-size: 30px;">Email address is not valid!!!</span>';
			return $msg;
		}

		if ($chk_email == true) 
		{
			$msg = '<span style="color: red; font-size: 30px;">Email address already exists!!!</span>';
			return $msg;
		}

		$sql = "INSERT INTO user(first_name, last_name, cell, email, password, address, city, country, pincode, gender) VALUES(:first_name, :last_name, :cell, :email, :password, :address, :city, :country, :pincode, :gender)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':first_name', $first_name);
		$query->bindValue(':last_name', $last_name);
		$query->bindValue(':cell', $cell);
		$query->bindValue(':email', $email);
		$query->bindValue(':password', $password);
		$query->bindValue(':address', $address);
		$query->bindValue(':city', $city);
		$query->bindValue(':country', $country);
		$query->bindValue(':pincode', $pincode);
		$query->bindValue(':gender', $gender);
		$result = $query->execute();

		if ($result) 
		{
			$this->sendWelcomeMessage($email, $first_name, $last_name);

			$msg = '<span style="color: green; font-size: 30px;">Welcome to our service!!!</span>';
			return $msg;
		} 
		else 
		{
			$msg = $msg = '<span style="color: red; font-size: 30px;">Error! Something went wrong!</span>';
			return $msg;
		}

	}

	public function getLoginUser($email, $password) 
	{
		$sql = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email', $email);
		$query->bindValue(':password', $password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function userLogin($data)
	{
		$email		= $data['email'];
		$password	= $data['password'];

		$chk_email	= $this->emailCheck($email);

		if ($email == "" OR $password == "") 
		{
			$msg = '<span style="color: red; font-size: 30px;">Error! Fields must not be empty!!!</span>';
			return $msg;
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
		{
			$msg = '<span style="color: red; font-size: 30px;">Error! Email address is not valid!!!</span>';
			return $msg;
		}

		if ($chk_email == false) 
		{
			$msg = '<span style="color: red; font-size: 30px;">Error! Email address not exists!!!</span>';
			return $msg;
		}

		$result = $this->getLoginUser($email, $password);

		if ($result) 
		{
			Session::init();
			Session::set("login", true);
			Session::set("id", $result->id);
			Session::set("first_name", $result->first_name);
			Session::set("last_name", $result->last_name);
			Session::set("email", $result->email);
			Session::set("type", $result->type);
			Session::set("loginmsg", "<span style='color: green; font-size: 30px;'>Success! You are logged in!!!</span>");
			// header("Location: dashboard.php");
			echo "<script type='text/javascript'>window.top.location='dashboard.php';</script>";
		} 
		else 
		{
			$msg = '<span style="color: red; font-size: 30px;">Error! Data not found!!!</span>';
			return $msg;
		}

	}

	public function getUserById($id)
	{
		$sql = "SELECT * FROM user WHERE id = :id LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function updateUserData($id, $data)
	{
		$first_name	= $data['first_name'];
		$last_name	= $data['last_name'];
		$cell 		= $data['cell'];
		$address 	= $data['address'];
		$city 		= $data['city'];
		$country 	= $data['country'];
		$pincode 	= $data['pincode'];

		if($first_name == "" OR $last_name == "" OR $cell == "" OR $address == "" OR $city == "" OR $country == "" OR $pincode == "")
		{
			$msg = '<span style="color: red; font-size: 30px;">Fields must not be empty!!!</span>';
			return $msg;
		}

		$sql = "UPDATE user SET
				first_name 	= :first_name,
				last_name 	= :last_name,
				cell 		= :cell,
				address 	= :address,
				city 		= :city,
				country 	= :country,
				pincode 	= :pincode
				WHERE id 	= :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':first_name', $first_name);
		$query->bindValue(':last_name', $last_name);
		$query->bindValue(':cell', $cell);
		$query->bindValue(':address', $address);
		$query->bindValue(':city', $city);
		$query->bindValue(':country', $country);
		$query->bindValue(':pincode', $pincode);
		$query->bindValue(':id', $id);
		$result = $query->execute();

		if ($result) 
		{
			$msg = '<span style="color: red; font-size: 30px;">Userdata updated Successfully!!!</span>';
			return $msg;
		} 
		else 
		{
			$msg = '<span style="color: red; font-size: 30px;">Userdata Not Updated Yet!!!</span>';
			return $msg;
		}



	}
	
}


?>