<?php
$dir = '.';
$mode = ($_REQUEST['mode']) ? $_REQUEST['mode'] : '';
if ($mode == '') {

} elseif ($mode == 'log') {
    $turn = ($_REQUEST['turn']) ? $_REQUEST['turn'] : 10;
    $list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
    foreach ($list as $key=>$value) {
        if (!file_exists($value.'/coord') && !file_exists($value.'/rating') && !file_exists($value.'/mode')) {
            unset($list[array_search($value, $list)]);
        }
    }
    $count = count($list);
    $last = $count - 1;
} elseif ($mode == 'top') {
    $list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
    foreach ($list as $key=>$value) {
        if (!file_exists($value.'/coord') && !file_exists($value.'/rating') && !file_exists($value.'/mode')) {
            unset($list[array_search($value, $list)]);
        }
    }
} else {

}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>OpenMap</title>
<link rel="shortcut icon" href="sys.space.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<?php include 'base.incl.php'; ?>
</head>
<body>
<div class='top'>
<p align='center'>
<input type='button' value='Home' onclick="window.location.href='openmap.php';">
<input type='button' value='Log' onclick="window.location.href='openmap.php?mode=log';">
<input type='button' value='Top' onclick="window.location.href='openmap.php?mode=top';">
<input type='button' value='Reset' onclick="manage('reset','','');">
<input type='button' value='U' onclick="get('i','','from','space','','flossely',true); get('i','','from','cartesian','','flossely',true); get('i','','from','openmap','','flossely',false);">
<input type='button' value='X' onclick="window.location.href='index.php';">
</p>
</div>
<div class='panel'>
<?php if ($mode == '') { ?>

<?php } elseif ($mode == 'log') {
    for ($i=0; $i<=$turn; $i++) {
        $sub = $list[rand(0,$last)];
        $subRating = file_get_contents($sub.'/rating');
	$subMode = file_get_contents($sub.'/mode');
	$subCoord = file_get_contents($sub.'/coord');
	$subCoordDiv = explode(';', $subCoord);
	$subX = $subCoordDiv[0];
	$subY = $subCoordDiv[1];
	$subZ = $subCoordDiv[2];
        $obj = $list[rand(0,$last)];
        $objRating = file_get_contents($obj.'/rating');
	$objMode = file_get_contents($obj.'/mode');
	$objCoord = file_get_contents($obj.'/coord');
	$objCoordDiv = explode(';', $objCoord);
	$objX = $objCoordDiv[0];
	$objY = $objCoordDiv[1];
	$objZ = $objCoordDiv[2];
        if ($subMode > $objMode) {
            $subForce = ($subMode - $objMode) + 1;
        } elseif ($subMode < $objMode) {
            $subForce = ($objMode - $subMode) - 1;
        } elseif ($subMode == $objMode) {
            $subForce = 1;
        }
        include 'machine.php';
        file_put_contents($sub.'/rating', $subRating);
	chmod($sub.'/rating', 0777);
	file_put_contents($sub.'/mode', $subMode);
	chmod($sub.'/mode', 0777);
	file_put_contents($sub.'/coord', $subX.';'$subY.';'.$subZ);
	chmod($sub.'/coord', 0777);
        file_put_contents($obj.'/rating', $objRating);
	chmod($obj.'/rating', 0777);
	file_put_contents($obj.'/mode', $objMode);
	chmod($obj.'/mode', 0777);
	file_put_contents($obj.'/coord', $objX.';'$objY.';'.$objZ);
	chmod($obj.'/coord', 0777);
    }
} elseif ($mode == 'top') {
    foreach ($list as $key=>$value) {
        $coord = file_get_contents($value.'/coord');
        $coordDiv = explode(';', $coord);
        $coordX = $coordDiv[0];
        $coordY = $coordDiv[1];
        $coordZ = $coordDiv[2];
        echo $value.' ('.$coordX.';'.$coordY.';'.$coordZ.')<br>';
    }
} else { ?>

<?php } ?>
</div>
</body>
</html>