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
    

}

?>