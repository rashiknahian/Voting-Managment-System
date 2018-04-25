<?php
			ini_set ("display_errors", "1");
			error_reporting(E_ALL);
			ob_start();

			session_start();
			require_once('connection.php');

			// Defining your login details into variables
			$myusername=$_POST['myusername'];
			$mypassword=$_POST['mypassword'];

			$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
			// MySQL injection protections
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = $mysqli->escape_string($_POST['myusername']);
			$mypassword = $mysqli->escape_string($_POST['mypassword']);

			$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysqli_error());
			$result= $mysqli->query($sql) or die(mysqli_error());

			// Checking table row
			$count=mysqli_num_rows($result);
			// If username and password is a match, the count will be 1

			if($count==1){
				// If everything checks out, you will now be forwarded to voter.php
				$user = mysqli_fetch_assoc($result);
				$_SESSION['member_id'] = $user['member_id'];
				header("location:voter.php");
			}
			//If the username or password is wrong, you will receive this message below.
			else {
				echo "Wrong Username or Password<br><br>Return to <a href=\"login.php\">Login</a>";
			}

			ob_end_flush();

		?>

    <!DOCTYPE html>

    <html>
    <?php include "head.php";?>

    <body id="top">
        <div class="wrapper row0">

        </div>

        <div class="wrapper row1">
            <?php include "header.php";?>
        </div>
        <div class="wrapper bgded overlay" style="background-image:url('images/pexels-photo-548084.jpeg');">
            <section id="testimonials" class="hoc container clear">

                <h2 class="font-x3 uppercase btmspace-80 underlined"> Voting Managment System</h2>
                <ul class="nospace group">
                    <li class="one_half">
                        <div>
                            <h1>Invalid Credentials Provided </h1>

                        </div>
                        <div>
                        </div>
                    </li>
                </ul>

            </section>
        </div>


        <?php include"footer.php";?>
    </body>

    </html>
