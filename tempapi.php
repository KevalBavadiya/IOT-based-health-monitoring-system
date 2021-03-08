<?php
header('Content-Type: application/json');
include('db_config.php');

$response = array();



if(isset($_GET["TEMP_VALUE"])&& isset($_GET["DEVICE_ID"]))
{
	  

	  $TEMP_VALUE = $_GET["TEMP_VALUE"];
	  $DEVICE_ID = $_GET["DEVICE_ID"];

	  $query = "INSERT INTO `tem_table`(DEVICE_ID,TEMP_VALUE,ADDED_TIME) VALUES('DEVICE_ID','$TEMP_VALUE',CURRENT_TIMESTAMP())";
	  $result = mysqli_query($conn,$query);
	  
	
	
	  
	  if($result)
	  {
	
		  
			  $response["error"] = FALSE;
			  $response["message"] = "Successfully added.";
			  echo json_encode($response);
			  exit;
	  }
	  else
	  {
		  
	  	  $response["error"] = TRUE;
		  $response["message"] = "Sorry not able to insert";
		  $response["errr"] = mysqli_error($conn);
		  echo json_encode($response);
			  
		  
	  }
}
  else
  {
	  //Invalid parameters
	  $response["error"] = TRUE;
	  $response["message"] = "Invalid Parameters";
	 
	  echo json_encode($response);
	  exit;
  }
?>