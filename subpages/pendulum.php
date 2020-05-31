<?php include "../config.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>SSSB - FINAL</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../pics/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/style.css">
        <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
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
                        <span><?php echo $lang['welcome']?><span> <i class="	fa fa-child"></i><br><br>
                                      <div class="flags">
                                          <p><strong><?php echo $lang['lang']?></strong></p>
                                          <a href="pendulum.php?lang=svk" class="w3-bar-item w3-button"><img class="flag" src='../pics/svk.png'></a>
                                          <a href="pendulum.php?lang=eng" class="w3-bar-item w3-button"><img class="flag" src="../pics/eng.png"></a>
                                          <span class="tooltiptext"><?php echo $lang['tooltip']?></span>
                                      </div>
                </div>
            </div>
            <hr>
            <div class="w3-container">
                <h5>Menu</h5>
            </div>
            <div class="w3-bar-block">
                <a href="../index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>   <?php echo $lang['home']?></a>
                <a href="api.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-gears"></i>  API</a>
                <a href="console.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-laptop"></i>   <?php echo $lang['console']?></a>
                <a href="pendulum.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrows-v"></i>   <?php echo $lang['pendulum']?></a>
                <a href="ball.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-futbol-o"></i>  <?php echo $lang['ball']?></a>
                <a href="suspensionsys.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-truck"></i>  <?php echo $lang['car']?></a>
                <a href="airplane.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plane"></i>  <?php echo $lang['airplane']?></a>
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
                <h3><b><i class="fa fa-arrows-v"></i> <?php echo $lang['pendulum']?></b></h3>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <br>
                <div>
                    <div id="checkbox_div">
                        <label class="container"><?php echo $lang['animation']?>
                            <input type="checkbox" checked="checked" id="model_checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container"><?php echo $lang['graph']?>
                            <input type="checkbox" checked="checked" id="graph_checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <br>
                    <div id="form_div">
                        <label for="const"><?php echo $lang['const']?></label>
                        <input id="const" type="number" name="value">
                        <button id="pendulum_request" type="submit" name="submit" class="btn"><?php echo $lang['submit']?></button>
                        <span id="input_tooltip" class="input_tooltiptext"><?php echo $lang['pendulum_input_tooltip']?></span>
                    </div>
                    <br><br>
                </div>

                <div id="model_div"></div>

                <div id="graph_info_div">
                    <p id="tr1"><?php echo $lang['pendulum_graph_tr1']?></p>
                    <p id="tr2"><?php echo $lang['pendulum_graph_tr2']?></p>
                </div>

                <div id="graph_div"></div>
            </div>
        </div>
        
        <script src="../script/slideScript.js"></script>
        <script src="../script/script.js"></script>
    </body>
</html>



