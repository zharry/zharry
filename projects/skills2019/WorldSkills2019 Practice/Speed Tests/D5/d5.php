<?php

// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefromjpeg('d5_watermark.jpg');
$im = imagecreatefromjpeg('d5_image.jpg');

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, 2000 - 400, 1330 - 400, 0, 0, 400, 400);

// Output and free memory
header('Content-type: image/png');
imagepng($im);

imagedestroy($im);
imagedestroy($stamp);

?>