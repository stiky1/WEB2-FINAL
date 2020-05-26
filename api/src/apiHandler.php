<?php
if ((!defined('CONST_INCLUDE_KEY')) || (CONST_INCLUDE_KEY !== 'd4e2ad09-b1c3-4d70-9a9a-0e6149302486')) {
    header("Location: http://147.175.121.210:8177/404.html", TRUE, 404);
    die;
}

class API_Handler {
    public function execCommand($functionName,$functionParams) {
        //return json_encode($functionParams, JSON_PRETTY_PRINT);

        if(isset($functionName) || $functionName != '' && isset($functionParams)) {
            if($functionName == 'airplane') {
                return $this->airPlane($functionParams);
            } if ($functionName == 'ball') {
                return $this->ball($functionParams);
            } if ($functionName == 'pendulum') {
                return $this->pendulum($functionParams);
            } if ($functionName == 'suspensionSys') {
                return $this->suspensionSys($functionParams);
            } if($functionName == 'cmd') {
                return $this->cmd($functionParams);
            } if($functionName == 'incStat') {
                return $this->incrementStats($functionParams);
            } if($functionName == 'getStat') {
                return $this->getStats();
            } if($functionName == 'getLogs') {
                return $this->getLogs();
            }
        }
    }

    private function airPlane($param) {
        $cmd = "octave -q --no-window-system --eval 'airplane'";
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function ball($param) {
        $cmd = "octave -q --no-window-system --eval 'ball'";
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function pendulum($param) {
        $cmd = "octave -q --no-window-system --eval 'pendulum'";
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function suspensionSys($param) {
        $cmd = "octave -q --no-window-system --eval 'suspension'";
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function cmd($example) {
        $cmd = "octave -q --no-window-system --eval '$example'";
        exec($cmd, $op, $rv);
        $this->createLog($rv,$example);
        $response = ($rv != 0 ? "' ".$example." '".' is undefined.' : $op);
        return json_encode($response, JSON_PRETTY_PRINT);
    }

    private function parseData($op) {
        $t = array();
        $y = array();
        $angle = array();

        foreach ($op as $cell) {
            $cell = preg_replace('/\s+/', ' ', $cell);
            $angleData = explode(" ", $cell);
            array_push($t, $angleData[1]);
            array_push($y, $angleData[2]);
            array_push($angle, end($angleData));
        }
        $data["t"] = $t;
        $data["y"] = $y;
        $data["angle"] = $angle;

        return json_encode($data, JSON_PRETTY_PRINT);
    }

    private function incrementStats($page){
        include './config.php';
        $sql = "UPDATE stats SET count = count + 1 where page = '$page'";
        $connect->query($sql);
        return json_encode('true',JSON_PRETTY_PRINT);
    }

    private function getStats(){
        //return json_encode("zalud", JSON_PRETTY_PRINT);
        include './config.php';
        $sql = "SELECT page, max(count) as sum FROM stats GROUP BY page";
        $stmt = $connect->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $keys = array();
        $sum = 0;

        if ($result) {
            foreach ($result as $calculation) {
                $sum += $calculation["sum"];
                $keys[$calculation["page"]] = $calculation["sum"];
            }
            $keys["pendulum"] = round(($keys["pendulum"] / $sum) * 100, 2);
            $keys["ball"] = round(($keys["ball"] / $sum) * 100,2);
            $keys["airplane"] = round(($keys["airplane"] / $sum) * 100,2);
            $keys["suspensionsys"] = round(($keys["suspensionsys"] / $sum) * 100, 2);
        }
        return json_encode($keys, JSON_PRETTY_PRINT);
    }

    private function createLog($rv, $command) {
        include './config.php';

        date_default_timezone_set("Slovakia/Bratislava");
        $commandTime = date("F j, Y, g:i a",strtotime('+2 hour'));

        $response = ($rv == 0 ? 'true' : 'false');
        $info = ($response == 'true' ? '' : 'Error');

        $sql = "INSERT INTO logs (command, commandTime, execution, executeInfo)
                VALUES ('$command', '$commandTime','$response','$info')";
        $connect->query($sql);
    }

    private function getLogs() {
        include './config.php';
        $sql = "SELECT * FROM logs";
        $stm = $connect->query($sql);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
        //return json_encode($result, JSON_PRETTY_PRINT);
    }
}
