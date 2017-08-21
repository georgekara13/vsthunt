<?php
    require("db_connect.php");
    $points=array();
    $query = "SELECT * FROM markers ";
    $result = mysqli_query($mysqli,$query);
    while($row = $result->fetch_array(MYSQL_ASSOC)) {
    //        $markers[] = $row;
		array_push($points,array('name'=>$row['name'],'lat'=>$row['lat'],'lng'=>$row['lng'],'address'=>$row['address'],'type'=>$row['type']));
    }
	echo json_encode(array("markers"=>$points),JSON_NUMERIC_CHECK);
	exit;
