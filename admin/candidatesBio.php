<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
     
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

    //DB details
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'root';
        $dbName = 'votingdatabase';
        
        //Create connection and select DB
        $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($mysqli->connect_error){
            die("Connection failed: " . $mysqli->connect_error);
        }
        
        //Variables for Form Data
        
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert Form Data into database
        $insert = $mysqli->query("INSERT into candidatesData (name,email,phone,address,image,created) VALUES ('$name','$email','$phone','$address','$imgContent','$dataTime')");
        if($insert){
            echo "<h1>Successfully data Recorded.</h1>";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<?php include "head.php"; ?>

</head>
<body id="top">



<div class="wrapper row1">
  <?php include "header_admin.php";?>
</div>

<div >
<table width="380" align="center">
<CAPTION><h3>ADD CANDIDATE's DATA</h3></CAPTION>
<form  method="post" enctype='multipart/form-data'>
<tr>
    <td bgcolor="#FAEBD7">Candidate Name</td>
    <td bgcolor="#FAEBD7"><input type="text" name="name" /></td>
</tr>

<tr>
    <td bgcolor="#FAEBD7">Candidate Email</td>
    <td bgcolor="#FAEBD7"><input type="text" name="email" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Candidate Mobile</td>
    <td bgcolor="#FAEBD7"><input type="text" name="phone" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Candidate Address</td>
    <td bgcolor="#FAEBD7"><input type="text" name="address" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Candidate Photo</td>
    <td bgcolor="#FAEBD7"><input type="file" name="image" /></td>
</tr>
<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="submit" value="submit" /></td>
</tr>
    </form>
</table>
<hr>
</div>


</body>
</html>