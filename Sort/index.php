<html lang="en">
<head>
<title>Sort</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
function insertSort(&$arr) {
    $count = sizeof($arr);
    if ($count <= 1) {
        return $arr;
    }
 
    for ($i = 1; $i < $count; $i++) {
        $cur_val = $arr[$i];
        $j = $i - 1;
 
        while (isset($arr[$j]) && $arr[$j] > $cur_val) {
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $cur_val;
            $j--;
        }
    }
 
    return $arr;
}

if (isset($_GET['array'])) {
    $array_str = $_GET['array'];
    $array = explode(",", $array_str);

    if ($array[0] == 0) {
        echo 'Incorrect data';
        exit(0);
    }
    // for ($i = 0; $i < count($array); $i++) {
    //     $array[$i] = (int)$array[$i];
    // }


    echo 'Input data: ' . implode(',', $array) . '<br>Result: ' . implode(',', insertSort($array));
} else echo "Incorrect data"
?>
</body>
</html>

<!-- http://localhost:8002/index.php/?array=22,1,45,9,10,74 -->
