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
    public $username;
    public $serviceTitle;
    public $serviceDate;
    public $serviceID;
    public $serviceType;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    //Create post
    public function create_post(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            postTitle = :postTitle,
            pText = :pText,
            postDate = :postDate,
            lastUpdate = :lastUpdate,
            username = :username,
            pageID = :pageID,
            imageURL = :imageURL,
            serviceID = :serviceID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
            $this->pText =htmlspecialchars(strip_tags($this->pText));
            $this->postDate =htmlspecialchars(strip_tags($this->postDate));
            $this->lastUpdate =htmlspecialchars(strip_tags($this->lastUpdate));
            $this->username =htmlspecialchars(strip_tags($this->username));
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));
            $this->imageURL =htmlspecialchars(strip_tags($this->imageURL));
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));

            //Bind data
            $stmt->bindParam(':postTitle', $this->postTitle);
            $stmt->bindParam(':pText', $this->pText);
            $stmt->bindParam(':postDate', $this->postDate);
            $stmt->bindParam(':lastUpdate', $this->lastUpdate);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':pageID', $this->pageID);
            $stmt->bindParam(':imageURL', $this->imageURL);
            $stmt->bindParam(':serviceID', $this->serviceID);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update post
        public function update_post(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                postTitle = :postTitle,
                pText = :pText,
                lastUpdate = :lastUpdate,
                postDate = :postDate,
                username = :username
            WHERE
                pageID = :pageID';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
                $this->pText =htmlspecialchars(strip_tags($this->pText));
                $this->postDate =htmlspecialchars(strip_tags($this->postDate));
                $this->lastUpdate =htmlspecialchars(strip_tags($this->lastUpdate));
                $this->username =htmlspecialchars(strip_tags($this->username));
                $this->pageID =htmlspecialchars(strip_tags($this->pageID));
    
                //Bind data
                $stmt->bindParam(':postTitle', $this->postTitle);
                $stmt->bindParam(':pText', $this->pText);
                $stmt->bindParam(':postDate', $this->postDate);
                $stmt->bindParam(':lastUpdate', $this->lastUpdate);
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
        public function delete_post(){
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

        //Update publish BOOL to TRUE
        public function activate_post(){
            if(isset($_POST['post_activate_btn'])){
            $query = 'UPDATE ' . $this->table . 'SET publish = ?';

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
        
        //Update publish BOOL to FALSE
        public function deactivate_post(){
            if(isset($_POST['post_deactivate_btn'])){
            $query = 'UPDATE ' . $this->table . 'SET publish = ?';

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
Class Post_activate{
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
    public $username;
    public $serviceTitle;
    public $serviceDate;
    public $serviceID;
    public $serviceType;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }


}

//Post history class
Class Post_history{
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

    public function read_post_history(){
        //Create query
        $query = 'SELECT * FROM post, spage WHERE post.pageID = spage.pageID';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

}

?>