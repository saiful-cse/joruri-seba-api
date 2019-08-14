<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 11/20/2018
 * Time: 9:20 PM
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Contacts.php';

/*
 * // instantiate database object
 */
$database = new Database();
$db = $database->getConnection();

$contacts = new Contacts($db);

if($_GET['table'] == "pharmacy" || "gas"){
    $stmt = $contacts->update_gas_pharmacy($_GET['table'],$_GET['name'],$_GET['shop'],$_GET['phone'],$_GET['id']);
    echo $stmt;
}

?>


