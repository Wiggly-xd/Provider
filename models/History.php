<?php

Class History_history{
    //DB Stuff
    private $conn;
    private $table = 'history';

    //History Properties
    public $historyID;
    public $historyDate;
    public $historyText;
    public $historyImage;
    public $postID;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_history_history(){
        //Create query
        $query = 'SELECT * FROM history';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

}

?>