<?php
if(!empty($_GET['id'])){
  
        //Database Connection Establish
        include "../connection.php";
    
    //Get image data from database
    $result = $mysqli->query("SELECT image FROM candidatesData WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
}
?>
