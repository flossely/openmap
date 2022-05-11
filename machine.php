<?php
if ($sub == $obj) {
    echo $sub.' ('.$subRating.') is thinking...<br>';
} elseif ($sub != $obj) {
    if ($subX > $objX) {
        $distX = $subX - $objX;
    } elseif ($subX < $objX) {
        $distX = $objX - $subX;
    } elseif ($subX == $objX) {
        $distX = 0;
    }
    if ($subY > $objY) {
        $distY = $subY - $objY;
    } elseif ($subY < $objY) {
        $distY = $objY - $subY;
    } elseif ($subY == $objY) {
        $distY = 0;
    }
    if ($subZ > $objZ) {
        $distZ = $subZ - $objZ;
    } elseif ($subZ < $objZ) {
        $distZ = $objZ - $subZ;
    } elseif ($subZ == $objZ) {
        $distZ = 0;
    }
    if (($distX <= $subRating) && ($distY <= $subRating) && ($distZ <= $subRating)) {
        include 'discover.php';
    } else {
        echo $obj.' not reachable';
    }
}