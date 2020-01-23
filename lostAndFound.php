<?php 
$page = "Lost and Found Page";
$style = "./assets/css/found.css";
include "./assets/inc/header.php" 
?>


<?php include "./assets/inc/nav.php" ?>

<div class="header">
    <h1>LOST & FOUND</h1>
</div>
<div class="centerContent">
<div id="lostlink">
<a href="./lost.php">
<img id="lost" src="./assets/image/lost_icon.png"  onmouseover="change('lost','./assets/image/lost_icon2.png')" onmouseout="change('lost','./assets/image/lost_icon.png')" alt="lost pets page"/>
</a>
<h2>Lost Pets</h2>
</div>

<div class="foundlink">
<a href="./found.php">
<img id="found" src="./assets/image/found_icon.png"  onmouseover="change('found','./assets/image/found_icon2.png')" onmouseout="change('found','./assets/image/found_icon.png')" alt="found pets page"/>
</a>
<h2>Found Pets</h2>
</div>
</div>

<script>
    function change(id,img) 
    {
    document.getElementById(id).src=img;
        
    }
</script>

<?php include "./assets/inc/footer.php" ?>