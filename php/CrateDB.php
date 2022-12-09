<?php

class CreateDB{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    // Constructor
    public function __construct(
        $dbname='cbdwakame',
        $tablename='productos',
        $servername='localhost',
        $username='root',
        $password=''
    ){
        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;

        // Create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if(!$this->con){
            die('Connection failed: '.mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // Execute query
        if(mysqli_query($this->con, $sql)){
            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // SQL to create a new table
            $sql = "CREATE TABLE IF NOT EXISTS $tablename
                    (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(50) NOT NULL,
                    description VARCHAR(250) NOT NULL,
                    info VARCHAR(750) NOT NULL,
                    price FLOAT NOT NULL,
                    img VARCHAR(200) NOT NULL);";
            
            if(!mysqli_query($this->con,$sql)){
                echo "Error creating table: ".mysqli_error($this->con);
            } else {
                return false;
            }
        }
    }

    // Get product from database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        } 
    }
}

?>