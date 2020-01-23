<?php

$db_host="localhost";
$db_username="iste645t04";
$db_pass="lightamerica";
$db_name="iste645t04";


$db_connect=mysqli_connect($db_host,$db_username,$db_pass,$db_name);

 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $amount = $_POST['amount'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $card_type= $_POST['card_type'];
 $name_on_card = $_POST['name_on_card'];
$card_expiry_date = $_POST['card_expiry_date'];
$cvv = $_POST['cvv'];

$query=mysqli_query($db_connect, "INSERT INTO donation_received(donor_first_name, donor_last_name, amount, donor_email, phone, card_type, name_on_card, card_expiry_date, cvv_number) VALUES('$fname','$lname','$amount','$email','$phone','$card_type','$name_on_card','$card_expiry_date','$cvv')");

mysqli_close($db_connect);
header('Location: donate.php')
?>