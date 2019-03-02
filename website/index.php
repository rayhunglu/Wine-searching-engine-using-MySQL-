<?php 
$dbhost = 'oniddb.cws.oregonstate.edu';
$dbname = 'lujui-db';
$dbuser = 'lujui-db';
$dbpass = 'vcM2bmdztHb6d793';
$link = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

    if($_GET){
        $WineInformation1 = $_GET["WineInformation1"];
        $attribute1=$_GET["select1"];
        // $WineInformation2 = $_GET["WineInformation2"];
        // $attribute2=$_GET["select2"];
        $query1 = "SELECT `Wine ID`,`country`,`points`,`price`,`region1`,`title`,`variety` FROM `wine_data_1` WHERE $attribute1 = '$WineInformation1' LIMIT 0 , 30";
        // $query1 = "SELECT `Wine ID`,`country`,`points`,`price`,`region1`,`title`,`variety` FROM `wine_data_1` WHERE $attribute1 = '$WineInformation1' and $attribute2='$WineInformation2' LIMIT 0 , 30";
        // $query2 = "SELECT `Wine ID`,`country`,`points`,`price`,`region1`,`title`,`variety` FROM `wine_data_2` WHERE $attribute1 = '$WineInformation1' and $attribute2='$WineInformation2' LIMIT 0 , 30";
        // $query2 = "SELECT `Restaurant Name`, `City`,`Country Code`,`Address`,`Aggregate rating`, `dataset`FROM `zomato` WHERE `Restaurant Name` Like '%$RestaurantName%' LIMIT 0 , 30";
        // $query3 = "SELECT `store_name`, `store_city`, `store_state`, `store_address`, `store_stars`, `dataset` FROM `yelp_business` WHERE `store_name` LIKE '%$RestaurantName%' LIMIT 0 , 30";
       //$query4 = "SELECT `Name`, `City`, `State`, `Country`, `Address`, `Total Review`, `dataset` FROM `Tripadvisor` WHERE `Restaurant ID` IN (SELECT `tripid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%')";
       //$query5 = "SELECT `Restaurant Name`, `City`,`Country Code`,`Address`,`Aggregate rating`, `dataset` FROM `zomato` WHERE `Restaurant ID` IN (SELECT `zomatoid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%')";
       //$query6 = "SELECT `store_name`, `store_city`, `store_state`, `store_address`, `store_stars`, `dataset` FROM `yelp_business` WHERE `Restaurant ID` IN (SELECT `yelpid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%')";
        //print_r($query1);
        // $query4 = "SELECT `tripid`,`zomatoid`, `yelpid` FROM `nameindex` WHERE `name` LIKE '%$RestaurantName%'";
        $data1 = mysqli_query($link, $query1); 
        $data2 = mysqli_query($link, $query2); 
        // $data3 = mysqli_query($link, $query3); 
        // $data4 = mysqli_query($link, $query4);
        //$data5 = mysqli_query($link, $query5);
        //$data6 = mysqli_query($link, $query6);

        //print_r(mysqli_num_rows($data1) == 0);
        if (mysqli_num_rows($data1) == 0 )
        {
            echo "FFF";
            exit;
        }
        // for($i=1;$i<=mysqli_num_rows($data1);$i++){
        //   $rs=mysqli_fetch_row($i);
        //   echo $rs[0];
        // }
    }
    //}
?>
<table width="700" border="1" align="center">
   <tr>
    <td >Wine ID</td>
    <td >country</td>
    <td >points</td>
    <td >price</td>
    <td >region1</td>
    <td >title</td>
    <td >variety</td>
  </tr>
<?php
  for($i=1;$i<=mysqli_num_rows($data1);$i++){
$rs=mysqli_fetch_row($data1);
?>
  <tr>
    <td><?php echo "<a href='description.html?id=".$rs[0]."' target='_blank'>".$rs[0]."</a>"?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
    <td><?php echo $rs[6]?></td>
  </tr>
  
<?php
}
?>