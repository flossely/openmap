<?php
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
    $say =
    [
        '-1' =>
        [
            'You are cancer',
            'Be damned',
            'How good you died',
        ],
        '0' =>
        [
            'Burn in hell',
            'It serves you right',
            'Much better off without you',
        ],
        '1' =>
        [
            'Good riddance',
            'Hopefully you get what you deserve',
            'You are human scum',
        ],
    ];
    $sayRand = rand(0,2);
    echo $sub.' to '.$obj.': '.$say[$subMode][$sayRand].'<br>';
}