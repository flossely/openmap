<?php
if ($sub == $obj) {
    if ($subRating >= 0) {
        echo $sub.' ('.$subRating.') is thinking...<br>';
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        include 'discover.php';
        if (($distX <= $subRating) && ($distY <= $subRating) && ($distZ <= $subRating)) {
            include 'discovered.php';
        } else {
            echo $sub.': '.$obj.' not reachable<br>';
        }
    } elseif ($subRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
}