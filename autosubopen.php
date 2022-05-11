<?php
$subRating = file_get_contents($sub.'/rating');
$subMode = file_get_contents($sub.'/mode');
$subCoord = file_get_contents($sub.'/coord');
$subCoordDiv = explode(';', $subCoord);
if (is_numeric($subX)) {
    $subX = $subCoordDiv[0];
} else {
    $subX = 0;
}
if (is_numeric($subY)) {
    $subY = $subCoordDiv[1];
} else {
    $subY = 0;
}
if (is_numeric($subZ)) {
    $subZ = $subCoordDiv[2];
} else {
    $subZ = 0;
}