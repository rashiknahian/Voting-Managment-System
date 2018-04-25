<?php
    session_start();
    require('connection.php');
    error_reporting(0);
    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['member_id'])){
      header("location:access-denied.php");
    } 
    //retrive voter details from the tbmembers table
    $result= $mysqli->query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
    or die("There are no records to display ... \n" . mysqli_error()); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
    $row = mysqli_fetch_array($result);
    if($row)
     {
         // get data from db
         $stdId = $row['member_id'];
         $firstName = $row['first_name'];
         $lastName = $row['last_name'];
         $email = $row['email'];
         $voter_id = $row['voter_id'];
     }
?>

    <?php
    // updating sql query
    if (isset($_POST['update'])){
        $myId = addslashes( $_GET[id]);
        $myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
        $myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myVoterid = $_POST['voter_id'];

        $newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

        $sql = $mysqli->query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', voter_id = '$myVoterid', password='$newpass' WHERE member_id = '$myId'" )
                or die( mysqli_error() );

        echo " <center><h1>Done <a href=manage-profile.php>Click Here to View</a></h1></center>";
    }
?>
        <!DOCTYPE html>

        <html>

        <head>
            <?php include "head.php";?>
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
                    <h2 class="font-x3 uppercase btmspace-80 underlined"> Voting Managment System</h2>
                    <ul class="nospace group">
                        <li class="one_half first">
                            <blockquote>
                                <table border="0" width="620" align="center">
                                    <CAPTION>
                                        <h3>MY PROFILE</h3>
                                    </CAPTION>
                                    
                                        <br>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="color:#000000" ;>First Name:</td>
                                            <td style="color:#000000" ;>
                                                <?php echo $firstName; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:#000000" ;>Last Name:</td>
                                            <td style="color:#000000" ;>
                                                <?php echo $lastName; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:#000000" ;>Email:</td>
                                            <td style="color:#000000" ;>
                                                <?php echo $email; ?>
                                            </td>
                                        </tr>

                                    
                                </table>


                            </blockquote>

                        </li>
                        <li class="one_half">
                            <blockquote>
                                <table border="0" width="620" align="center">
                                    <CAPTION>
                                        <h3>UPDATE PROFILE</h3>
                                        <h5>Please Fill Up all the fields </h5>
                                    </CAPTION>
                                    <form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
                                        <table align="center">
                                            <tr>
                                                <td style="background-color:#0000ff">First Name:</td>
                                                <td style="background-color:#0000ff"><input style="color:#000000" ; type="text" font-weight:bold; name="firstname" maxlength="15" value=""></td>
                                            </tr>
                                            <tr>
                                                <td style="background-color:#bf00ff">Last Name:</td>
                                                <td style="background-color:#bf00ff"><input style="color:#000000" ; type="text" font-weight:bold; name="lastname" maxlength="15" value=""></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#0000ff">Email Address:</td>
                                                <td style="background-color:#0000ff"><input style="color:#000000" ; type="text" font-weight:bold; name="email" maxlength="100" value=""></td>
                                            </tr>


                                            <tr>
                                                <td style="background-color:#0000ff">New Password:</td>
                                                <td style="background-color:#0000ff"><input style="color:#000000" ; type="password" font-weight:bold; name="password" maxlength="15" value=""></td>
                                            </tr>
                                            <tr>
                                                <td style="background-color:#bf00ff">Confirm New Password:</td>
                                                <td style="background-color:#bf00ff"><input style="color:#000000" ; type="password" font-weight:bold; name="ConfirmPassword" maxlength="15" value=""></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#0000ff">&nbsp;</td>
                                                <td style="background-color:#0000ff"><input style="color:#ff0000" ; type="submit" name="update" value="Update Profile"></td>
                                            </tr>

                                        </table>
                                    </form>
                                </table>




                            </blockquote>

                        </li>

                    </ul>
                </section>
            </div>
            <?php include"footer.php";?>
        </body>

        </html>
