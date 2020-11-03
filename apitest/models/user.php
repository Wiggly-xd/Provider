<?php

Class user{
    //DB Stuff
    private $conn;
    private $table = 'user';

    //User Properties
    public $username;
    public $password;

    //Constructor with db
    public function __construct($db){
        $this->conn = $db;
    }

    public function read_user(){
        //Create query
        $query = 'SELECT * FROM user';
        //Preparing statement
        $stmt = $this->conn->prepare($query);
        //Executing query
        $stmt->execute();

        return $stmt;
    }
    
    //Get Single User
    public function read_single_user(){
        $query = 'SELECT * FROM user WHERE userID = ?';
        //Preparing statement
        $stmt = $this->conn->prepare($query);

        //Binding pageID
        $stmt->bindParam(1, $this->userID);

        //Executing query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setting properties
        $this->userID = $row['userID'];
        $this->username = $row['username'];
        $this->password = $row['password'];
    }

    //Create user
    public function create_user(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            username = :username,
            password = :password';

            //Preparing statement
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->username =htmlspecialchars(strip_tags($this->username));
            $this->password =htmlspecialchars(strip_tags($this->password));

            //Bind data
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);

            //Executing query
            if($stmt->execute()){
                return true;
            }

            //Print error
            printf("Error: %s.\n", $stmt->error);
            return false;
    }

        //Update user
        public function update_user(){
            //Update query
            $query = 'UPDATE ' . $this->table . '
            SET
                username = :username,
                password = :password
            WHERE
                userID = ?';
    
                //Preparing statement
                $stmt = $this->conn->prepare($query);
    
                //Clean data
                $this->username =htmlspecialchars(strip_tags($this->username));
                $this->password =htmlspecialchars(strip_tags($this->password));
    
                //Bind data
                $stmt->bindParam(':username', $this->username);
                $stmt->bindParam(':password', $this->password);
    
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