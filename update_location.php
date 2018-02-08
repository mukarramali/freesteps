<?php
require "config.php";

function create($array){

  return "insert into ".VEHICLE_TABLE."(".VEHICLE_ID.", ".PHONE.", ".LATITUDE.", ".LONGITUDE.", ".BEARINGS.") values(".newVehicleId().", ".$array[PHONE].", ".$array[LATITUDE].", ".$array[LONGITUDE].", ".$array[BEARINGS].")";
}

function newVehicleId(){
  $result = mysqli_query("SELECT MAX(".VEHICLE_ID.") FROM ".VEHICLE_TABLE);
  $row = mysqli_fetch_row($result);
  if($row == 0)
    return 1;
  else
    return $row[0] + 1;
}

function update($array){
  return "update ".VEHICLE_TABLE." set ".PHONE."=".$array[PHONE].", ".LATITUDE."=".$array[LATITUDE].", ".LONGITUDE."=".$array[LONGITUDE].", ".BEARINGS."=".$array[BEARINGS]." where ".VEHICLE_ID."=".$array[VEHICLE_ID];
}


if(isset($_POST[PHONE]) && isset($_POST[LATITUDE]) && isset($_POST[LONGITUDE]) && isset($_POST[BEARINGS]))
{
  if(!isset($_POST[VEHICLE_ID]))
    $query = create($_POST);
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
