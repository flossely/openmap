<?php
$objRating = file_get_contents($obj.'/rating');
$objMode = file_get_contents($obj.'/mode');
$objCoord = file_get_contents($obj.'/coord');
$objCoordDiv = explode(';', $objCoord);
if (is_numeric($objX)) {
    $objX = $objCoordDiv[0];
} else {
    $objX = 0;
}
if (is_numeric($objY)) {
    $objY = $objCoordDiv[1];
} else {
    $objY = 0;
}
if (is_numeric($objZ)) {
    $objZ = $objCoordDiv[2];
} else {
    $objZ = 0;
}