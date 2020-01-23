<?php


    require "./assets/inc/dbConnect.inc";


	if ($mysqli) {
	  //IF we are adding a new user
	  if( !empty($_GET['fName']) && !empty($_GET['lName'] && !empty($_GET['comments'])) ){
		/*
			we are using client entered data - therefore we HAVE TO USE a prepared statement
			1)prepare my query
			2)bind
			3)execute
			4)close
		*/
		$stmt=$mysqli->prepare("insert into blog (last, first, comments) values (?, ?, ?)");
		$stmt->bind_param("sss",$_GET['lName'],$_GET['fName'], $_GET['comments']);
		$stmt->execute();
		$stmt->close();
	  }
	  //get contents of table and send back...
	  $sql='select * from blog';	
	  $results=$mysqli->query($sql);
	 
	  if($results->num_rows>0){
		
		     while($rowHolder = mysqli_fetch_array($results,MYSQLI_ASSOC)){
			    $records[] = $rowHolder;
		      }//end of while loop to store all the records
	         }//end of true path of if
      else {
		  echo '<h3>Something is wrong with the $sql</h3>';
		  echo "<p>$sql</p>";
		  die("Unable to select any recordes");
	  }//end of false path
	}//end of if connected to the database
?>

<?php 
$page = "Forum";
$style = "./assets/css/blog.css";
include "./assets/inc/header.php" 
?>
<?php include "./assets/inc/nav.php" ?>

<div id="blog">
<h1>Forum</h1>
<h3>Please leave your comments</h3>
<form action="blog.php" method="get">
	First name: <input type="text" id="first" name="fName" />
    Last name: <input type="text" id="last" name="lName"/>
    Comments: <textarea id="comments" name="comments"> </textarea>
	<input type="submit" class="primary-button" value="Submit" />
</form>

<div id="list">
<hr/>
<h3>Previous Comments:</h3>
	<ul>
	<?php
		//var_dump($records);
		foreach($records as $this_row){
			echo '<li>'.$this_row['first'] . " " . $this_row['last']. ": "  . $this_row['comments'].'</li>';
		}
	?>
	</ul>
</div>
</div>



<?php include "./assets/inc/footer.php" ?>




