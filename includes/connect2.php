<?php
class Dbconnect {
    private $host ='localhost';
    private $dbName ='prince';
    private $user ='root';
    private $pass ='';

    public function connect(){

        try{
            $conn= new PDO('mysql:host=' . $this->host . '; dbname='. $this->dbName, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            // echo'connected';
        }
        catch(PDOException $e){
            echo 'Database Error:' . $e->getMessage();
        }
    }
}
$obj= new Dbconnect;
$obj -> connect();
?>