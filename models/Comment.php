<?php
Class Comment_allowed{
    //DB variables
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
    //Update allowComments BOOL to TRUE
    public function activate_comment(){
        if(isset($_POST['comment_activate_btn'])){
        $query = 'UPDATE ' . $this->table . 'SET allowComments = ?';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->publish = htmlspecialchars(strip_tags($this->publish));

            //Bind data
            $stmt->bindParam(1, $this->publish);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
    //Update allowComments BOOL to FALSE
    public function deactivate_comment(){
        if(isset($_POST['comment_deactivate_btn'])){
        $query = 'UPDATE ' . $this->table . 'SET allowComments = ?';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->publish =htmlspecialchars(strip_tags($this->publish));

            //Bind data
            $stmt->bindParam(0, $this->publish);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
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
    //Create comment
    public function create_comment(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            cText = :cText,
            cDate = CURDATE(),
            pageID = :pageID,
            commentID = :commentID';

            $query2 = 'INSERT INTO history (pText, postDate, pageID) VALUES(:cText, CURDATE(), :pageID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->cText =htmlspecialchars(strip_tags($this->cText));
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));
            $this->commentID =htmlspecialchars(strip_tags($this->commentID));

            //Bind data
            $stmt->bindParam(':cText', $this->cText);
            $stmt->bindParam(':pageID', $this->pageID);
            $stmt->bindParam(':commentID', $this->commentID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->cText =htmlspecialchars(strip_tags($this->cText));
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));
            $this->commentID =htmlspecialchars(strip_tags($this->commentID));
                    
            //Bind data
            $stmt2->bindParam(':cText', $this->cText);
            $stmt2->bindParam(':pageID', $this->pageID);
            $stmt2->bindParam(':commentID', $this->commentID);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
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
                cDate = CURDATE(),
                pageID = :pageID,
                commentID = :commentID
            WHERE
                pageID = :pageID';

                $query2 = 'INSERT INTO history (pText, postDate, pageID) VALUES(:cText, CURDATE(), :pageID)';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->cText =htmlspecialchars(strip_tags($this->cText));
                $this->pageID =htmlspecialchars(strip_tags($this->pageID));
                $this->commentID =htmlspecialchars(strip_tags($this->commentID));
    
                //Bind data
                $stmt->bindParam(':cText', $this->cText);
                $stmt->bindParam(':pageID', $this->pageID);
                $stmt->bindParam(':commentID', $this->commentID);
    
                $stmt2 = $this->conn->prepare($query2);

                //Clean data
                $this->cText =htmlspecialchars(strip_tags($this->cText));
                $this->pageID =htmlspecialchars(strip_tags($this->pageID));
                $this->commentID =htmlspecialchars(strip_tags($this->commentID));
                        
                //Bind data
                $stmt2->bindParam(':cText', $this->cText);
                $stmt2->bindParam(':pageID', $this->pageID);
                $stmt2->bindParam(':commentID', $this->commentID);
                    
                //Executing query
                if($stmt->execute() && $stmt2->execute()){
                    return true;
                }
                    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete comment
        public function delete_comment(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE pageID = :pageID';

            $query2 = 'INSERT INTO history (pText, postDate, pageID) VALUES(:cText, CURDATE(), :pageID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));

            //Bind data
            $stmt->bindParam(':pageID', $this->pageID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->cText =htmlspecialchars(strip_tags($this->cText));
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));
            $this->commentID =htmlspecialchars(strip_tags($this->commentID));
                    
            //Bind data
            $stmt2->bindParam(':cText', $this->cText);
            $stmt2->bindParam(':pageID', $this->pageID);
            $stmt2->bindParam(':commentID', $this->commentID);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
                return true;
            }
                
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    

}

?>