<?php

require "./pinclude/dbConnect.inc";

if ($mysqli) {
$sql = 'select size, price from pizzacost';
    
    $res=$mysqli->query($sql);
    
    if($res){
        while($rowHolder = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $records[] = $rowHolder;
        }
    }
}


$rowcount=mysqli_num_rows($res);


// var_dump($records)

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Display cost of pizza for Exercise 7</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body>
    <h3>Exercise 7 use these pizza costs</h3>
    <?php echo("<p>There are ". $rowcount . " rows in this table</p>");
    ?>
    <table>
        <tr>
            <th>Size</th>
            <th>Price</th>
        </tr>
        <?php 
    setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
    foreach($records as $this_row){
        echo '<tr><td>'.$this_row['size'].'</td><td>'.money_format('%(#6n',$this_row['price']).'</td></tr>';
    }
    ?>
    </table>

</body>
