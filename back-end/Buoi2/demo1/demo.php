<?php
    $array = [];
    $array1 = [1, 2, '3'];
    $array3 = array();

    echo $array1[1];

    $arrayKeyValue = ['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'];
    echo $arrayKeyValue['key1'];
    foreach ($arrayKeyValue as $key => $value){
        echo $key.': '.$value.'<br>';
    }

    function demoFunction($array)
    {

    }

    demoFunction($array1);
?>