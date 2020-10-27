<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="kalender/test/index.php">

        <button>Lägg till event</button>

    </form>
    
    <?php

        include_once 'connect.php';

        $sql = "SELECT * FROM event";

        $result = mysqli_query($conn, $sql);

        $title = '';
        $description = '';
        $startDate = '';
        $endDate = '';


        while($ev = mysqli_fetch_array($result)){
            echo "<div>
                    <div>".$ev['eventTitle']."</div>
                    <div>".$ev['description']."</div>
                    <div>".$ev['startDate']."</div>
                    <div>".$ev['endDate']."</div>
                </div>
                ";
        }
    ?>
    <?php
        session_start();
        include_once 'connect.php';

        

        $sql = "SELECT * FROM event ";
        $result = mysqli_query($conn, $sql);

        echo '<form action="redigerad.php" method="post">';
        echo '<label for="eventTitle">Välj event:</label>';
        echo '<select id="eventID" name="eventID">';
        while($rev = mysqli_fetch_array($result)){

    

            
        echo '<option value="' . $rev["eventID"] . '" >'. $rev["eventTitle"] .'</option>';
        
        }
        echo '</select>';
    ?>
        <input type="text" name="eventTitle" value="<?php echo $title; ?>"placeholder="Skriv ny titel">
        <input type="text" name="description" value="<?php echo $description; ?>" placeholder="Skriv ny beskrivning">
        <input type="date" name="startDate" value="<?php echo $startDate; ?>"placeholder="Skriv ny titel">
        <input type="date" name="endDate" value="<?php echo $endDate; ?>" placeholder="Skriv ny beskrivning">
        <button type="submit" name="save">Uppdatera</button>
    </form>
    
    <?php
    $sql = "SELECT * FROM event ";
        $result = mysqli_query($conn, $sql);

        echo '<form action="delete.php" method="post">';
        echo '<label for="eventTitle">Välj event:</label>';
        echo '<select id="eventID" name="eventID">';
        while($rev = mysqli_fetch_array($result)){

    

            
        echo '<option value="' . $rev["eventID"] . '" >'. $rev["eventTitle"] .'</option>';
        
        }
        echo '</select>';

    ?>
    <button type="submit" name="delete">Ta bort</button>
    </form>
<?php 
   
// If the session variable is empty, this  
// means the user is yet to login 
// User will be sent to 'login.php' page 
// to allow the user to login 
if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} 
   
// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['username']); 
    header("location: login.php"); 
} 
?> 
    <div class="content"> 
   
        <!-- Creating notification when the 
                user logs in -->
          
        <!-- Accessible only to the users that 
                have logged in already -->
        <?php if (isset($_SESSION['success'])) : ?> 
            <div class="error success" > 
                <h3> 
                    <?php
                        echo $_SESSION['success'];  
                        unset($_SESSION['success']); 
                    ?> 
                </h3> 
            </div> 
        <?php endif ?> 
   
        <!-- information of the user logged in -->
        <!-- welcome message for the logged in user -->
        <?php  if (isset($_SESSION['username'])) : ?> 
            <p> 
                Welcome  
                <strong> 
                    <?php echo $_SESSION['username']; ?> 
                </strong> 
            </p> 
            <p>  
                <a href="calendar.php?logout='1'" style="color: red;"> 
                    Click here to Logout 
                </a> 
            </p> 
        <?php endif ?> 
    </div> 
    <?php
    $cookie_name = "user";
    $cookie_value = $_SESSION['username'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    ?>
</body> 
</html>