<?php


class Cart{

    public $db = null;

    public function __construct(DBController $db)
    {
        // if the connection is not set
        if(!isset($db->con)) return null;
        // otherwise lets initailize our db property
        $this->db = $db;
    }

    // Insert into cart table
    public function insertIntoCart($params = null,$table = "cart"){
        if($this->db->con != null){
            if($params != null){
                // get table columns
                $columns = implode(",",array_keys($params));
                
                $values = implode(",", array_values($params));
                
                // Lets create SQL query string
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table,$columns,$values);
                // execute query
                $result = $this->db->con->query($query_string);

                return $result;
            }            
        }        
    }

    // to get user_id and item_id and insert into table
    public function addToCart($userid,$itemid,$location){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );
            // Lets insert this this into the cart table
            $result = $this->insertIntoCart($params);
            // if the insertion worked then lets refresh the page
            if($result){
                header("Location: ".$location ?? $_SERVER['PHP_SELF']);
            }
        }
    }

    // Delete cart item using item_id
    public function deleteFromCart($itemid = null,$table = 'cart'){
        if($itemid != null){

            $query_string = sprintf('DELETE FROM %s WHERE item_id = %s ',$table,$itemid);

            $result = $this->db->con->query($query_string);

            if($result){
                // if the delete was succesfu then lets refresh the page
                header("Location: ".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // Calculate sub total
    public function total($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                // we need the float value
                $sum += floatval($item[0]);
            }
            // we want 2 digit float
            return sprintf('%.2f',$sum);
        }
    }


    // get all the item_id-s from shopping cart
        
    public function getItemIdsFromCart($cartArray = null,$key = 'item_id'){

        if($cartArray !=null){
            $item_ids = array_map(function($value) use($key){
                // we will recieve an error message of 'Undefiened variable' for the $key var
                // that is beacause in the array_map we cant use variable from outside of the callback function
                // to solve this problem we will make advantage of use() 
                return $value[$key];
            },$cartArray);
            return $item_ids;
        }
        
    }

    // Save for later
    public function saveForLater($item_id = null,$saveTable ='wishlist',$fromTable ='cart'){
        if($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id = {$item_id};";
            $query .=" DELETE FROM {$fromTable} WHERE item_id = {$item_id};";
            // In PHP we are not limited to execute only 1 query : 
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location: ".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

}

?>