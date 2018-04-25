<?php
	session_start();
	require('../connection.php');
	//If your session isn't valid, it returns you to the login screen for protection
	if( empty($_SESSION['admin_id']) ){
	   header("location:access-denied.php");
	}
	//retrive positions from the tbpositions table
	$result=mysqli_query($mysqli ,"SELECT * FROM tbPositions")
	or die("There are no records to display ... \n" ); 
	if (mysqli_num_rows($result)<1){
	    $result = null;
	}
	?>
    <?php
	// inserting sql query
	if (isset($_POST['Submit']))
	{

	$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

	$sql = mysqli_query( $mysqli ,"INSERT INTO tbPositions(position_name) VALUES ('$newPosition')" )
	        or die("Could not insert position at the moment" );
        echo " <center><h1>Done <a href=positions.php>Click Here to View</a></h1></center>";
	
	}
?>
        <?php
	// deleting sql query
	// check if the 'id' variable is set in URL
	 if (isset($_GET['id']))
	 {
	 // get id value
	 $id = $_GET['id'];
	 
	 // delete the entry
	 $result = mysqli_query($mysqli ,"DELETE FROM tbPositions WHERE position_id='$id'")
	 or die("The position does not exist ... \n"); 
	 echo " <center><h1>Done <a href=positions.php>Click Here to Go back</a></h1></center>";
	 error_reporting(0);
	 }
	 else
	 // do nothing
    
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

                <div>
                    <table width="380" align="center">
                        <CAPTION>
                            <h3>ADD NEW POSITION</h3>
                        </CAPTION>
                        <form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
                            <tr>
                                <td bgcolor="#00ff80">Position Name</td>
                                <td bgcolor="#808080"><input type="text" name="position" /></td>
                                <td bgcolor="#00FF00"><input type="submit" name="Submit" value="Add" /></td>
                            </tr>
                        </form>
                    </table>

                    <table border="0" width="420" align="center">
                        <CAPTION>
                            <h3>AVAILABLE POSITIONS</h3>
                        </CAPTION>
                        <tr>
                            <th>Position Name</th>
                            <th></th>
                        </tr>

                        <?php
			//loop through all table rows
			while ($row=mysqli_fetch_array($result)){
			echo "<tr>";
			
			echo "<td>" . $row['position_name']."</td>";
			echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
			echo "</tr>";
			}
			mysqli_free_result($result);
			mysqli_close($mysqli );
		?>

                    </table>
                    <hr>
                </div>




            </body>

            </html>
