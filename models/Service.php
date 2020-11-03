<?php

Class Service{
    //DB Stuff
    private $conn;
    private $table = 'service';

    //Service Properties
    public $serviceID;
    public $serviceDate;
    public $serviceTitle;
    public $serviceType;
    public $userID;
    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function create_service(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
        serviceID = :serviceID,
        serviceDate = :serviceDate,
        serviceTitle = :serviceTitle,
        serviceType = :serviceType';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->serviceID =htmlspecialchars(strip_tags($this->serviceID));
            $this->serviceDate =htmlspecialchars(strip_tags($this->serviceDate));
            $this->serviceTitle =htmlspecialchars(strip_tags($this->serviceTitle));
            $this->serviceType =htmlspecialchars(strip_tags($this->serviceType));

            //Bind data
            $stmt->bindParam(':serviceID', $this->serviceID);
            $stmt->bindParam(':serviceDate', $this->serviceDate);
            $stmt->bindParam(':serviceTitle', $this->serviceTitle);
            $stmt->bindParam(':serviceType', $this->serviceType);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        public function service_verify(){
            
            $query = 'SELECT userID, serviceType FROM '. $this->table. ' WHERE userID = ? ';
            //Preparing statement
            $stmt = $this->conn->prepare($query);
        
            //Binding pageID
            $stmt->bindParam(1, $this->userID);
        
            //Executing query
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            //Setting properties
            $this->serviceType = $row['serviceType'];
            $this->userID = $row['userID'];
        }

}

?>