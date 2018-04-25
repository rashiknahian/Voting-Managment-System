<?php
  require_once('connection.php');

  session_start();
  
  if(empty($_SESSION['member_id'])){
    header("location:access-denied.php");
  }
?>

<?php
    
    $positions= $mysqli->query("SELECT * FROM tbPositions")
    or die("There are no records to display ... \n" . mysqli_error()); 
  ?>
  <?php
    
     if (isset($_POST['Submit']))
     {
       
       $position = addslashes( $_POST['position'] ); 
       
       
       $result = $mysqli->query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
       or die(" There are no records at the moment ... \n"); 
     
     }
     else
     // do something
  
?>
<!DOCTYPE html>

<html>
<head>
<?php include "head.php";?>


<script type="text/javascript">
function getVote(int)
{
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  if(confirm("Your vote is for "+int))
  {
      xmlhttp.open("GET","save.php?vote="+int,true);
      xmlhttp.send();
  }
  else
  {
      alert("Choose another candidate "); 
  }
  
}

function getPosition(String)
{
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.open("GET","vote.php?position="+String,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>


</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/pexels-photo-548084.jpeg');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      



            <div >
            <table bgcolor="#00FF00" width="420" align="center">
            <form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
            <tr>
                <td bgcolor="#5D7B9D" >Choose Position</td>
                <td bgcolor="#5D7B9D" style="color:#000000"; ><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
                <OPTION  VALUE="select">select
                <?php 
                  //loop through all table rows
                  while ($row=mysqli_fetch_array($positions)){
                    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
                  }
                ?>
                </SELECT></td>
                <td bgcolor="#5D7B9D" ><input style="color:#ff0000";  type="submit" name="Submit" value="See Candidates" /></td>
            </tr>
            <tr>
               
            </tr>
            </form> 
            </table>
            <table width="270" align="center">
            <form>
            <tr>
                <th>Candidates:</th>
            </tr>
            <?php
              error_reporting(0);
                if (isset($_POST['Submit']))
                {
                  while ($row=mysqli_fetch_array($result)){
                    
                      echo "<tr>";
                      echo "<td style='background-color:#bf00ff'>" . $row['candidate_name']."</td>";
                      echo "<td style='background-color:#bf00ff'><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
                      echo "</tr>";
                  }
                  mysql_free_result($result);
                  mysql_close($link);
                  
              //}
                }
                else
              // do nothing
            ?>

            <tr>
                <h4>NB: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</h4>
                
            </tr>
            </form>
            </table>
            </div>


    </ul>
  </section>
</div>
<?php include"footer.php";?>
</body>
</html>