<?php
	require('connection.php');

	session_start();
	//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['member_id'])){
	 	header("location:access-denied.php");
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
                        <li><a class="drop" href="#">Voter Pages</a>
                            <ul>
                                <li><a href="vote.php">Vote</a></li>
                                <li><a href="candidate.php">Candidates Details</a></li>
                                <li><a href="manage-profile.php">Manage my profile</a></li>
                            </ul>
                        </li>

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
                            <div id="container">
                                <p> Click a link above voter pages to do some stuff.</p>
                            </div>
                        </blockquote>

                    </li>

                </ul>
            </section>
        </div>
        <?php include"footer.php";?>
    </body>

    </html>
