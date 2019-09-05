<?php

$im = imagecreatefromjpeg('d5_image.jpg');

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp.
$thumb = imagecreatetruecolor(3, 1);
imagecopyresized($thumb, $im, 0, 0, 0, 0, 3, 1, 2000, 1330);


echo outputColor(imagecolorat($thumb, 0, 0)) . '<br/>';
echo outputColor(imagecolorat($thumb, 1, 0)) . '<br/>';
echo outputColor(imagecolorat($thumb, 2, 0)) . '<br/>';


function outputColor($rgb) {
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;

    return $r . ',' . $g . ',' . $b;
}

?>