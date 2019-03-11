<?php 
$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'lujui-db';
$dbuser = 'lujui-db';
$dbpass = 'vcM2bmdztHb6d793';
$link = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,initial-scale=1" />
		<title>OSU CS540</title>
		<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/top_100.css?v=1.44" rel="stylesheet" />
			
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top affix" data-spy="affix" data-offset-top="190">
			<div class="container-fluid">
			<div class="navbar-header">
				<button aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-6" data-toggle="collapse" type="button">
					<span class="sr-only">Toggle navigation</span>
				</button><a class="navbar-brand" href="./index.html">OSU CS540</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
			</div>
			</div>
		</nav>

		<div class="intro-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="intro-message">
						<h1>Top Wine</h1>

						<hr class="intro-divider" />
							<div class="input-group">
								<?php
										// $wineid = $_GET["id"];
										$query1 = "SELECT WK.rank,WK.winery, WK.wine, WK.description, count(WD.winery) FROM `wine_data_1` WD,`wine_ranking` WK WHERE WD.winery= WK.winery and WK.rank<50 group by WK.rank LIMIT 0 , 30";
										$query2 = "SELECT WK.rank,WK.winery, WK.wine, WK.description, count(WD.winery) FROM `wine_data_1` WD,`wine_ranking` WK WHERE WD.winery= WK.winery and WK.rank>50 group by WK.rank LIMIT 0 , 30";
										$data1 = mysqli_query($link, $query1);
										$data2 = mysqli_query($link, $query2);
										if (mysqli_num_rows($data1) == 0&&mysqli_num_rows($data2) == 0)
										{
											echo "No Result";
											exit;
										}
								?>
								<table width="700" border="1" align="left">
								<tr>
									<td >Rank</td>
									<td >Winery</td>
									<td >Wine</td>
									<td >description</td>
									<td >Number of wine in searching system</td>
								</tr>
								<?php
									for($i=1;$i<=mysqli_num_rows($data1);$i++){
										$rs1=mysqli_fetch_row($data1);
								?>
									<tr>
										<td><?php echo $rs1[0]?></td>
										<td><?php echo $rs1[1]?></td>
										<td><?php echo $rs1[2]?></td>
										<td><?php echo $rs1[3]?></td>
										<td><?php echo $rs1[4]?></td>
									</tr>
								<?php
									}
								?>
								<?php
									for($i=1;$i<=mysqli_num_rows($data2);$i++){
										$rs2=mysqli_fetch_row($data2);
								?>
									<tr>
										<td><?php echo $rs2[0]?></td>
										<td><?php echo $rs2[1]?></td>
										<td><?php echo $rs2[2]?></td>
										<td><?php echo $rs2[3]?></td>
										<td><?php echo $rs2[4]?></td>
									</tr>
								<?php
									}
								?>
						<!-- &nbsp; -->
						<!-- <div id="msg"></div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!-- <script src="index.php"></script> -->
</html>