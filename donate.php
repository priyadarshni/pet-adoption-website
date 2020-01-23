<?php
   
require "./assets/inc/dbConnect.inc";

if ($mysqli) {

    $sql = 'select pet_id, pet_name, img_url from pets';
    
    $res=$mysqli->query($sql);
    
    if($res){
        while($rowHolder = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $records[] = $rowHolder;
        }
        // print json_encode($records);
    }
}

$rowcount=mysqli_num_rows($res);

?>


<?php 
$page = "donate";
$style = "./assets/css/donate.css";
include "./assets/inc/header.php"
?>


<?php include "./assets/inc/nav.php" ?>


    <div class="header">
<h1>Donation</h1>
        <p>Donate to Peppy Adoption and Help Animals</p>
    </div>
    <div class="container">


<div class="center">
<form action="donationdata.php" method="post" name="user">
<label>First Name: </label> <input type="text" name="fname"  value=""><br>
<label> Last Name: </label><input type="text" name="lname"  value=""><br>
<label>Amount:</label><input type="text" name="amount"  value=""><br>
<label>Email:</label><input type="text" name="email"  value=""><br>
                
<label>Phone:</label><input type="text" name="phone"  value=""><br>
<label>Card type:</label> 
<!--
<input type="radio" name="card_type" value="Debit" checked>Debit<br>
<input type="radio" name="card_type" value="Credit"> Credit<br>
-->
<select id="card_type" name="card_type">
    <option value="Debit">Select Card type</option>
  <option value="Debit">Debit Card</option>
  <option value="Credit">Credit Card</option>
  </select>

    
    <label>Name on Card:</label><input type="text" name="name_on_card" value=""><br>
<label> Card Expiry Date: </label><input type="date" name="card_expiry_date" value=""><br>
    <label>CVV:</label> <input type="text" name="cvv" value=""><br>
    <br>   
   <button class="primary-button" type="submit">Submit</button>
    </form>
        
    </div>
    </div>

    
<?php include "./assets/inc/footer.php" ?>
    
 