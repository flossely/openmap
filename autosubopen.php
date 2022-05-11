<?php
$subRating = file_get_contents($sub.'/rating');
$subMode = file_get_contents($sub.'/mode');
$subCoord = file_get_contents($sub.'/coord');
$subCoordDiv = explode(';', $subCoord);
$subX = $subCoordDiv[0];
$subY = $subCoordDiv[1];
$subZ = $subCoordDiv[2];