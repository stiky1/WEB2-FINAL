<?php
if ((!defined('CONST_INCLUDE_KEY')) || (CONST_INCLUDE_KEY !== 'd4e2ad09-b1c3-4d70-9a9a-0e6149302486')) {
    header("Location: http://147.175.121.210:8177/404.html", TRUE, 404);
    die;
}

class API_Handler {
    public function execCommand($functionName, $functionParam) {
        if(isset($functionName) || $functionName != '' && isset($functionParam)) {
            if($functionName == 'airplane') {
                return $this->airPlane($this->decode($functionParam));
            } if ($functionName == 'ball') {
                return $this->ball($this->decode($functionParam));
            } if ($functionName == 'pendulum') {
                return $this->pendulum($this->decode($functionParam));
            } if ($functionName == 'suspension') {
                return $this->suspensionSys($this->decode($functionParam));
            } if($functionName == 'cmd') {
                return $this->cmd($functionParam);
            } if($functionName == 'incStat') {
                return $this->incrementStats($functionParam);
            } if($functionName == 'getStat') {
                return $this->getStats();
            } if($functionName == 'sendMail') {
                return $this->sendMail($functionParam);
            }
        }
    }

    function decode($functionParam) {
        if (isset($functionParam)) {
            $functionParam = json_decode($functionParam, true);
            return $functionParam;
        }
    }
    private function airPlane($param) {
        $cmd = "r=".$param['r'];
        $cmd = 'octave -q --no-window-system --eval "'.$cmd.'; airplane"';
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function ball($param) {
        $param = "r=".$param['r'];
        $cmd = 'octave -q --no-window-system --eval "'.$param.'; ball"';
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function pendulum($param) {
        $param = "r=".$param['r'];
        $cmd = 'octave -q --no-window-system --eval "'.$param.'; pendulum"';
        exec($cmd, $op, $rv);
        $this->createLog($rv,$param);
        unset($op[0], $op[1]);
        return $this->parseData($op);
    }
    private function suspensionSys($param) {
        $param = "r=".$param['r'];
        $cmd = 'octave -q --no-window-system --eval "'.$param.'; suspension"';
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
        $time = array();
        $data1 = array();
        $data2 = array();
//        $data3 = array();
        foreach ($op as $cell) {
            $cell = preg_replace('/\s+/', ' ', $cell);
            $angleData = explode(" ", $cell);
            if($angleData[1] != null) {array_push($time, $angleData[1]);}
            if($angleData[2] != null) {array_push($data1, $angleData[2]);}
            if($angleData[3] && $angleData[2] != null) {array_push($data2, $angleData[3]);}
//            if($angleData[4]) {array_push($data3, $angleData[4]);}
        }
        $data["time"] = $time;
        $data["data1"] = $data1;
        $data["data2"] = $data2;
//        $data["data3"] = $data3;
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
        $info = ($response == 'true' ? '' : ''.$command.' is undefined');
        $sql = "INSERT INTO logs (command, commandTime, execution, executeInfo)
                VALUES ('$command', '$commandTime','$response','$info')";
        $connect->query($sql);
    }

    private function sendMail($address) {
        include './config.php';
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            return json_encode(false,JSON_PRETTY_PRINT);
        }
        $stats = $this->decode($this->getStats());
        $mess = 'Airplane: '.$stats['airplane'].'%'. "\r\n" .
                'Beam and Ball: '.$stats['ball'].'%'. "\r\n".
                'Pendulum: '.$stats['pendulum'].'%'. "\r\n" .
                'Suspension system: '.$stats['suspensionsys'].'%';
        $mailTo = $address;
        $subject = 'SSSB website stats';
        $headers = 'From: sssb@finalzadanie.com' . "\r\n" .
            'Reply-To: sssb@finalzadanie.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        if(mail($mailTo, $subject, $mess, $headers)) {
            return json_encode(true,JSON_PRETTY_PRINT);
        }
        return json_encode(false,JSON_PRETTY_PRINT);
    }
}
