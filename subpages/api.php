<?php
    include "../config.php";
    include "./fileDownload/downloadPdf.php";
?>
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
                                <a href="api.php?lang=svk" class="w3-bar-item w3-button"><img class="flag" src='../pics/svk.png'></a>
                                <a href="api.php?lang=eng" class="w3-bar-item w3-button"><img class="flag" src="../pics/eng.png"></a>
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
                <h3><b><i class="fa fa-gears"></i> API</b></h3>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <table class="table_container">
                    <thead>
                        <th><h4><i class="fa fa-arrows-v"></i>  <?php echo $lang['pendulum']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong><?php echo $lang['description_continue']?> <?php echo $lang['pendulum']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_pendulum']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_pendulum']?>
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-futbol-o"></i>  <?php echo $lang['ball']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong><?php echo $lang['description_continue']?> <?php echo $lang['ball']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_ball']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_ball']?>
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-truck"></i>  <?php echo $lang['car']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong><?php echo $lang['description_continue']?> <?php echo $lang['car']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_car']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_car']?>
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-plane"></i>  <?php echo $lang['airplane']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong><?php echo $lang['description_continue']?> <?php echo $lang['airplane']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_airplane']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_airplane']?>
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-gears"></i>  API</h4></th>
                        <td>
                            <strong>Link: </strong>http://147.175.121.210:8177/WEB2-FINAL/api/
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-bar-chart"></i>  <?php echo $lang['api_stats']?> (GET/POST/MAIL)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?> (GET): </strong><?php echo $lang['description_stats1']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_stats1']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_stats1']?> <br><br>
                            <strong><?php echo $lang['description']?> (POST): </strong><?php echo $lang['description_stats2']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_stats2']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_stats2']?> <br><br>
                            <strong><?php echo $lang['description']?> (MAIL): </strong><?php echo $lang['description_stats3']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_stats3']?> <br>
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-laptop"></i>  <?php echo $lang['console']?></h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong><?php echo $lang['description_console']?> <br>
                            <strong><?php echo $lang['parameters']?>: </strong><?php echo $lang['parameters_console']?> <br>
                            <strong><?php echo $lang['response']?>: </strong><?php echo $lang['response_console']?>
                        </td>
                    </thead>
                </table>

                <div class="downloadBtnApi">
                    <div>
                        <form action="../fileDownload/downloadPdf.php" method="post">
                            <button type="submit" name="pdfDownloadSvk"><i class="fa fa-file-pdf-o btn"></i> api_svk.pdf</button>
                        </form>
                    </div>

                    <div>
                        <form action="../fileDownload/downloadPdf.php" method="post">
                            <button type="submit" name="pdfDownloadEng"><i class="fa fa-file-pdf-o btn"></i> api_eng.pdf</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../script/slideScript.js"></script>
    </body>
</html>
