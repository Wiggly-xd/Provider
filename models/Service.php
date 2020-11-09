<?php

Class Service{
    //DB Stuff
    private $conn;
    private $table = 'service';

    //Service Properties
    public $serviceID;
    public $serviceTitle;
    public $serviceType;
    public $publish;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    //Get Single Service
    public function read_single_service(){
        $query = 'SELECT * FROM service';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding serviceID
        $stmt->bindParam(1, $this->serviceID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->serviceID = $row['serviceID'];
        $this->serviceTitle = $row['serviceTitle'];
    }

    //Create service
    public function create_service(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            serviceID = :serviceID,
            servideDate = CURDATE(),
            serviceTitle = :serviceTitle';
        
        $query2 = 'INSERT INTO historyservice (serviceID, serviceTitle, serviceDate) VALUES(:serviceID, :serviceTitle, CURDATE())';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
            $this->serviceTitle =htmlspecialchars(strip_tags($this->serviceTitle));

            //Bind data
            $stmt->bindParam(':serviceID', $this->serviceID);
            $stmt->bindParam(':serviceTitle', $this->serviceTitle);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
            $this->serviceTitle =htmlspecialchars(strip_tags($this->serviceTitle));
                    
            //Bind data
            $stmt2->bindParam(':serviceID', $this->serviceID);
            $stmt2->bindParam(':serviceTitle', $this->serviceTitle);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
                return true;
            }
                
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update service
        public function update_service(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                serviceID = :serviceID,
                serviceDate = CURDATE(),
                serviceTitle = :serviceTitle,
            WHERE
                serviceID = :serviceID';

            $query2 = 'INSERT INTO historyservice (serviceID, serviceTitle, serviceDate) VALUES(:serviceID, :serviceTitle, CURDATE())';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
                $this->serviceTitle =htmlspecialchars(strip_tags($this->serviceTitle));
    
                //Bind data
                $stmt->bindParam(':serviceID', $this->serviceID);
                $stmt->bindParam(':serviceTitle', $this->serviceTitle);
    
                $stmt2 = $this->conn->prepare($query2);

                //Clean data
                $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
                $this->serviceTitle =htmlspecialchars(strip_tags($this->serviceTitle));
                        
                //Bind data
                $stmt2->bindParam(':serviceID', $this->serviceID);
                $stmt2->bindParam(':serviceTitle', $this->serviceTitle);
                    
                //Executing query
                if($stmt->execute() && $stmt2->execute()){
                    return true;
                }
                    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete service
        public function delete_service(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE serviceID = :serviceID';

            $query2 = 'INSERT INTO historyservice (serviceID, serviceTitle, serviceDate) VALUES(:serviceID, :serviceTitle, CURDATE())';
            
            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));

            //Bind data
            $stmt->bindParam(':serviceID', $this->serviceID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
            $this->serviceTitle =htmlspecialchars(strip_tags($this->serviceTitle));
                    
            //Bind data
            $stmt2->bindParam(':serviceID', $this->serviceID);
            $stmt2->bindParam(':serviceTitle', $this->serviceTitle);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
                return true;
            }
                
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

    public function read_service(){
        //Create query
        $query = 'SELECT * FROM post, service WHERE post.serviceID = service.serviceID AND service.publish = 1';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }
    
    //Get Single service
    public function search_service(){
        $query = 'SELECT * FROM service, post, spage WHERE service.serviceID=? AND post.serviceID = spage.serviceID AND service.publish = 1';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding pageID
        $stmt->bindParam(1, $this->serviceID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->serviceTitle = $row['serviceTitle'];
        $this->serviceID = $row['serviceID'];
        $this->serviceType = $row['serviceType'];
        $this->publish = $row['publish'];
    }

    //Verify service
    public function service_verify(){
            
        $query = 'SELECT userID, serviceType FROM '. $this->table. ' WHERE userID = ? ';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
    
        //Binding userID
        $stmt->bindParam(1, $this->userID);
    
        //Executing query
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        //Setting properties
        $this->serviceType = $row['serviceType'];
        $this->userID = $row['userID'];
    }

    //Update publish BOOL to TRUE
    public function activate_service(){
        if(isset($_POST['service_activate_btn'])){
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
    public function deactivate_service(){
        if(isset($_POST['service_deactivate_btn'])){
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

//Service history
Class Service_history{
    //DB Stuff
    private $conn;
    private $table = 'service';

    //Service Properties
    public $serviceID;
    public $serviceDate;
    public $serviceTitle;


    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_service_history(){
        //Create query
        $query = 'SELECT * FROM service';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

}

?>