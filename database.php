<?php
class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

public function __construct( 
    $dbname ="Newdb",
    $tablename ="Productdb", 
    $servername ="localhost",
    $username = "root",
    $password = "12345678"
    )
{

    $this->$dbname =$dbname;
    $this->$tablename=$tablename;
    $this->$servername=$servername;
    $this->$username=$username;
    $this->$password=$password;
    //connection

    $this->con = mysqli_connect($servername,$username,$password);
    if(!$this->con){
        die("Connection failed:".mysqli_connect_error());

    }
    //query
    $sql="CREATE DATABASE IF NOT EXISTS $dbname";
    //execution

    if(mysqli_query($this->con,$sql)){
$this->con = mysqli_connect($servername,$username,$password,$dbname);

$sql="CREATE TABLE IF NOT EXISTS $tablename(id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
         product_name VARCHAR(25)NOT NULL,product_price FLOAT,product_image VARCHAR(100)
         );";       
    
    if(!mysqli_query($this->con,$sql)){
echo "Error creating table:".mysqli_error($this->con);

         }

    }
}

}