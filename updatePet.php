<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  	include "./assets/inc/dbConnect.inc";
	if ($mysqli) {
	  //IF we are adding a new user
	  if( $_POST['id']!='' && $_POST['category']!='' && $_POST['name']!='' && $_POST['breed']!=''){

		$adoptable = 0;
		$adopted = 0;

	  	if($_POST['status']=="adoptable"){
	  		$adoptable = 1;
	  	}else if($_POST['status']=="adopted"){
	  		$adopted = 1;
	  	}

	  	$target_path = NULL;
    	$filename = basename($_FILES['uploadedimg']['name']);
    	$filename=str_replace(' ','|',$filename);
    	$temp_filename = $_FILES['uploadedimg']['tmp_name'];

    	if (isset($filename)&&!empty($filename)) {

            $target_path = './assets/image/'.$filename;

	        if(move_uploaded_file($temp_filename, $target_path)){
		    // Insert a new row in the table pets
	        	echo "success";

    			$update = "UPDATE pets 
				SET category = '".$_POST['category']."',
					pet_name ='".$_POST['name']."',
					breed ='".$_POST['breed']."',
					gender ='".$_POST['gender']."',
					age ='".$_POST['age']."',
					size ='".$_POST['size']."',
					weight ='".$_POST['weight']."',
					color ='".$_POST['color']."',
					trained ='".$_POST['trained']."',
					health ='".$_POST['health']."',
					good_with ='".$_POST['goodwith']."',
					adoption_fee ='".$_POST['fee']."',
					img_url ='".$target_path."',
					description ='".$_POST['decription']."',
					adopted ='".$adopted."',
					adoptable ='".$adoptable."'
				WHERE pet_id = '".$_POST['id']."'";

					}else{
				echo "failed";
			}

	    }else{

	    	echo "No image is uploaded";

	    	$update = "UPDATE pets 
			SET category = '".$_POST['category']."',
				pet_name ='".$_POST['name']."',
				breed ='".$_POST['breed']."',
				gender ='".$_POST['gender']."',
				age ='".$_POST['age']."',
				size ='".$_POST['size']."',
				weight ='".$_POST['weight']."',
				color ='".$_POST['color']."',
				trained ='".$_POST['trained']."',
				health ='".$_POST['health']."',
				good_with ='".$_POST['goodwith']."',
				adoption_fee ='".$_POST['fee']."',
				description ='".$_POST['decription']."',
				adopted ='".$adopted."',
				adoptable ='".$adoptable."'
			WHERE pet_id = '".$_POST['id']."'";
	    }

		if ($mysqli->query($update) === TRUE) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $mysqli->error;
		}

		$mysqli->close();
	  }
	  
	}

	header('Location: admin.php');
	exit();
?>
