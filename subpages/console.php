<?php
    include "../config.php";
    include "./fileDownload/downloadCsv.php";
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
                                        <a href="console.php?lang=svk" class="w3-bar-item w3-button"><img class="flag" src='../pics/svk.png'></a>
                                        <a href="console.php?lang=eng" class="w3-bar-item w3-button"><img class="flag" src="../pics/eng.png"></a>
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
                <h3><b><i class="fa fa-laptop"></i> <?php echo $lang['console']?></b></h3>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class = "consoleContainer"><br>
                    <div class="cmd">
                        <textarea id="command" name="command" rows="8" cols="50" placeholder="<?php echo $lang['command']?>"></textarea><br>
                        <button id="commandSubmit" type="submit" name="commandSubmit" class="btn buttons"><?php echo $lang['submit']?></button>
                    </div>

                    <div id="result"></div>
                </div>

                <div class="dataExport">
                    <header class="w3-container" style="padding-top:22px">
                        <h4><b><i class="fa fa-download" aria-hidden="true"></i> <?php echo $lang['export']?></b></h4>
                    </header>

                    <div class="downloadBtn">
                        <div>
                            <form id="downloadCsv" action="../fileDownload/downloadCsv.php" method="post">
                                <button type="submit" name="excelDownload"><i class="fa fa-file-excel-o btn"></i> .csv</button>
                            </form>
                        </div>

                        <div>
                            <form id="downloadPdf" action="../fileDownload/downloadPdf.php" method="post">
                                <button id="pdfDownload" type="submit" name="pdfDownload"><i class="fa fa-file-pdf-o btn"></i> .pdf</button>
                            </form>
                        </div>
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
