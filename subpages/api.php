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
                            <strong><?php echo $lang['description']?>: </strong>vráti json s hodnotami určenými pre kyvadlo <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "pendulum", parametre pre CAS <br>
                            <strong><?php echo $lang['response']?>: </strong>{ čas[], pozicia kyvadla[], naklon vertikalnej tyce[] }
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-futbol-o"></i>  <?php echo $lang['ball']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong>vráti json s hodnotami určenými pre guličku <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "ball", parametre pre CAS <br>
                            <strong><?php echo $lang['response']?>: </strong>{ čas[], pozícia guličky[], náklon tyče[] }
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-truck"></i>  <?php echo $lang['car']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong>vráti json s hodnotami určenými pre tlmič <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "suspension", parametre pre CAS <br>
                            <strong><?php echo $lang['response']?>: </strong>{ čas[], pozícia auta[], pozícia kolesa[] }
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-plane"></i>  <?php echo $lang['airplane']?> (GET)</h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong>vráti json s hodnotami určenými pre lietadlo <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "airplane", parametre pre CAS <br>
                            <strong><?php echo $lang['response']?>: </strong>{ čas[], náklon lietadla[], náklon zadnej klapky[] }
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
                            <strong><?php echo $lang['description']?> (GET): </strong>vráti json s hodnotami z databázy návštevnosti stránok <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "getStat" <br>
                            <strong><?php echo $lang['response']?>: </strong>{ názov stránky: počet, ... } <br><br>
                            <strong><?php echo $lang['description']?> (POST): </strong>aktualizuje štatistiku stránok v databáze <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "incStat", parameter pre funkciu(názov stránky) <br>
                            <strong><?php echo $lang['response']?>: </strong>{ true - ak všetko prebehlo vporiadku } <br><br>
                            <strong><?php echo $lang['description']?> (MAIL): </strong>odošle mail so štatistikami na zadanú mailovú adresu <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "sendMail", parametre pre funkciu(mailová adresa) <br>
                        </td>
                    </thead>

                    <thead>
                        <th><h4><i class="fa fa-laptop"></i>  <?php echo $lang['console']?></h4></th>
                        <td>
                            <strong><?php echo $lang['description']?>: </strong>vráti json s výsledkom pre zadaný príkaz ktorý vyráta CAS <br>
                            <strong><?php echo $lang['parameters']?>: </strong>api kľúč, názov funkcie - "cmd", parameter - príkaz do CAS <br>
                            <strong><?php echo $lang['response']?>: </strong>{ výsledok z CAS pre zadaný príkaz }
                        </td>
                    </thead>
                </table>
            </div>
        </div>
        <script src="../script/slideScript.js"></script>
    </body>
</html>
