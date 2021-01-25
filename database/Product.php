<?php

// Use to fetch Product data
class Product{

    public $db = null;

    // Dependency Injenction
    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db=$db;
    }

    // Get data from any table
    // Fetch product data using getData method 
    public function getData($table ='product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();
        // Fetch product data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    } 

    // Get product using item id
    public function getProductById($itemid = null, $table = 'product'){
        if(isset($itemid)){
            // Lets create SQL query string
        $query_string = sprintf("SELECT * FROM %s WHERE item_id =  %s", $table, $itemid);
        // execute query
        $result = $this->db->con->query($query_string);

        $resultArray = array();
        // Fetch product data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;

        }        
    }

}

?>