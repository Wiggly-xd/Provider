<?php

Class Post{
    //DB Stuff
    private $conn;
    private $table = 'post';

    //Post Properties
    public $postID;
    public $pText;
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
        $this->username = $row['username'];
        $this->serviceType = $row['serviceType'];
        $this->pageID = $row['pageID'];
    }
    //Create post
    public function create_post(){
        //Create query
        $query = 'INSERT INTO post (postTitle, pText, postDate, username, pageID, imageURL, serviceID) VALUES(:postTitle, :pText, CURDATE(), :username, :pageID, :imageURL, :serviceID)';
        $query2 = 'INSERT INTO history (postTitle, pText, postDate, pageID) VALUES(:postTitle, :pText, CURDATE(), :pageID)';
            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
            $this->pText =htmlspecialchars(strip_tags($this->pText));
            $this->username =htmlspecialchars(strip_tags($this->username));
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));
            $this->imageURL =htmlspecialchars(strip_tags($this->imageURL));
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));

            //Bind data
            $stmt->bindParam(':postTitle', $this->postTitle);
            $stmt->bindParam(':pText', $this->pText);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':pageID', $this->pageID);
            $stmt->bindParam(':imageURL', $this->imageURL);
            $stmt->bindParam(':serviceID', $this->serviceID);

            //------------------

                        //Preparing statement
                        $stmt2 = $this->conn->prepare($query2);

                        //Clean data
                        $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
                        $this->pText =htmlspecialchars(strip_tags($this->pText));
                        $this->pageID =htmlspecialchars(strip_tags($this->pageID));
            
                        //Bind data
                        $stmt2->bindParam(':postTitle', $this->postTitle);
                        $stmt2->bindParam(':pText', $this->pText);
                        $stmt2->bindParam(':pageID', $this->pageID);
            
                        //Executing query
                        if($stmt->execute() && $stmt2->execute()){
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
                postDate = CURDATE(),
                username = :username,
                pageID = :pageID
            WHERE
                pageID = :pageID';
            
            $query2 = 'INSERT INTO history (postTitle, pText, postDate, pageID) VALUES(:postTitle, :pText, CURDATE(), :pageID)';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
                $this->pText =htmlspecialchars(strip_tags($this->pText));
                $this->username =htmlspecialchars(strip_tags($this->username));
                $this->pageID =htmlspecialchars(strip_tags($this->pageID));
    
                //Bind data
                $stmt->bindParam(':postTitle', $this->postTitle);
                $stmt->bindParam(':pText', $this->pText);
                $stmt->bindParam(':username', $this->username);
                $stmt->bindParam(':pageID', $this->pageID);
    
                    //Preparing statement
                    $stmt2 = $this->conn->prepare($query2);

                    //Clean data
                    $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
                    $this->pText =htmlspecialchars(strip_tags($this->pText));
                    $this->pageID =htmlspecialchars(strip_tags($this->pageID));
                            
                    //Bind data
                    $stmt2->bindParam(':postTitle', $this->postTitle);
                    $stmt2->bindParam(':pText', $this->pText);
                    $stmt2->bindParam(':pageID', $this->pageID);
                        
                    //Executing query
                    if($stmt->execute() && $stmt2->execute()){
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

            $query2 = 'INSERT INTO history (postTitle, pText, postDate, pageID) VALUES(:postTitle, :pText, CURDATE(), :pageID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->pageID =htmlspecialchars(strip_tags($this->pageID));

            //Bind data
            $stmt->bindParam(':pageID', $this->pageID);

                    //Preparing statement
                    $stmt2 = $this->conn->prepare($query2);

                    //Clean data
                    $this->postTitle =htmlspecialchars(strip_tags($this->postTitle));
                    $this->pText =htmlspecialchars(strip_tags($this->pText));
                    $this->pageID =htmlspecialchars(strip_tags($this->pageID));
                            
                    //Bind data
                    $stmt2->bindParam(':postTitle', $this->postTitle);
                    $stmt2->bindParam(':pText', $this->pText);
                    $stmt2->bindParam(':pageID', $this->pageID);
                        
                    //Executing query
                    if($stmt->execute() && $stmt2->execute()){
                        return true;
                    }
                        
                    //Print error
                    printf("Error: %s.\n", $stmt->error);
                    return false;
        }

}
Class Post_activate{
    //DB Stuff
    private $conn;
    private $table = 'post';

    //Post Properties
    public $postID;
    public $pText;
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