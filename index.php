<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="final_CSS.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Inverted Pendulum</title>
</head>
<body>
<nav class="navbar navbar-inverse nav-improve">
    <div class="container-fluid">
        <ul class="nav navbar-nav flexing">
            <li>
                <a href="skLang.php"><i class="fas fa-cloud-sun"></i><br>Slovak Language</a>
            </li>
            <li>
                <a href="index.php"><i class="fas fa-map-marked-alt"></i><br>English Language</a>
            </li>
        </ul>
    </div>
</nav>

<div id = "firstDiv"><br>
    <label for="const">Set new r position:</label>
    <input id="const" type="text">
    <button>Send value</button><br><br><br>
    <label for="exampleFormControlTextarea6">Select option:</label><br><br>
    <label>
        <input id = "graph" type="checkbox" alt="Graph" onclick="showMe()">
    </label> Graph
    <label>
        <input id = "animation" type="checkbox" alt="Animation">
    </label> Animation
    <label>
        <input id = "animation" type="checkbox" alt="Graph">
    </label> Graph & Animation
</div>
<div id = "app">
    <div id = "myDiv"></div>
    <script>
        function showMe() {
            if(document.getElementById("graph").checked) {
                document.getElementById("myDiv").style.display = "none";
            } else {
                document.getElementById("myDiv").style.display = "block";
            }
        }
    </script>
    <div class = "txt">
        <?php
        $cmd = "octave -q --no-window-system --eval '[t,y]=kyvadlo()'";
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

        foreach ($op as $cell){
            if($cell === 't =' || $foundT){
                $foundT = true;
                array_push($t,round($cell,2));
            }
            if ($cell === 'y =' || $foundY){
                $foundT = false;
                $foundY = true;
                array_push($y,round($cell,5));
            }
        }
        $key = array_search("t =",$t);
        unset($t[$key]);
        $key = array_search("y =",$y);
        unset($y[$key]);
        ?>
        <div>
            <embed src="svg/Ellipse%201.svg">
        </div>
        <script>
            var xArray= [<?php echo '"'.implode('","', $t).'"' ?>];
            var yArray= [<?php echo '"'.implode('","', $y).'"' ?>];

            var trace1 = {
              x: xArray,
              y: yArray,
              type: 'scatter'
            };

            var data = [trace1];

            Plotly.newPlot('myDiv', data);
        </script>
    </div>
</div>
</body>
</html>
