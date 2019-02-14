<?php

require 'vendor/autoload.php';

ini_set('display_errors','on');
date_default_timezone_set('PRC');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//throw new Exception('Error');

$params = '{"pagesize":"10","requestid":"debug18428239","uid":"8105456","startposition":"0","learnLevel":"0","token":"774cd882e6e71d066270394dc449fd75"}';

$params_arr = json_decode($params, true);

//$curl = new \Curl\Curl();
//$curl->post('http://102.pms.cn/v2/forclient/mirrorlist', $params_arr);
//
//if ($curl->error) {
//    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
//} else {
//    echo 'Response:' . "\n";
//    echo '<pre>';
//    var_dump($curl->response);
//}

$path = 'data.xlsx';

$PHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

$sheetData = $PHPExcel->getActiveSheet()->toArray(null,true,true,true);

$data = [];

foreach ($sheetData as $k => $v)
{
    $data[] = $v['A'];
    if ($k >= 20)
    {
        break;
    }
}

echo '<pre>';
//print_r($sheetData);die;
print_r($data);die;