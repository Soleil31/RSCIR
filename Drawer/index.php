<html lang="en">
<head>
<title>Drawer</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
if (isset($_GET['number'])) {
    if (!is_numeric($_GET['number'])) {
        echo 'Incorrect data';
        exit(0);
    }

    $number = (int)$_GET['number'];
    $form = $number & 3;
    $color = $number >> 2 & 3;
    $length = $number >> 4 & 3;
    $width = $number >> 6 & 3;
    $length = 100 + $length * 100;
    $width = 100 + $width * 100;

    $filling = "pink";
    switch ($color) {
        case 0:
            $filling = "yellow";
            break;
        case 1:
            $filling = "red";
            break;
        case 2:
            $filling = "blue";
            break;
        case 3:
            $filling = "green";
            break;
        default:
            $filling = "black";
            break;
    }

    $svg_code = '<svg width = "' . $length . '" height= "' . $width . '">';
    switch ($form) {
        case 0:
            $svg_code .= '<rect x="0" y="0" width="' . $length . '" height="' . $width . '" fill="' . $filling . '" />';
            break;

        case 1:
            $svg_code .= '<ellipse cx="' . $length / 2 . '" cy ="' . $width / 2 . '" rx="' . $length / 2 . '" ry="' . $width / 3 . '" fill = "' . $filling . '" />';
            break;
        case 2:
            if ($length > $width) {
                $length = $width;
            } else {
                $width = $length;
            }
            $svg_code .= '<circle cx="' . $length / 2 . '" cy ="' . $width / 2 . '" r="' . $length / 2 . '" fill = "' . $filling . '" />';
            break;
        case 3:
            if ($length > $width) {
                $length = $width;
            } else {
                $width = $length;
            }
            $svg_code .= '<rect x="0" y="0" width="' . $length . '" height="' . $width . '" fill="' . $brush . '" />';
            break;
    }

    $svg_code .= '</svg>';
    echo $svg_code;
} else echo "Incorrect data";
?>
</body>
</html>
