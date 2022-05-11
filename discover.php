<?php
if ($subRating >= 0) {
    if ($objRating >= 0) {
        if (($subMode == 0 && $objMode == 0) || ($subMode > 0 && $objMode < 0) || ($subMode < 0 && $objMode > 0)) {
            $objRating = $objRating - $subForce;
            $subRating = $subRating + $subForce;
            echo $sub.' ('.$subRating.') harmed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
        } elseif (($subMode > 0 && $objMode > 0) || ($subMode < 0 && $objMode < 0)) {
            $objRating = $objRating + $subForce;
            $subRating = $subRating - $subForce;
            echo $sub.' ('.$subRating.') healed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
        } elseif (($subMode > 0 && $objMode == 0) || ($subMode < 0 && $objMode == 0) || ($subMode == 0 && $objMode > 0) || ($subMode == 0 && $objMode < 0)) {
            $objRating = $objRating + $subForce;
            $subRating = $subRating - $subForce;
            echo $sub.' ('.$subRating.') healed ('.$subForce.') '.$obj.' ('.$objRating.')<br>';
        }
    } elseif ($objRating < 0) {
        echo $sub.' to '.$obj.': good riddance<br>';
    }
} elseif ($subRating < 0) {
    if ($objRating >= 0) {
        echo $obj.' to '.$sub.': good riddance<br>';
    } elseif ($objRating < 0) {
        echo $sub.' ('.$subRating.') is dead<br>';
    }
}