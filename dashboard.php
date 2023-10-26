<?php
/**
 * DashboardBuilder
 *
 * @author Diginix Technologies www.diginixtech.com
 * Support <support@dashboardbuider.net> - https://www.dashboardbuilder.net
 * @copyright (C) 2016-2022 Dashboardbuilder.net
 * @version 5.3
 * @license: This code is under MIT license, you can find the complete information about the license here: https://dashboardbuilder.net/code-license
 */

include("inc/dashboard_dist.php");  // copy this file to inc folder 


// for chart #1
$data = new dashboardbuilder(); 
$data->type[0]=  "";

$data->source =  "Database"; 
$data->rdbms =  "mysql"; 
$data->servername =  "locahost";
$data->username =  "root";
$data->port = 3369;
$data->password =  "";
$data->dbname =  "foodorder";
$data->toImage = "Download graph";
$data->zoomin = "Zoom in";
$data->zoomout = "Zoom out";
$data->autoscale = "Reset";
$data->filter = "";

$data->name = "";
$data->title = "";
$data->orientation = "";
$data->dropdown = "";
$data->side = "";
$data->toImage = "Download graph";
$data->zoomin = "Zoom in";
$data->zoomout = "Zoom out";
$data->autoscale = "Reset";
$data->filter = "";
$data->forecastlabel = "Forecast";
$data->legposition = "";
$data->xaxistitle = "";
$data->yaxistitle = "";
$data->datalabel = "";
$data->showgrid = "";
$data->showline = "";
$data->height = "380";
$data->width = "";
$data->col = "0";




$result[0] = $data->result();?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="assets/js/dashboard.min.js"></script> <!-- copy this file to assets/js folder -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> <!-- Bootstrap CSS file, change the path accordingly -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">  <!-- Font Awesome CSS file, change the path accordingly -->
	
<style>
@media screen and (min-width: 960px) {
.id0 {position:absolute;top:0px;}

}
.panel-heading {line-height:0.7em;}
#number {font-size:34px; font-weight:bold;text-align:center;}
#number_legand {font-size:11px; text-align:center;}
.panel-body {  box-shadow: 5px 5px 35px  #e0e0e0;color:#787b80;}
.page-header {margin-top:-30px;}.dropdown-toggle{font-size:12px;line-height:12px;}
	.selectoption {font-size:12px !important;}
	.bs-searchbox > input {
	  font-size: 12px;
	  height:26px;
	}
</style>

</head>
<body> 

<div class="container-fluid main-container">
<div class="col-md-12 col-lg-12 col-xs-12">
	<div class="row">
	<div class="col-md-12 col-lg-12 col-xs-12  id0">
	<div class="panel panel-default">
		<div class="panel-body">
		<span> Chart</span>
			<?php echo $result[0];?>
		</div>
	</div>
	</div>
	</div>
</div>
</div>

</body>
