<?php

class DBController{
    // Database Connection Properties
    protected $host = 'localhost';        
    protected $user = 'root';
    protected $password = '';
    protected $database = 'ecommerce';
    protected $port = 3307;
    // Connection Property
    public $con = null;

    // Call constructor
    public function __construct(){
        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database,$this->port);
        if($this->con->connect_error){
            echo `Fail: {$this->con->connect_error}`;
        }
        // echo "Connection Succesful";
    }

    // destructor is automatically called when the object is not in use
    public function __destruct()
    {
        $this->closeConnection();
    }

    // For mysqli Closing Connection
    protected function closeConnection(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }

}



?>

