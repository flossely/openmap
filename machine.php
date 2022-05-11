<?php
if ($sub == $obj) {
    echo $sub.' ('.$subRating.')';
} elseif ($sub != $obj) {
    if ($subRating >= 0) {
        if ($objRating >= 0) {
            if (($subMode == 0 && $objMode == 0) || ($subMode > 0 && $objMode < 0) || ($subMode < 0 && $objMode > 0)) {
                $objRating = $objRating - $subForce;
                $subRating = $subRating + $subForce;
                echo $sub.' ('.$subRating.') - '.$obj.' ('.$objRating.')<br>';
            } elseif (($subMode > 0 && $objMode > 0) || ($subMode < 0 && $objMode < 0)) {
                $objRating = $objRating + $subForce;
                $subRating = $subRating - $subForce;
                echo $sub.' ('.$subRating.') + '.$obj.' ('.$objRating.')<br>';
            } elseif (($subMode > 0 && $objMode == 0) || ($subMode < 0 && $objMode == 0) || ($subMode == 0 && $objMode > 0) || ($subMode == 0 && $objMode < 0)) {
                $objRating = $objRating + $subForce;
                $subRating = $subRating - $subForce;
                echo $sub.' ('.$subRating.') + '.$obj.' ('.$objRating.')<br>';
            }
        } elseif ($objRating < 0) {
            echo $sub.' to '.$obj.': Good riddance<br>';
        }
    } elseif ($subRating < 0) {
        if ($objRating >= 0) {
            echo $obj.' to '.$sub.': Good riddance<br>';
        } elseif ($objRating < 0) {
            echo $sub.' ('.$subRating.') '.$obj.' ('.$objRating.')<br>';
        }
    }
}