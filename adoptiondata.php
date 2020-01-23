<?php 
$page = "Mail Sent";
include "./assets/inc/header.php"
?>

<?php include "./assets/inc/nav.php" ?>
<style>
	#home h1{
		color: #36008D;
	}
</style>

<div id="main">
<?php
    
$db_host="localhost";
$db_username="iste645t04";
$db_pass="lightamerica";
$db_name="iste645t04";


$db_connect=mysqli_connect($db_host,$db_username,$db_pass,$db_name);

 $pet_name = (isset($_POST['pet_name']) ? $_POST['pet_name'] : null);

 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $content= $_POST['content'];

$query=mysqli_query($db_connect, "INSERT INTO adoptiondata(pet_name, name, email, phone_no, content) VALUES('$pet_name','$name','$email','$phone','$content')");

echo '<h1>mail sent successfully, we will contact you ASAP<br> Please close this window</h1>';
mysqli_close($db_connect);

exit();
?>
</div>

<?php include "./assets/inc/footer.php" ?>