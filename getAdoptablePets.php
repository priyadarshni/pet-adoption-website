<?php

require "./assets/inc/dbConnect.inc";

if ($mysqli) {

    $sql = 'select pet_id, pet_name, img_url from pets';
    
    $res=$mysqli->query($sql);
    
    if($res){
        while($rowHolder = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $records[] = $rowHolder;
        }
        echo json_encode($records);
    }
}

$mysqli->close();

// setlocale(LC_MONETARY, 'en_US'); //try 'it_IT'    
// foreach($records as $this_row){
//         echo '<div data-id="'.$this_row['pet_id'].'" class="pet-photo" style="background-image:url(\''.$this_row['img_url'].'\');" alt="'.$this_row['pet_name'].'"></div>';
//     }
?>
