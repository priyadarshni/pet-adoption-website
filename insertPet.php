<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  	include "./assets/inc/dbConnect.inc";
	if ($mysqli) {
	  //IF we are adding a new user
	  if( $_GET['category']!='' && $_GET['name']!='' && $_GET['breed']!='' ){

	  	$adoptable = 0;
		$adopted = 0;

	  	if($_GET['status']=="adoptable"){
	  		$adoptable = 1;
	  	}else if($_GET['status']=="adopted"){
	  		$adopted = 1;
	  	}

	  	// Insert a new row in the table pets
		$add = "INSERT INTO pets (pet_id, category, pet_name, breed, gender, age, size, weight, color, trained, health, good_with, adoption_fee, img_url, description, adopted, adoptable) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		if($stmt=$mysqli->prepare($add)){
			$stmt->bind_param("ssssssssssssssii",$_GET['category'],$_GET['name'],$_GET['breed'],$_GET['gender'],$_GET['age'],$_GET['size'],$_GET['weight'],$_GET['color'],$_GET['trained'],$_GET['health'],$_GET['goodwith'],$_GET['fee'],$_GET['imgurl'],$_GET['decription'], $adopted, $adoptable);
		} else {
		    die("Errormessage: ". $mysqli->error);
		}		

		$stmt->execute();
		$stmt->close();
	  }
	  
	}

	header('Location: admin.php');
	exit();
?>
