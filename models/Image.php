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
    //Get Single Image
    public function read_single_image(){
        $query = 'SELECT * FROM image';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding serviceID
        $stmt->bindParam(1, $this->serviceID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->name = $row['name'];
        $this->path = $row['path'];
        $this->type = $row['type'];
        $this->serviceID = $row['serviceID'];
    }

    //Create image
    public function create_image(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            name = :name,
            path = :path,
            type = :type,
            serviceID = :serviceID';

        $query2 = 'INSERT INTO history (postTitle, imageURL, serviceID) VALUES(:name, :path, :serviceID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->name =htmlspecialchars(strip_tags($this->name));
            $this->path =htmlspecialchars(strip_tags($this->path));
            $this->type =htmlspecialchars(strip_tags($this->type));
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));

            //Bind data
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':path', $this->path);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':serviceID', $this->serviceID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->name =htmlspecialchars(strip_tags($this->name));
            $this->path =htmlspecialchars(strip_tags($this->path));
            $this->type =htmlspecialchars(strip_tags($this->type));
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
                    
            //Bind data
            $stmt2->bindParam(':name', $this->name);
            $stmt2->bindParam(':path', $this->path);
            $stmt2->bindParam(':type', $this->type);
            $stmt2->bindParam(':serviceID', $this->serviceID);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
                return true;
            }
                
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update image
        public function update_image(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                name = :name,
                path = :path,
                type = :type,
                serviceID = :serviceID
            WHERE
                serviceID = :serviceID';

            $query2 = 'INSERT INTO history (postTitle, imageURL, serviceID) VALUES(:name, :path, :serviceID)';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->name =htmlspecialchars(strip_tags($this->name));
                $this->path =htmlspecialchars(strip_tags($this->path));
                $this->type =htmlspecialchars(strip_tags($this->type));
                $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
    
                //Bind data
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':path', $this->path);
                $stmt->bindParam(':type', $this->type);
                $stmt->bindParam(':serviceID', $this->serviceID);
    
                $stmt2 = $this->conn->prepare($query2);

                //Clean data
                $this->name =htmlspecialchars(strip_tags($this->name));
                $this->path =htmlspecialchars(strip_tags($this->path));
                $this->type =htmlspecialchars(strip_tags($this->type));
                $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
                        
                //Bind data
                $stmt2->bindParam(':name', $this->name);
                $stmt2->bindParam(':path', $this->path);
                $stmt2->bindParam(':type', $this->type);
                $stmt2->bindParam(':serviceID', $this->serviceID);
                    
                //Executing query
                if($stmt->execute() && $stmt2->execute()){
                    return true;
                }
                    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete image
        public function delete_image(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE serviceID = :serviceID';

            $query2 = 'INSERT INTO history (postTitle, imageURL, serviceID) VALUES(:name, :path, :serviceID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));

            //Bind data
            $stmt->bindParam(':serviceID', $this->serviceID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->name =htmlspecialchars(strip_tags($this->name));
            $this->path =htmlspecialchars(strip_tags($this->path));
            $this->type =htmlspecialchars(strip_tags($this->type));
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
                    
            //Bind data
            $stmt2->bindParam(':name', $this->name);
            $stmt2->bindParam(':path', $this->path);
            $stmt2->bindParam(':type', $this->type);
            $stmt2->bindParam(':serviceID', $this->serviceID);
                
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