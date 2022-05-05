<?php
$mapname = ($_REQUEST['name']) ? $_REQUEST['name'] : 'sample.map';
$mapfile = file_get_contents($mapname);
$mapdel = explode('|[1]|', $mapfile);
$map = [];
foreach ($mapdel as $mapord => $maprow) {
    $mapdeli = explode('|[2]|', $maprow);
    $mapi = [];
    foreach ($mapdeli as $mapabs => $mapelem) {
    	$mapexp = explode('|[3]|', $mapelem);
    	$maphead = $mapexp[0];
    	$mapbody = $mapexp[1];
    	$mapheadexp = explode('|[4]|', $maphead);
    	$mapheadx = $mapheadexp[0];
    	$mapheady = $mapheadexp[1];
    	$mapbodyexp = explode('|[4]|', $mapbody);
    	$mapbodyalt = $mapbodyexp[0];
    	$mapbodytitle = $mapbodyexp[1];
    	$mapi[] = $mapbodyalt;
    }
    $map[] = $mapi;
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>OpenMap</title>
<link rel="shortcut icon" href="sys.space.png?rev=<?=time();?>" type="image/x-icon">
<link href="system.css?rev=<?=time();?>" rel="stylesheet">
<!-- Plotly.js -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
<!-- Plotly chart will be drawn inside this DIV -->
<div id="myDiv" style="width:100%; height:100%;"></div>
<script>
  /* JAVASCRIPT CODE GOES HERE */
  var jsonObj = JSON.parse('<?=json_encode($map);?>');
  var arr = [];
  
  for (var i=0;i<jsonObj.length;i++){
    for (tile in jsonObj[i]){
      arr.push(jsonObj[i][tile]);
    }
  }
  
  var data =
  [
    {
      z: [[0,50,-20],[0,50,-20],[0,50,-20],[0,50,-20]],
      type: 'surface',
    }
  ];
var layout = {
  title: '',
  autosize: true,
  width: 800,
  height: 600,
  margin: {
    l: 65,
    r: 50,
    b: 65,
    t: 90
  }
};
Plotly.newPlot('myDiv', data, layout);
  </script>
</body>
</html>