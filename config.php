<?php


  $dbhost = "localhost";
  $dbuser = "mukku";
  $dbpass = "9917779786";
  $dbname = "freesteps";


  // Create connection
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  define("VEHICLE_TABLE", "vehicles");
  define("VEHICLE_ID", "vehicle_id");
  define("LATITUDE", "latitude");
  define("LONGITUDE", "longitude");
  define("BEARINGS", "bearings");
  define("PHONE", "phone");

  function failed(){
    die("{\"status\": false}");
  }

   //Table structure:
   //vehicles(id int, vehicle_id varchar(20), phone varchar(10), latitude decimal, longitude decimal, bearings decimal)

   ?>