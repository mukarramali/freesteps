<?php
  $url = parse_url("mysql://b6df5ce52bbc63:f82ebc5b@us-cdbr-iron-east-05.cleardb.net/heroku_ec7331b11c15f13?reconnect=true");
  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

  $conn = new mysqli($server, $username, $password, $db);

  define("VEHICLE_TABLE", "vehicles");
  define("VEHICLE_ID", "vehicle_id");
  define("LATITUDE", "latitude");
  define("LONGITUDE", "longitude");
  define("BEARINGS", "bearings");
  define("PHONE", "phone");

  $query = "SELECT * FROM ".VEHICLE_TABLE;
  $result = mysqli_query($conn, $query);

  if(empty($result)) {
    $query = "CREATE TABLE ".VEHICLE_TABLE." (
              ".ID." int(11) AUTO_INCREMENT,
              ".VEHICLE_ID." varchar(20) NOT NULL,
              ".LATITUDE." decimal,
              ".LONGITUDE." decimal,
              ".BEARINGS." decimal,
              ".PHONE." varchar(20) NOT NULL,
              ".PRIMARY." KEY  (ID)
              )";
    $result = mysqli_query($conn, $query);
    echo "Table created!";
  }

  function failed(){
    die("{\"status\": false}");
  }

   //Table structure:
   //vehicles(id int, vehicle_id varchar(20), phone varchar(10), latitude decimal, longitude decimal, bearings decimal)
?>