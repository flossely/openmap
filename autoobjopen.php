<?php
$objRating = file_get_contents($obj.'/rating');
$objMode = file_get_contents($obj.'/mode');
$objCoord = file_get_contents($obj.'/coord');
$objCoordDiv = explode(';', $objCoord);
$objX = $objCoordDiv[0];
$objY = $objCoordDiv[1];
$objZ = $objCoordDiv[2];