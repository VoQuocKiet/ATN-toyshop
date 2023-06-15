<?php
class connectju{
    public $sever;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        $this->sever = "l6glqt8gsx37y4hs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "sl48zvvaomsn8lwg";
        $this->password = "hlu2p4mz7g7nrjwn";
        $this->dbName = "w78mnyg96eca9lxk";
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