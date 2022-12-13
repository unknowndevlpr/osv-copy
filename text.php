<?php

$currentdate = date('d-m-y');
$dateset = "29-7-22";
$currentdate1 = strtotime($currentdate);
$dateset1 = strtotime($dateset);

if($dateset1 >= $currentdate1){
    echo "okay";
}else{
    echo "not okay";
}

$date23 = date('Y-m-d');
echo "$date23";
?>
