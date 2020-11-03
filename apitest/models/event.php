<?php

Class event{
    //DB Stuff
    private $conn;
    private $table = 'event';

    //Event Properties
    public $startDate;
    public $eventTitle;
    public $description;
    public $endDate;
    public $userID;
    public $inviteID;
    

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_event(){
        //Create query
        $query = 'SELECT * FROM event WHERE userID = userID';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }
    
    //Get Single Event
    public function read_single_event(){
        $query = 'SELECT * FROM event WHERE eventID = ?';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding pageID
        $stmt->bindParam(1, $this->eventID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->eventID = $row['eventID'];
        $this->startDate = $row['startDate'];
        $this->eventTitle = $row['eventTitle'];
        $this->description = $row['description'];
        $this->endDate = $row['endDate'];
        $this->userID = $row['userID'];
        $this->inviteID = $row['inviteID'];
    }

    //Create Event
    public function create_event(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            startDate = :startDate,
            eventTitle = :eventTitle,
            description = :description,
            endDate = :endDate,
            userID = :userID,
            inviteID = :inviteID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->startDate =htmlspecialchars(strip_tags($this->startDate));
            $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
            $this->description =htmlspecialchars(strip_tags($this->description));
            $this->endDate =htmlspecialchars(strip_tags($this->endDate));
            $this->userID =htmlspecialchars(strip_tags($this->userID));
            $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
            

            //Bind data
            $stmt->bindParam(':startDate', $this->startDate);
            $stmt->bindParam(':eventTitle', $this->eventTitle);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':endDate', $this->endDate);
            $stmt->bindParam(':userID', $this->userID);
            $stmt->bindParam(':inviteID', $this->inviteID);
           

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update Event
        public function update_event(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                startDate = :startDate,
                eventTitle = :eventTitle,
                description = :description,
                endDate = :endDate,
                userID = :userID,
                inviteID = :inviteID
            WHERE
                eventID = ?';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->startDate =htmlspecialchars(strip_tags($this->startDate));
                $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
                $this->description =htmlspecialchars(strip_tags($this->description));
                $this->endDate =htmlspecialchars(strip_tags($this->endDate));
                $this->userID =htmlspecialchars(strip_tags($this->userID));
                $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
    
                //Bind data
                $stmt->bindParam(':startDate', $this->startDate);
                $stmt->bindParam(':eventTitle', $this->eventTitle);
                $stmt->bindParam(':description', $this->description);
                $stmt->bindParam(':endDate', $this->endDate);
                $stmt->bindParam(':userID', $this->userID);
                $stmt->bindParam(':inviteID', $this->inviteID);
    
                //Executing query
                if($stmt->execute()){
                    return true;
                }
    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete Event
        public function delete_event(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE eventID = :eventID';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->eventID =htmlspecialchars(strip_tags($this->eventID));

            //Bind data
            $stmt->bindParam(':eventID', $this->eventID);

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