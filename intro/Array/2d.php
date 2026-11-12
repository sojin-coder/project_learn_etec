<?php 
//2d រក្សាទុក Array ជាមុន ហើយ Array នោះទើបរក្សាទុក Value Index 2 ជាន់
    $nested = [
    //   0   1  2
        [10,20,30],
        ['vue','react','bs'], //call row
        ['php','js','cpp']
    ];
    foreach($nested as $value){
        echo $value[0]."<br>";
        echo $value[1]."<br>";
        echo $value[2]."<br>";
        echo "<hr>";
    }


?>