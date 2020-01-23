<?php
  	require "./pinclude/dbConnect.inc";
	if ($mysqli) {
	  if( $_GET['fName']!='' && $_GET['lName']!='' && $_GET['amount']!='' && $_GET['email']!='' && $_GET['phone']!='' && $_GET['card_type']!='' && $_GET['name_on _card']!='' && $_GET['card_expiry_date']!='' && $_GET['cvv']!=''){
		/*
			we are using client entered data - therefore we HAVE TO USE a prepared statement
			1)prepare my query
			2)bind
			3)execute
			4)close
		*/
		$stmt=$mysqli->prepare("INSERT INTO donation_received (firstname, lastname,amount,email,phone,card_type,name_on_card,card_expiry_date,cvv) VALUES (?, ?,?,?,?,?,?,?,?)");
          $stmt->bind_param("ss",$_GET['fname'],$_GET['lName'],$_GET['amount'],$_GET['email'],$_GET['phone'],$_GET['card_type'],$_GET['name_on_card'],$_GET['card_expiry_date'],$_GET['cvv']);
		$stmt->execute();
		$stmt->close();
	  }
	  //get contents of table and send back...
//	  $res=$conn->query('select first, last from 240Insert');
//	  if($res)
//		while($rowHolder = mysqli_fetch_array($res,MYSQL_ASSOC)){
//			$records[] = $rowHolder;
//		}
//	  }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Donations</title>
</head>
<body>
<hr/>
<h3>Add to the list</h3>
<form action="index.php" method="GET">		
	First name: <input type="text" id="fname" name="fName" />
	Last name: <input type="text" id="lname" name="lName"/>
Amount: <input type="text" id="amount" name="amount"/>
    Email: <input type="text" id="email" name="email"/>
    Phone: <input type="text" id="phone" name="phone"/>
    card-Type: <input type="text" id="card_type" name="card_type"/>
    Name of Card: <input type="text" id="name_on_card" name="name_on_card"/>
    card Expiry Date: <input type="text" id="card_expiry_date" name="card_expiry_date"/>
     CVV: <input type="text" id="cvv" name="cvv"/>
	<input type="submit" value="Add to the List"/>
</form>
</body>
</html>
