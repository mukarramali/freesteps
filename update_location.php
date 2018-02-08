<?php
require "config.php";

function create($array, $conn){
  return "insert into ".VEHICLE_TABLE."(".VEHICLE_ID.", ".PHONE.", ".LATITUDE.", ".LONGITUDE.", ".BEARINGS.") values(".newVehicleId($conn).", ".$array[PHONE].", ".$array[LATITUDE].", ".$array[LONGITUDE].", ".$array[BEARINGS].")";
}

function newVehicleId($conn){
  $result = mysqli_query($conn, "SELECT MAX(".VEHICLE_ID.") FROM ".VEHICLE_TABLE);
  $row = mysqli_fetch_row($result);
  if($row == 0)
    return 1;
  else
    return $row[0] + 1;
}

function present(phone){
  $result = mysqli_query("SELECT * FROM ".VEHICLE_TABLE." where ".PHONE."='".phone."'");
  $row = mysqli_fetch_row($result);
  if($row == 0)
    return false;
  else
    return true;
}

function update($array){
  return "update ".VEHICLE_TABLE." set ".PHONE."=".$array[PHONE].", ".LATITUDE."=".$array[LATITUDE].", ".LONGITUDE."=".$array[LONGITUDE].", ".BEARINGS."=".$array[BEARINGS]." where ".VEHICLE_ID."=".$array[VEHICLE_ID];
}


if(isset($_POST[PHONE]) && isset($_POST[LATITUDE]) && isset($_POST[LONGITUDE]) && isset($_POST[BEARINGS]))
{
  if(!isset($_POST[VEHICLE_ID]))
    $query = create($_POST, $conn);
  else
    $query = update($_POST); 
  if(mysqli_query($conn, $query))
    echo "{\"status\": true}";
  else{
    echo $query;
    failed();
  }
}
else failed();

?>
