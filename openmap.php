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
<input type='button' value='HOME' onclick="window.location.href='openmap.php';">
<input type='button' value='LOG' onclick="window.location.href='openmap.php?mode=log';">
<input type='button' value='TOP' onclick="window.location.href='openmap.php?mode=top';">
<input type='button' value='U' onclick="get('i','','from','space','','flossely',true); get('i','','from','cartesian','','flossely',true); get('i','','from','openmap','','flossely',false);">
<input type='button' value='X' onclick="window.location.href='index.php';">
</p>
</div>
<div class='panel'>
<?php if ($mode == '') { ?>

<?php } elseif ($mode == 'log') {
    for ($i=0; $i<=$turn; $i++) {
        $sub = $list[rand(0,$last)];
        include 'autosubopen.php';
        $obj = $list[rand(0,$last)];
        include 'autoobjopen.php';
        if ($subMode > $objMode) {
            $subForce = ($subMode - $objMode) + 1;
        } elseif ($subMode < $objMode) {
            $subForce = ($objMode - $subMode) - 1;
        } elseif ($subMode == $objMode) {
            $subForce = 1;
        }
        include 'machine.php';
        include 'autosubsave.php';
        include 'autoobjsave.php';
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