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
            <a href="suspensionsys.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-truck"></i>  <?php echo $lang['car']?></a>
            <a href="airplane.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plane"></i>  <?php echo $lang['airplane']?></a>
        </div>
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
            <div id = "firstDiv"><br>
                <form method="post">
                    <label for="const">Set new r position:</label>
                    <input id="const" type="number" name="value">
                    <input type="submit">
                </form><br><br><br>
                <label for="exampleFormControlTextarea6">Select what to view:</label><br><br>
                <label>
                    <input id = "graph" type="checkbox" alt="Graph" onclick="show()">
                </label> Graph
                <label>
                    <input id = "animation" type="checkbox" alt="Animation" onclick="show()">
                </label> Animation
            </div>
            <div id = "app">
                <div id ="graphId"></div>
                <script src="../script/final_JS.js"></script>
                <div class = "txt">
                    <?php
                    $new = $_POST["value"];
                    $cmd = "octave -q --no-window-system --eval '[t,y]=pendulum($new)'";
                    exec($cmd,$op);

                    unset($op[0], $op[1]);
                    $i = 0;

                    for (;$i <= sizeof($op);$i++){
                        $key = array_search("",$op);
                        unset($op[$key]);
                    }

                    $foundT = false;
                    $foundY = false;
                    $t = array();
                    $y = array();
                    $angle = array();

                    foreach ($op as $cell){
                        if($cell === 't =' || $foundT){
                            $foundT = true;
                            array_push($t,round($cell,2));
                        }
                        if ($cell === 'y =' || $foundY){
                            $foundT = false;
                            $foundY = true;
                            array_push($y,round($cell,5));
                            $angleData = explode(" ", $cell);
                            array_push($angle, end($angleData));
                        }
                    }
                    $key = array_search("t =",$t);
                    unset($t[$key]);
                    $key = array_search("y =",$y);
                    unset($y[$key]);
                    $key = array_search("=",$angle);
                    unset($angle[$key]);
                    ?>
                    <div id = "animationId">
                        <object data="pendulum_svg/ellipse.svg" type="image/svg+xml">
                            <img src="pendulum_svg/ellipse.svg" alt = "Ellipse">
                        </object>
                        <object data="pendulum_svg/line1.svg" type="image/svg+xml">
                            <img src="pendulum_svg/line1.svg" alt = "Line 1">
                        </object>
                        <object data="pendulum_svg/line2.svg" type="image/svg+xml">
                            <img src="pendulum_svg/line2.svg" alt = "Line 2">
                        </object>
                    </div>
                    <script>
                        var time= [<?php echo '"'.implode('","', $t).'"' ?>];
                        var y= [<?php echo '"'.implode('","', $y).'"' ?>];
                        var angle= [<?php echo '"'.implode('","', $angle).'"' ?>];

                        var trace1 = {
                            x: time,
                            y: y,
                            type: 'scatter'
                        };

                        var trace2 = {
                            x: time,
                            y: angle,
                            type: 'scatter'
                        };

                        var data = [trace1,trace2];

                        Plotly.newPlot('graphId', data);
                    </script>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-padding-16 w3-light-grey">
            <p>&nbsp;&nbsp; © Szitás, Stekla, Szilvásiová, Bača  &nbsp;2020</p>
        </footer>
    </div>


    <script src="../script/slideScript.js"></script>
    <script src="../script/script.js"></script>
    </body>
</html>
