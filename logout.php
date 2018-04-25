<?php
	session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <?php include "head.php";?>
</head>

<body id="top">


    <div class="wrapper row1">
        <?php include "header.php";?>
    </div>

    <div class="wrapper bgded overlay" style="background-image:url('images/pexels-photo-548084.jpeg');">
        <section id="testimonials" class="hoc container clear">
            <h2 class="font-x3 uppercase btmspace-80 underlined"> Voting Managment System</h2>
            <ul class="nospace group">
                <li class="one_half">
                    <blockquote>

                        <div id="page">
                            <div id="header">
                                <h1>Logged Out Successfully </h1>
                                <p align="center">&nbsp;</p>
                            </div>
                            <?php
						session_destroy();
					?> You have been successfully logged out.<br><br><br> Return to <a href="login.php">Login</a>

                        </div>

                    </blockquote>

                </li>
            </ul>
        </section>
    </div>
    <?php include"footer.php";?>
</body>

</html>
