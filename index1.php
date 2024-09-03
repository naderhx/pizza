<?php
// Create an array with sample data
$data = [
    'January' => 50,
    'February' => 80,
    'March' => 70,
    'April' => 90,
    'May' => 60
];

// Image dimensions
$width = 500;
$height = 300;

// Create the image
$image = imagecreatetruecolor($width, $height);

// Colors
$background_color = imagecolorallocate($image, 255, 255, 255); // White
$bar_color = imagecolorallocate($image, 0, 0, 255); // Blue
$border_color = imagecolorallocate($image, 0, 0, 0); // Black
$text_color = imagecolorallocate($image, 0, 0, 0); // Black

// Fill the background
imagefilledrectangle($image, 0, 0, $width, $height, $background_color);

// Bar chart settings
$bar_width = 40;
$bar_spacing = 60;
$x_start = 50;
$y_bottom = $height - 50;

// Draw bars
$x = $x_start;
foreach ($data as $label => $value) {
    $bar_height = $value;
    imagefilledrectangle($image, $x, $y_bottom - $bar_height, $x + $bar_width, $y_bottom, $bar_color);
    imagerectangle($image, $x, $y_bottom - $bar_height, $x + $bar_width, $y_bottom, $border_color);
    imagettftext($image, 10, 0, $x, $height - 10, $text_color, './arial.ttf', $label);
    $x += $bar_width + $bar_spacing;
}

// Output the image
header("Content-Type: image/png");
imagepng($image);

// Free up memory
imagedestroy($image);
?>
