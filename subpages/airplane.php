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
                        <span><?php echo $lang['welcome']?><span> <i class="fa fa-child"></i><br><br>
                            <div class="flags">
                                <p><strong><?php echo $lang['lang']?></strong></p>
                                <a href="airplane.php?lang=svk" class="w3-bar-item w3-button"><img class="flag" src='../pics/svk.png'></a>
                                <a href="airplane.php?lang=eng" class="w3-bar-item w3-button"><img class="flag" src="../pics/eng.png"></a>
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
                <h3><b><i class="fa fa-plane"></i> <?php echo $lang['airplane']?></b></h3>
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
                        <button id="airplane_request" type="submit" name="submit" class="btn"><?php echo $lang['submit']?></button>
                        <span id="input_tooltip" class="input_tooltiptext"><?php echo $lang['airplane_input_tooltip']?></span>
                    </div>
                    <br><br>
                </div>

                <div id="model_div">
                    <svg id="airplane_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1920" height="1080" viewBox="0 0 1920 1080"><defs><style>.a{clip-path:url(#b);}.b{fill:#f9f9f9;}.b,.c,.d,.e,.g,.h,.i,.k{stroke:#053b65;}.c{fill:#2196f3;}.c,.g{stroke-width:3px;}.d,.l,.n{fill:none;}.e{fill:#064475;}.f,.g,.h,.i,.j,.k,.o{fill:#fff;}.f{stroke:#831135;}.f,.k{stroke-width:2.5px;}.h{stroke-width:2px;}.j,.l{stroke:#707070;}.m{stroke:none;}</style><clipPath id="b"><rect width="1920" height="1080"/></clipPath></defs><g id="a" class="a"><rect class="o" width="1920" height="1080"/><path class="b" d="M4009,959c260.062,98.7-140,160-140,160H3189l-690-20-190-50-10-40V979l110-30-70-280h120l120,200,170,10H3859a218.89,218.89,0,0,1,70,20C3964.738,916.3,4009,959,4009,959Z" transform="translate(-2176.865 -459)"/><g class="c" transform="translate(1072.135 480)"><rect class="m" width="40" height="80" rx="12"/><rect class="n" x="1.5" y="1.5" width="37" height="77" rx="10.5"/></g><g class="c" transform="translate(1012.135 480)"><rect class="m" width="40" height="80" rx="12"/><rect class="n" x="1.5" y="1.5" width="37" height="77" rx="10.5"/></g><path class="d" d="M2409,949l340-70" transform="translate(-2176.865 -459)"/><path class="e" d="M2459,669l100,210h130l-150,30-10-30-90-210Z" transform="translate(-2176.865 -459)"/><g class="c" transform="translate(452.135 470)"><rect class="m" width="50" height="110" rx="12"/><rect class="n" x="1.5" y="1.5" width="47" height="107" rx="10.5"/></g><g class="c" transform="translate(1612.135 470)"><rect class="m" width="50" height="110" rx="12"/><rect class="n" x="1.5" y="1.5" width="47" height="107" rx="10.5"/></g><g class="f" transform="translate(602.135 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="g" transform="translate(1022.135 500)"><rect class="m" width="20" height="30" rx="10"/><rect class="n" x="1.5" y="1.5" width="17" height="27" rx="8.5"/></g><g class="g" transform="translate(1082.135 500)"><rect class="m" width="20" height="30" rx="10"/><rect class="n" x="1.5" y="1.5" width="17" height="27" rx="8.5"/></g><path class="h" d="M3889,919v20l30,10h80l-40-30-20-10h-50Z" transform="translate(-2176.865 -459)"/><path class="h" d="M3919,949V909h20l20,40Z" transform="translate(-2176.865 -459)"/><path class="i" d="M3189,1119h180s81.057-19.985,40-50-120-30-120-30l-270,10s-25.771,13.87-20,30S3189,1119,3189,1119Z" transform="translate(-2176.865 -459)"/><path class="e" d="M3237.607,1142.267c-8.522-7.182-155.723,5.631-155.723,5.631v5.759l-51.908,5.86v11.068L3017,1173.552v5.965l12.977,2.328v5.984l51.908,11.39v6.229L3237.607,1222s5.032-6.037,5.5-11.39,3.888-51.092,3.888-51.092A27.791,27.791,0,0,0,3237.607,1142.267Z" transform="translate(-2054.865 -552)"/><path class="i" d="M3051.628,1199.248v-45.541l-10.2,1.1v41.984Z" transform="translate(-2024.865 -552)"/><path class="i" d="M2999.791,1170.443,2987,1173.5v5.608l12.791,2.89Z" transform="translate(-2024.865 -552)"/><path class="i" d="M2147,1102h10l10,25.74,16.71,21.282L2157,1142Z" transform="translate(-2024.865 -552)"/><path class="i" d="M2227,1160.01V1152l90,30v2.135Z" transform="translate(-2024.865 -552)"/><g class="e" transform="translate(1432.135 600)"><rect class="m" width="100" height="51" rx="15"/><rect class="n" x="0.5" y="0.5" width="99" height="50" rx="14.5"/></g><g class="i" transform="translate(1437.135 606)"><rect class="m" width="90" height="40" rx="8"/><rect class="n" x="0.5" y="0.5" width="89" height="39" rx="7.5"/></g><g class="j" transform="translate(467.135 493)"><rect class="m" width="21" height="20" rx="4"/><rect class="n" x="0.5" y="0.5" width="20" height="19" rx="3.5"/></g><g class="g" transform="translate(467.135 493)"><rect class="m" width="21" height="20" rx="4"/><rect class="n" x="1.5" y="1.5" width="18" height="17" rx="2.5"/></g><g class="g" transform="translate(1627.135 490)"><rect class="m" width="21" height="20" rx="4"/><rect class="n" x="1.5" y="1.5" width="18" height="17" rx="2.5"/></g><g class="k" transform="translate(602.135 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(647 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(690 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(733.135 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(777 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(820 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(860 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(904 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(947 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1157 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1200 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1243 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1286 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1329 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1372 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1415 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1458 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1501 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><g class="k" transform="translate(1544 500)"><rect class="m" width="23" height="37" rx="11.5"/><rect class="n" x="1.25" y="1.25" width="20.5" height="34.5" rx="10.25"/></g><path class="l" d="M2657,882Z" transform="translate(-2077 -562)"/><path class="e" d="M2239,960.354l130.971,45.417s129.156,19.249,104.776-11.354-39.291-34.063-39.291-34.063L2239,949Z" transform="matrix(0.995, 0.105, -0.105, 0.995, -2117.537, -707.841)"/><path class="i" d="M2107,1052h13.55l86.45,44.5v3.977L2104.643,1052Z" transform="translate(-2077 -562)"/></g></svg>
                </div>

                <div id="graph_info_div">
                    <p id="tr1"><?php echo $lang['airplane_graph_tr1']?></p>
                    <p id="tr2"><?php echo $lang['airplane_graph_tr2']?></p>
                </div>

                <div id="graph_div">

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