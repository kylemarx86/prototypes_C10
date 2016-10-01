<?php
//    $output = [
////        'success'=>'true',
////        'error'=>[],
////        'files'=>glob("images/*.jpg")
//        'success'=>['success'=>'true', 'files'=>glob("images/*.jpg")],
//        'error'=>['success'=>'false', 'errors'=>[]]
//    ];

$output = [];
$output['success'] = false;
$data = glob("images/*.jpg");
$output['files'] = $data;
$output['success'] = true;

//    json_encode($output);
//    print_r($output);
    $output = json_encode($output);

    print_r($output);

//    print_r(json_encode($output));
?>