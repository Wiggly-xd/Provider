<?php

Class Comment_history{
    //DB Stuff
    private $conn;
    private $table = 'comment';

    //Comment Properties
    public $commentId;
    public $cText;
    public $cDate;
    public $pageID;


    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_comment_history(){
        //Create query
        $query = 'SELECT * FROM comment';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

}

?>