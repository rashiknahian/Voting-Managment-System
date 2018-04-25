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
                    <li class="active"><a href="index.php">Home</a></li>

                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="wrapper bgded overlay" style="background-image:url('images/pexels-photo-548084.jpeg');">
        <section id="testimonials" class="hoc container clear">
            <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
            <ul class="nospace group">
                <li class="one_half">
                    <blockquote>


                        <div>
                            <?php
  	require('connection.php');
  	//Process
  	if (isset($_POST['submit']))
  	{

  		$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
  		$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
  		$myEmail = $_POST['email'];
  		$myPassword = $_POST['password'];
  		

  		$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash

  		$sql = $mysqli->query( "INSERT INTO tbMembers(first_name, last_name, email,  password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
  		        or die( mysqli_error() );


  	die( "You have registered for an account.<br><br>Go to <a href=\"login.php\">Login</a>" );
  	}

  	echo "<center><h3>Register an account by filling in the needed information below:</h3></center>";
  	
  ?>
                        </div>
                        <table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
                            <tr>
                                <form name="form1" method="post" action="registeracc.php" onSubmit="return registerValidate(this)">
                                    <td>
                                        <table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1">
                                            <tr>
                                                <td style="color:#000000" ; width="120">First Name</td>
                                                <td style="color:#000000" ; width="6">:</td>
                                                <td style="color:#000000" ; width="294"><input name="firstname" type="text"></td>
                                            </tr>

                                            <tr>
                                                <td style="color:#000000" ; width="120">Last Name</td>
                                                <td style="color:#000000" ; width="6">:</td>
                                                <td style="color:#000000" ; width="294"><input name="lastname" type="text"></td>
                                            </tr>

                                            <tr>
                                                <td style="color:#000000" ; width="150">Email</td>
                                                <td style="color:#000000" ; width="6">:</td>
                                                <td style="color:#000000" ; width="294"><input name="email" type="text"></td>
                                            </tr>


                                            <tr>
                                                <td style="color:#000000" ;>Password</td>
                                                <td style="color:#000000" ;>:</td>
                                                <td style="color:#000000" ;><input name="password" type="password"></td>
                                            </tr>

                                            <tr>
                                                <td style="color:#000000" ;>Confirm Password</td>
                                                <td style="color:#000000" ;>:</td>
                                                <td style="color:#000000" ;><input name="ConfirmPassword" type="password"></td>
                                            </tr>

                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td style="color:#000000" ;><input type="submit" name="submit" value="Register Account"></td>
                                            </tr>

                                        </table>
                                    </td>
                                </form>
                            </tr>
                        </table>

                        <center>
                            <br>Already have an account? <a href="login.php"><b>Login Here</b></a>
                        </center>



                    </blockquote>

                </li>
            </ul>
        </section>
    </div>
    <?php include"footer.php";?>
</body>

</html>
