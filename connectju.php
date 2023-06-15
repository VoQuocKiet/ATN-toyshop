<?php
class connectju{
    public $sever;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        // $this->sever = "co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        // $this->user = "lmg9h0ubww8kzymm";
        // $this->password = "bt7rd4bvwok2n6oi";
        // $this->dbName = "jv9og4or2m0txhel";
        // $this->sever = "";
        // $this->user = "root";
        // $this->password = "";
        // $this->dbName = "antshop";
    }

    //Option1 : mysqli
    function connectToMySQL():mysqli{
        $conn_my = new mysqli($this->sever, $this->user, $this->password, $this->dbName);
        if($conn_my->connect_error){
            die("Failed" .$conn_my->connect_error);
        }else{
    }
    return $conn_my;
    }

    //Option 2
    function connectToPDO():PDO{
        try{
            $conn_pdo = new PDO
            ("mysql:host=$this->sever;dbname=$this->dbName",$this->user, $this->password);
            $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Failed $e");
        }
        return $conn_pdo;

    }
}
$c = new connectju();