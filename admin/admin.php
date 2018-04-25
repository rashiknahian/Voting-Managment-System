<?php
    session_start();
    require('../connection.php');
    
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
        <div class="wrapper bgded overlay" style="background-image:url('images/pexels-photo.jpg');">

            <section id="testimonials" class="hoc container clear">

                <h2 class="font-x3 uppercase btmspace-80 underlined"> Voting Managment System</h2>
                <ul class="nospace group">

                    <li class="one_half">

                        <blockquote>In this page, Admin can set candidates for voting and view results.</blockquote>
                        <blockquote>Welcome to "Voting Managment System" <br>Electronic voting (also known as e-voting) refers to voting using electronic means to either aid or take care of the chores of casting and counting votes. Depending on the particular implementation, e-voting may use standalone electronic voting machines (also called EVM) or computers connected to the Internet. It may encompass a range of Internet services, from basic transmission of tabulated results to full-function online voting through common connectable household devices. The degree of automation may be limited to marking a paper ballot, or may be a comprehensive system of vote input, vote recording, data encryption and transmission to servers, and consolidation and tabulation of election results.</blockquote>

                    </li>

                </ul>

            </section>

        </div>



        <?php include"../footer.php";?>
    </body>

    </html>
