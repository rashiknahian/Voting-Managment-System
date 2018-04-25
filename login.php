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
            <h2 class="font-x3 uppercase btmspace-80 underlined"> Voting Managment System</h2>
            <ul class="nospace group">
                <li class="one_half">
                    <blockquote>

                        <table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
                            <tr>
                                <form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
                                    <td>
                                        <table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1">
                                            <tr>
                                                <td style="color:#000000" ; width="78">Email</td>
                                                <td style="color:#000000" ; width="6">:</td>
                                                <td style="color:#000000" ; width="294"><input name="myusername" type="text" id="myusername"></td>
                                            </tr>
                                            <tr>
                                                <td style="color:#000000" ;>Password</td>
                                                <td style="color:#000000" ;>:</td>
                                                <td style="color:#000000" ;><input name="mypassword" type="password" id="mypassword"></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td style="color:#000000" ;><input type="submit" name="Submit" value="Login"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </form>
                            </tr>
                        </table>
                        <center>
                            <br>Not yet registered? <a href="registeracc.php"><b>Register Here</b></a>

                        </center>

                    </blockquote>

                </li>
            </ul>
        </section>
    </div>
    <?php include"footer.php";?>
</body>

</html>
