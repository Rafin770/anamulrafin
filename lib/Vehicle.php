<?php

include 'Database.php';

if (class_exists('Vehicle') != true) 
{

	class Vehicle
	{
		private $db;

		public function __construct() 
		{
			$this -> db = new Database();
		}

		public function getVehicle()
		{
			$sql = "SELECT * FROM vehicle ORDER BY id DESC;";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}

		public function addVehicle($data, $file)
		{
			$name 			= $data['name'];
			$model 			= $data['model'];
			$type 			= $data['type'];
			$company 		= $data['company'];
			$description 	= $data['description'];
			$price 			= $data['price'];

			// image
	        $permited  = array('jpg', 'jpeg', 'png', 'gif');
	        $file_name = $file['image']['name'];
	        $file_size = $file['image']['size'];
	        $file_temp = $file['image']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	        $uploaded_image = "uploads/".$unique_image;

	        if($name == "" OR $model == "" OR $type == "" OR $company == "" OR $description == "" OR $price == "" OR $file_name == "")
	        {
	        	$msg = '<span style="color: red; font-size: 30px;">Fields must not be empty!!!</span>';
				return $msg;
	        }

	        if($file_size > 1048567)
	        {
	        	$msg = '<span style="color: red; font-size: 30px;">Image Size should be less then 1MB!!!</span>';
				return $msg;
	        }

	        if (in_array($file_ext, $permited) === false)
	        {
	        	$msg = '<span style="color: red; font-size: 30px;">
	        	You can upload only:-' .implode(", ", $permited).
	        	'</span>';
				return $msg;
	        }

	        move_uploaded_file($file_temp, $uploaded_image);
	        $sql = "INSERT INTO vehicle(name, model, type, company, description, price, image) VALUES(:name,  :model, :type, :company, :description, :price, :image);";
	        $query = $this->db->pdo->prepare($sql);
	        $query->bindValue(':name', $name);
			$query->bindValue(':model', $model);
			$query->bindValue(':type', $type);
			$query->bindValue(':company', $company);
			$query->bindValue(':description', $description);
			$query->bindValue(':price', $price);
			$query->bindValue(':image', $uploaded_image);
			$result = $query->execute();

			$msg = '<span style="color: red; font-size: 30px;">Vehicle Added Successfully!!!</span>';
			return $msg;

		}

		public function detailsVehicle($id) 
		{
	 		$sql = "SELECT * FROM vehicle WHERE id = :id;";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
	 	}

	 	public function vehicleImageUnlink($id)
	 	{
	 		$sql = "SELECT * FROM vehicle WHERE id = :id;";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);

			if ($result) 
			{
				$deleteImage = $result->image;
				unlink($deleteImage);
			}
	 	}

	 	public function updateVehicle($data, $file, $id)
	 	{	 		
	 		$name 			= $data['name'];
	 		$model 			= $data['model'];
	 		$type 			= $data['type'];
	 		$company 		= $data['company'];
	 		$description 	= $data['description'];
	 		$price 			= $data['price'];

	 		// image
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($name == "" OR $model == "" OR $type == "" OR $company == "" OR $description == "" OR $price == "")
	        {
	        	$msg = '<span style="color: red; font-size: 30px;">Fields must not be empty!!!</span>';
				return $msg;
	        }
	        else
	        {
	        	if (!empty($file_name))
	        	{
	        		if ($file_size > 1048567) 
	        		{
                        $msg = '<span style="color: red; font-size: 30px;">Image Size should be less then 1MB!!!</span>';
                    } 
                    elseif (in_array($file_ext, $permited) === false) 
                    {
                    	

                    	$msg = '<span style="color: red; font-size: 30px;">You can upload only ' . implode(', ', $permited) . ' !!!</span>';
                    } 
                    else
                    {
                    	// unlink previous image from source
						$this->vehicleImageUnlink($id);

						// upload new image from user
                        move_uploaded_file($file_temp, $uploaded_image);

                        $sql = "UPDATE vehicle 
                        		SET 
                        		name		= :name,
                        		model 		= :model,
								type 		= :type,
								company		= :company,
								description	= :description,
								price		= :price,
								image		= :uploaded_image
								WHERE 
								id			= :id;
						";
		                $query = $this->db->pdo->prepare($sql);
		                $query->bindValue(':name', $name);
						$query->bindValue(':model', $model);
						$query->bindValue(':type', $type);
						$query->bindValue(':company', $company);
						$query->bindValue(':description', $description);
						$query->bindValue(':price', $price);
						$query->bindValue(':uploaded_image', $uploaded_image);
						$query->bindValue(':id', $id);
						$result = $query->execute();
						$msg = '<span style="color: red; font-size: 30px;">Vehicle Updated Successfully!!</span>';
						return $msg;
                    }
	        	}
	        	else
	        	{
	        		move_uploaded_file($file_temp, $uploaded_image);
                    $sql = "UPDATE vehicle 
                        		SET 
                        		name		= :name,
                        		model 		= :model,
								type 		= :type,
								company		= :company,
								description	= :description,
								price		= :price
								WHERE 
								id			= :id;
						";
	                $query = $this->db->pdo->prepare($sql);
	               	$query->bindValue(':name', $name);
					$query->bindValue(':model', $model);
					$query->bindValue(':type', $type);
					$query->bindValue(':company', $company);
					$query->bindValue(':description', $description);
					$query->bindValue(':price', $price);
					$query->bindValue(':id', $id);
					$result = $query->execute();
					$msg = '<span style="color: red; font-size: 30px;">Vehicle Updated Successfully!!</span>';
					return $msg;  
	        	}
	        }


	 		
	 	}

	 	public function deleteVehicle($id)
	 	{
	 		// unlink previous image from source
			$this->vehicleImageUnlink($id);

	 		$sql = "DELETE FROM vehicle WHERE id = :id;";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();
	 		echo "<script type='text/javascript'>window.top.location='viewvehicles.php';</script>";
	 	}

	 	public function getVehiclesByUser($user_id)
	 	{
	 		// $sql = "SELECT * FROM tbl_order WHERE user_id = :user_id;";

	 		// $sql = "SELECT * FROM tbl_order
	 		// 		JOIN vehicle
	 		// 		ON
	 		// 		tbl_order.vehicle_id = vehicle.id
	 		// 		WHERE
			// 		user_id = :user_id;";


			$sql = "SELECT tbl_order.id as tbl_order_id, tbl_order.delivered, 
					vehicle.*  FROM tbl_order
	 				JOIN vehicle
	 				ON
	 				tbl_order.vehicle_id = vehicle.id
	 				WHERE
					user_id = :user_id;";

			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':user_id', $user_id);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
	 	}

	}


}