<?php
/**
 * Created by PhpStorm.
 * User: SAIFUL
 * Date: 10/31/2018
 * Time: 12:13 PM
 */

class Contacts{
    /*
     * Database connection and table name
     */
    private $conn;

    /*
     * Constructor with $db as database connection
     */
    public function __construct($db){
        $this->conn = $db;
    }

    /*
     * This function used for each information details
     */
    public function read($table){

        $query = "SELECT * FROM $table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /*
     * This function used for each cng and elec information update
     */
    public function update_cng_elec($table,$name,$area,$phone,$id){

        $query = "UPDATE
                " . $table . "
            SET
                name = :name,
                area = :area,
                phone = :phone
            WHERE
                id = :id";


        $stmt = $this->conn->prepare($query);

        // bind new values
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt= "ok";
    }


    /*
     * This function used for each gas_pharmacy information update
     */
    public function update_gas_pharmacy($table,$name,$shop,$phone,$id){

        $query = "UPDATE
                " . $table . "
            SET
                name = :name,
                shop = :shop,
                phone = :phone
            WHERE
                id = :id";


        $stmt = $this->conn->prepare($query);

        // bind new values
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':shop', $shop);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt= "ok";
    }

    /*
     * This function used for each doctor information update
     */
    public function update_doctor($table,$name,$chamber,$phone,$id){

        $query = "UPDATE
                " . $table . "
            SET
                name = :name,
                chamber = :chamber,
                phone = :phone
            WHERE
                id = :id";


        $stmt = $this->conn->prepare($query);

        // bind new values
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':chamber', $chamber);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt= "ok";
    }


    /*
     * This function used for each doctor information update
     */
    public function update_polly($table,$name,$phone,$id){

        $query = "UPDATE
                " . $table . "
            SET
                name = :name,
                phone = :phone
            WHERE
                id = :id";


        $stmt = $this->conn->prepare($query);

        // bind new values
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt= "ok";
    }

}
?>