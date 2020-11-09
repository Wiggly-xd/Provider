<?php

Class Event{
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
            eventID = :eventID,
            startDate = :startDate,
            endDate = :endDate,
            eventTitle = :eventTitle,
            description = :description,
            userID = :userID,
            inviteID = :inviteID';

            $query2 = 'INSERT INTO history (postTitle, pText, postDate, pageID) VALUES(:eventTitle, :description, :startDate, :eventID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->eventID =htmlspecialchars(strip_tags($this->eventID));
            $this->startDate =htmlspecialchars(strip_tags($this->startDate));
            $this->endDate =htmlspecialchars(strip_tags($this->endDate));
            $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
            $this->description =htmlspecialchars(strip_tags($this->description));
            $this->userID =htmlspecialchars(strip_tags($this->userID));
            $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
            

            //Bind data
            $stmt->bindParam(':eventID', $this->eventID);
            $stmt->bindParam(':startDate', $this->startDate);
            $stmt->bindParam(':endDate', $this->endDate);
            $stmt->bindParam(':eventTitle', $this->eventTitle);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':userID', $this->userID);
            $stmt->bindParam(':inviteID', $this->inviteID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
            $this->startDate =htmlspecialchars(strip_tags($this->startDate));
            $this->endDate =htmlspecialchars(strip_tags($this->endDate));
            $this->eventID =htmlspecialchars(strip_tags($this->eventID));
            $this->description =htmlspecialchars(strip_tags($this->description));
            $this->userID =htmlspecialchars(strip_tags($this->userID));
            $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
                    
            //Bind data
            $stmt2->bindParam(':eventTitle', $this->eventTitle);
            $stmt2->bindParam(':cText', $this->cText);
            $stmt2->bindParam(':startDate', $this->startDate);
            $stmt2->bindParam(':endDate', $this->endDate);
            $stmt2->bindParam(':eventID', $this->eventID);
            $stmt2->bindParam(':description', $this->description);
            $stmt2->bindParam(':userID', $this->userID);
            $stmt2->bindParam(':inviteID', $this->inviteID);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
                return true;
            }
                
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update event
        public function update_event(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                eventID = :eventID,
                startDate = :startDate,
                endDate = :endDate,
                eventTitle = :eventTitle,
                description = :description,
                userID = :userID,
                inviteID = :inviteID
            WHERE
                eventID = :eventID';

                $query2 = 'INSERT INTO history (postTitle, pText, postDate, pageID) VALUES(:eventTitle, :description, :startDate, :eventID)';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->eventID =htmlspecialchars(strip_tags($this->eventID));
                $this->startDate =htmlspecialchars(strip_tags($this->startDate));
                $this->endDate =htmlspecialchars(strip_tags($this->endDate));
                $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
                $this->description =htmlspecialchars(strip_tags($this->description));
                $this->userID =htmlspecialchars(strip_tags($this->userID));
                $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
    
                //Bind data
                $stmt->bindParam(':eventID', $this->eventID);
                $stmt->bindParam(':startDate', $this->startDate);
                $stmt->bindParam(':endDate', $this->endDate);
                $stmt->bindParam(':eventTitle', $this->eventTitle);
                $stmt->bindParam(':description', $this->description);
                $stmt->bindParam(':userID', $this->userID);
                $stmt->bindParam(':inviteID', $this->inviteID);
    
                $stmt2 = $this->conn->prepare($query2);

                //Clean data
                $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
                $this->startDate =htmlspecialchars(strip_tags($this->startDate));
                $this->endDate =htmlspecialchars(strip_tags($this->endDate));
                $this->eventID =htmlspecialchars(strip_tags($this->eventID));
                $this->description =htmlspecialchars(strip_tags($this->description));
                $this->userID =htmlspecialchars(strip_tags($this->userID));
                $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
                        
                //Bind data
                $stmt2->bindParam(':eventTitle', $this->eventTitle);
                $stmt2->bindParam(':cText', $this->cText);
                $stmt2->bindParam(':startDate', $this->startDate);
                $stmt2->bindParam(':endDate', $this->endDate);
                $stmt2->bindParam(':eventID', $this->eventID);
                $stmt2->bindParam(':description', $this->description);
                $stmt2->bindParam(':userID', $this->userID);
                $stmt2->bindParam(':inviteID', $this->inviteID);
                    
                //Executing query
                if($stmt->execute() && $stmt2->execute()){
                    return true;
                }
                    
                //Print error
                printf("Error: %s.\n", $stmt->error);
                return false;
        }

        //Delete event
        public function delete_event(){
            //Creating query
            $query = 'DELETE FROM '. $this->table .'
            WHERE eventID = :eventID';

            $query2 = 'INSERT INTO history (postTitle, pText, postDate, pageID) VALUES(:eventTitle, :description, :startDate, :eventID)';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->eventID =htmlspecialchars(strip_tags($this->eventID));

            //Bind data
            $stmt->bindParam(':eventID', $this->eventID);

            $stmt2 = $this->conn->prepare($query2);

            //Clean data
            $this->eventTitle =htmlspecialchars(strip_tags($this->eventTitle));
            $this->startDate =htmlspecialchars(strip_tags($this->startDate));
            $this->endDate =htmlspecialchars(strip_tags($this->endDate));
            $this->eventID =htmlspecialchars(strip_tags($this->eventID));
            $this->description =htmlspecialchars(strip_tags($this->description));
            $this->userID =htmlspecialchars(strip_tags($this->userID));
            $this->inviteID =htmlspecialchars(strip_tags($this->inviteID));
                    
            //Bind data
            $stmt2->bindParam(':eventTitle', $this->eventTitle);
            $stmt2->bindParam(':cText', $this->cText);
            $stmt2->bindParam(':startDate', $this->startDate);
            $stmt2->bindParam(':endDate', $this->endDate);
            $stmt2->bindParam(':eventID', $this->eventID);
            $stmt2->bindParam(':description', $this->description);
            $stmt2->bindParam(':userID', $this->userID);
            $stmt2->bindParam(':inviteID', $this->inviteID);
                
            //Executing query
            if($stmt->execute() && $stmt2->execute()){
                return true;
            }
                
            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

}

Class Event_history{
    //DB Stuff
    private $conn;
    private $table = 'event';

    //Event Properties
    public $eventID;
    public $startDate;
    public $endDate;
    public $eventTitle;
    public $description;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_event_history(){
        //Create query
        $query = 'SELECT * FROM event';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }

}

?>