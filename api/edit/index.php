<?php
session_start();

$token = isset($_REQUEST['token']) ? $_REQUEST['token'] : '00000000000000000000000000000000';

if($token != '00000000000000000000000000000000'){

include '../../config/config.php';

$dbHost = $dictumConfig['mysql']['host'];
$dbUser = $dictumConfig['mysql']['user'];
$dbPasswd = $dictumConfig['mysql']['pass'];
$dbName = $dictumConfig['mysql']['name'];
$dbPort = $dictumConfig['mysql']['port'];
$dbPrefix = $dictumConfig['mysql']['prefix'];

$module = isset($_GET['module']) ? $_GET['module'] : "NULLPAGES";

if($module != "NULLPAGES"){

    define('MODULES', "./modules/");

    include MODULES . $module . ".php";
}

else
{
    echo json_encode(array('code' => 1, 'msg' => '请提供模块名称'));
    exit(1);
}

}

else{
    echo json_encode(array('code' => 1, 'msg' => '请提供Token'));
    exit(1);
}