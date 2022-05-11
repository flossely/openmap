<?php
$dir = '.';
$mode = ($_REQUEST['mode']) ? $_REQUEST['mode'] : '';
$list = str_replace($dir.'/','',(glob($dir.'/*', GLOB_ONLYDIR)));
foreach ($list as $key=>$value) {
    if (!file_exists($value.'/coord')) {
        unset($list[array_search($value, $list)]);
    }
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>OpenMap</title>
<link rel="shortcut icon" href="sys.space.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
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

<?php } elseif ($mode == 'log') { ?>

<?php } elseif ($mode == 'top') {
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