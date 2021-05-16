<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json;charset=UTF-8");

//Creating array for json response
$response = array();

//Validation
if(isset($_GET['name']) && isset($_GET['status'])){
    $name = $_GET['name'];
    $status = $_GET['status'];

    //Include database connect class
    $filepath = realpath(dirname(__FILE__));
    require_once($filepath."/db_connect.php");

    //Connecting to database
    $con = new DbConnect();
    $result = mysqli_query($con,"INSERT INTO lights(name,status) VALUES('$name','$status')");

    //Checking
    if($result){
        //Insertion successfull
        $response['success'] = 1;
        $response['message'] = "Data uploaded successfully.";

        //Show json response
        echo json_encode($response);

    }else{
        //Failed to insert data
        $response['success'] = 0;
        $response['message'] = "Unable to uploade the data!";

        //Show json response
        echo json_encode($response);

    }
}



?>