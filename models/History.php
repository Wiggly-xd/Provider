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
        $query = 'SELECT * FROM history, historyservice';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }
        
    //Get Single History
    public function read_single_history(){
        $query = 'SELECT * FROM history, historyservice';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding historyID
        $stmt->bindParam(1, $this->historyID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->historyID = $row['historyID'];
        $this->historyTitle = $row['historyTitle'];
        $this->historyText = $row['historyText'];
        $this->historyImage = $row['historyImage'];
        $this->postID = $row['postID'];
    }

    //Create history
    public function create(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            historyID = :historyID,
            historyDate = CURDATE(),
            historyText = :historyText,
            historyImage = :historyImage,
            postID = :postID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->historyID =htmlspecialchars(strip_tags($this->historyID));
            $this->historyText =htmlspecialchars(strip_tags($this->historyText));
            $this->historyImage =htmlspecialchars(strip_tags($this->historyImage));
            $this->postID =htmlspecialchars(strip_tags($this->postID));

            //Bind data
            $stmt->bindParam(':historyID', $this->historyID);
            $stmt->bindParam(':historyText', $this->historyText);
            $stmt->bindParam(':historyImage', $this->historyImage);
            $stmt->bindParam(':postID', $this->postID);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update history
        public function update(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                historyID = :historyID,
                historyDate = CURDATE(),
                historyText = :historyText,
                historyImage = :historyImage,
                postID = :postID
            WHERE
                postID = :postID';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->historyID =htmlspecialchars(strip_tags($this->historyID));
                $this->historyText =htmlspecialchars(strip_tags($this->historyText));
                $this->historyImage =htmlspecialchars(strip_tags($this->historyImage));
                $this->postID =htmlspecialchars(strip_tags($this->postID));
    
                //Bind data
                $stmt->bindParam(':historyID', $this->historyID);
                $stmt->bindParam(':historyText', $this->historyText);
                $stmt->bindParam(':historyImage', $this->historyImage);
                $stmt->bindParam(':postID', $this->postID);
    
                //Executing query
                if($stmt->execute()){
                    return true;
                }
    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete history
        public function delete(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE historyID = :historyID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->historyID =htmlspecialchars(strip_tags($this->historyID));

            //Bind data
            $stmt->bindParam(':historyID', $this->historyID);

            //Executing query
            if($stmt->execute()){
                return true;
            }
            
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

}

?>