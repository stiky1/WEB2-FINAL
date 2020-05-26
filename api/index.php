<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: *');
    if (!defined('CONST_INCLUDE_KEY')) {define('CONST_INCLUDE_KEY', 'd4e2ad09-b1c3-4d70-9a9a-0e6149302486');}
    require('./src/apiHandler.php');
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if (in_array($requestMethod, ["GET", "POST", "PUT", "DELETE", "OPTIONS"])) {
        if (isset(getallheaders()['auth-key']) && getallheaders()['auth-key'] == CONST_INCLUDE_KEY) {
            $functionName = getallheaders()['function'];
            $functionParam = getallheaders()['functionParam'];

            $apiHandler = new API_Handler();
            $response = $apiHandler->execCommand($functionName, $functionParam);
            echo $response;
        } else {
            echo json_encode('Access denied.');
        }
    }

