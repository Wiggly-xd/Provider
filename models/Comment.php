<?php

Class Comment{
    //DB Stuff
    private $conn;
    private $table = 'comment';

    //Post Properties
    public $cText;
    public $cDate;
    public $pageID;
    public $commentID;

    //Constructor with db
    public function __construct($db){
    $this->conn = $db;
    }

    public function read_comment(){
        //Create query
        $query = 'SELECT * FROM comment';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

    
//Create comment
public function create_comment(){
    //Create query
    $query = 'INSERT INTO ' . $this->table . '
    SET
        cText = :cText,
        cDate = :cDate,
        pageID = :pageID,
        commentID = :commentID';

        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->cText =htmlspecialchars(strip_tags($this->cText));
        $this->cDate =htmlspecialchars(strip_tags($this->cDate));

        $this->pageID =htmlspecialchars(strip_tags($this->pageID));


        //Bind data
        $stmt->bindParam(':cText', $this->cText);
        $stmt->bindParam(':cDate', $this->cDate);
        $stmt->bindParam(':pageID', $this->pageID);
        $stmt->bindParam(':commentID', $this->commentID);


        //Executing query
        if($stmt->execute()){
            return true;
        }

        //Print error
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

        //Update comment
        public function update_comment(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                cText = :cText,
                cDate = :cDate,
                pageID = :pageID,
                commentID = :commentID
            WHERE
                commentID = :commentID';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->cText =htmlspecialchars(strip_tags($this->cText));
                $this->cDate =htmlspecialchars(strip_tags($this->cDate));
                $this->pageID =htmlspecialchars(strip_tags($this->pageID));
                $this->commentID =htmlspecialchars(strip_tags($this->commentID));
    
                //Bind data
                $stmt->bindParam(':cText', $this->cText);
                $stmt->bindParam(':cDate', $this->cDate);
                $stmt->bindParam(':pageID', $this->pageID);
                $stmt->bindParam(':commentID', $this->commentID);

                //Executing query
                if($stmt->execute()){
                    return true;
                }
    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }
        //Delete comment
        public function delete_comment(){
            //Creating query
            $query = 'DELETE FROM comment WHERE commentID = :commentID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->commentID =htmlspecialchars(strip_tags($this->commentID));

            //Bind data
            $stmt->bindParam(':commentID', $this->commentID);

            //Executing query
            if($stmt->execute()){
                return true;
            }
            
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

}

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