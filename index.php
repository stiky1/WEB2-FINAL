<?php include "config.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>SSSB - FINAL</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="pics/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </head>

    <body class="w3-light-grey">
        <!-- Top container -->
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <span class="w3-bar-item w3-right">WEBTECH - FINAL</span>
        </div>
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s8 w3-bar">
                            <span><?php echo $lang['welcome']?><span> <i class="fa fa-child"></i><br><br>
                            <div class="flags">
                                <p><strong><?php echo $lang['lang']?></strong></p>
                                <a href="index.php?lang=svk" class="w3-bar-item w3-button"><img class="flag" src='pics/svk.png'></a>
                                <a href="index.php?lang=eng" class="w3-bar-item w3-button"><img class="flag" src="pics/eng.png"></a>
                            </div>
                </div>
            </div>
            <hr>
            <div class="w3-container">
                <h5>Menu</h5>
            </div>
            <div class="w3-bar-block">
                <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>   <?php echo $lang['home']?></a>
                <a href="subpages/api.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-gears"></i>  API</a>
                <a href="subpages/console.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-laptop"></i>   <?php echo $lang['console']?></a>
                <a href="subpages/pendulum.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrows-v"></i>   <?php echo $lang['pendulum']?></a>
                <a href="subpages/ball.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-futbol-o"></i>  <?php echo $lang['ball']?></a>
                <a href="subpages/suspensionsys.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-truck"></i>  <?php echo $lang['car']?></a>
                <a href="subpages/airplane.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plane"></i>  <?php echo $lang['airplane']?></a>
            </div>

            <!-- Footer -->
            <footer>
                <div class="right">
                    <p>&nbsp;&nbsp; © Szitás, Stekla, Szilvásiová, Bača  &nbsp;2020</p>
                </div>
            </footer>
        </nav>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h3><b><i class="fa fa-home"></i> <?php echo $lang['home']?></b></h3>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
                        <div class="w3-clear"></div>
                        <h4>Zoltán Szitás</h4>
                    </div>
                    <div></div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
                        <div class="w3-clear"></div>
                        <h4>Juraj Stekla</h4>
                    </div>
                    <div></div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-teal w3-padding-16">
                        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
                        <div class="w3-clear"></div>
                        <h4>Lukrécia Szilvásiová</h4>
                    </div>
                    <div></div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-orange w3-text-white w3-padding-16">
                        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
                        <div class="w3-clear"></div>
                        <h4>Lukáš Bača</h4>
                    </div>
                    <div></div>
                </div>
            </div>
            <br>
            <br>

            <div class="w3-container" id="stat_div">
                <h4> <i class="fa fa-bar-chart"></i>  <?php echo $lang['stats'] ?></h4>
                <p><?php echo $lang['pendulum']?></p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-red" id="stat_div_pendulum"></div>
                </div>

                <p><?php echo $lang['airplane']?></p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-blue" id="stat_div_airplane"></div>
                </div>

                <p><?php echo $lang['ball']?></p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-teal" id="stat_div_ball"></div>
                </div>

                <p><?php echo $lang['car']?></p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-orange" id="stat_div_car"></div>
                </div>
            </div>

            <div id="statResult"></div>
        </div>

        <script src="script/slideScript.js"></script>
        <script src="script/script.js"></script>
    </body>
</html>
