<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 10/31/2018
 * Time: 12:10 PM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/Contacts.php';


/*
 * // instantiate database and profile_common object
 */
$database = new Database();
$db = $database->getConnection();


//getting table name from url
$table = $_GET['table'];

/*
 * Initialize object
 */
$contacts = new Contacts($db);

$stmt = $contacts->read($table);
$num = $stmt->rowCount();

/*
 * Check if more than 0 record found
 */
if ($num>0){
    /*
     * Retrieve database table contents
     */
    while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){

        $data['Data'] = $row;
    }
    echo json_encode($data);

}else{
    echo json_encode(
        array("Message" => "No data found. '$table'")
    );
}

?>


