<?php

Class Post{
    //DB Stuff
    private $conn;
    private $table = 'post';

    //Post Properties
    public $postID;
    public $pText;
    public $lastUpdate;
    public $postDate;
    public $imageURL;
    public $postTitle;
    public $pageID;
    public $serviceID;
    public $username;
    public $serviceType;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        //Create query
        $query = 'SELECT * FROM post, spage WHERE post.pageID = spage.pageID';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }
    
    //Get Single Post
    public function read_single(){
        $query = 'SELECT * FROM post, spage WHERE post.pageID = ? AND post.pageID = spage.pageID';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding pageID
        $stmt->bindParam(1, $this->pageID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->postTitle = $row['postTitle'];
        $this->pText = $row['pText'];
        $this->postDate = $row['postDate'];
        $this->username = $row['username'];
        $this->serviceType = $row['serviceType'];
        $this->pageID = $row['pageID'];
    }

    //Create post
    public function create(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            postTitle = :postTitle,
            pText = :pText,
            postDate = :postDate,
            username = :username,
            pageID = :pageID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
            $this->pText =htmlspecialchars(strip_tags($this->pText));
            $this->postDate =htmlspecialchars(strip_tags($this->postDate));
            $this->username =htmlspecialchars(strip_tags($this->username));
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));

            //Bind data
            $stmt->bindParam(':postTitle', $this->postTitle);
            $stmt->bindParam(':pText', $this->pText);
            $stmt->bindParam(':postDate', $this->postDate);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':pageID', $this->pageID);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update post
        public function update(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                postTitle = :postTitle,
                pText = :pText,
                postDate = :postDate,
                username = :username,
                pageID = :pageID
            WHERE
                pageID = :pageID';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
                $this->pText =htmlspecialchars(strip_tags($this->pText));
                $this->postDate =htmlspecialchars(strip_tags($this->postDate));
                $this->username =htmlspecialchars(strip_tags($this->username));
                $this->pageID =htmlspecialchars(strip_tags($this->pageID));
    
                //Bind data
                $stmt->bindParam(':postTitle', $this->postTitle);
                $stmt->bindParam(':pText', $this->pText);
                $stmt->bindParam(':postDate', $this->postDate);
                $stmt->bindParam(':username', $this->username);
                $stmt->bindParam(':pageID', $this->pageID);
    
                //Executing query
                if($stmt->execute()){
                    return true;
                }
    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete post
        public function delete(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE pageID = :pageID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));

            //Bind data
            $stmt->bindParam(':pageID', $this->pageID);

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