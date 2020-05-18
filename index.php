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
    <script src="final_JS.js"></script>
    <div class = "txt">
        <?php
        $new = $_POST["value"];
        $cmd = "octave -q --no-window-system --eval '[t,y]=kyvadlo($new)'";
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
            <object data="svg/ellipse.svg" type="image/svg+xml">
                <img src="svg/ellipse.svg" alt = "Ellipse">
            </object>
            <object data="svg/line1.svg" type="image/svg+xml">
                <img src="svg/line1.svg" alt = "Line 1">
            </object>
            <object data="svg/line2.svg" type="image/svg+xml">
                <img src="svg/line2.svg" alt = "Line 2">
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
</body>
</html>
