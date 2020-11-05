<?php

Class Image_history{
    //DB Stuff
    private $conn;
    private $table = 'Image';

    //Image Properties
    public $name;
    public $path;
    public $type;
    public $serviceID;


    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_image_history(){
        //Create query
        $query = 'SELECT * FROM image';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

}

?>