<?php
    session_start();
    require('../connection.php');
error_reporting(0);
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    } 
    $result= $mysqli->query("SELECT * FROM tbCandidates")
    or die("There are no records to display ... \n" . mysqli_error()); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>

    <?php
    $positions_retrieved= $mysqli->query("SELECT * FROM tbPositions")
    or die("There are no records to display ... \n" . mysqli_error()); 
?>

        <?php
if (isset($_POST['Submit']))
{

    $newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
    $newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection
    

    $sql = $mysqli->query( "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" )
            or die("Could not insert candidate at the moment". mysqli_error() );
    echo " <center><h1>Done <a href=candidates.php>Click Here to View</a></h1></center>";
    
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
     $result =  $mysqli->query("DELETE FROM tbCandidates WHERE candidate_id='$id'")
     or die("The candidate does not exist ... \n"); 
     echo " <center><h1>Done <a href=candidates.php>Click Here to Go back</a></h1></center>";
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
                                <h3>ADD NEW CANDIDATE</h3>
                            </CAPTION>
                            <form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
                                <tr>
                                    <td bgcolor="#FAEBD7">Candidate Name</td>
                                    <td bgcolor="#FAEBD7"><input type="text" name="name" /></td>
                                </tr>

                                <tr>
                                    <td bgcolor="#7FFFD4">Candidate Position</td>

                                    <td bgcolor="#7FFFD4">
                                        <SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
        //loop through all table rows
        while ($row= mysqli_fetch_array($positions_retrieved)){
          echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
        }
    ?>
    </SELECT>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#BDB76B">&nbsp;</td>
                                    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Add" /></td>
                                </tr>
                        </table>
                        <hr>
                        <table border="0" width="620" align="center">
                            <CAPTION>
                                <h3>AVAILABLE CANDIDATES</h3>
                            </CAPTION>
                            <tr>
                                <th>Candidate ID</th>
                                <th>Candidate Name</th>
                                <th>Candidate Position</th>
                            </tr>

                            <?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['candidate_id']."</td>";
    echo "<td>" . $row['candidate_name']."</td>";
    echo "<td>" . $row['candidate_position']."</td>";
    echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
    echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>

                        </table>
                        <hr>
                    </div>


                </body>

                </html>
