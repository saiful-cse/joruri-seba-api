<?php
/**
 * Created by PhpStorm.
 * User: Saiful
 * Date: 9/19/2018
 * Time: 3:29 PM
 */

class Database{
    //Specify own database credentials
    private $hostname = "localhost";
    private $db_name = "creative_android";
    private $username = "creative_saif";
    private $password = "saif67>23<44";
    public $conn;
    
    

    //Get the database connection
    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch (PDOException $exception){
            echo "Connection error".$exception->getMessage();
        }
        return $this->conn;
    }
}
?>