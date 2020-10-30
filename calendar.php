<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

    session_start();
    include_once 'connect.php';
   
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
                    Logga ut 
                </a> 
            </p> 
        <?php endif ?> 
    </div> 
    
    <form action="kalender/test/index.php">

        <button>Lägg till event</button>

    </form>

    <?php
        $userID = $_SESSION['id'];
        $sql = "SELECT * FROM event where userID = $userID";
        
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

        $userID = $_SESSION['id'];
        $sql2 = "SELECT * FROM event where inviteID = $userID";
        
        $res = mysqli_query($conn, $sql2);

        $title = '';
        $description = '';
        $startDate = '';
        $endDate = '';

        while($ev = mysqli_fetch_array($res)){
            echo "<div>
                    <div>".$ev['eventTitle']."</div>
                    <div>".$ev['description']."</div>
                    <div>".$ev['startDate']."</div>
                    <div>".$ev['endDate']."</div>
                </div>
                ";
        }
        
        $sql = "SELECT * FROM event where userID = $userID";
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
        <input type="date" name="startDate" value="<?php echo $startDate; ?>">
        <input type="date" name="endDate" value="<?php echo $endDate; ?>">
        <button type="submit" name="save">Uppdatera</button>
    </form>
    
    <?php
    $sql = "SELECT * FROM event where userID = $userID";
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
    $inviteID = $_SESSION['id'];
    $userID = $inviteID;
    $sql = "SELECT * FROM event where userID = $userID";
        $result = mysqli_query($conn, $sql);

        echo '<form action="bjudin.php" method="post">';
        echo '<label for="eventTitle">Välj event:</label>';
        echo '<select id="eventID" name="eventID">';
        while($rev = mysqli_fetch_array($result)){

        echo '<option value="' . $rev["eventID"] . '" >'. $rev["eventTitle"] .'</option>';
        
        }
        echo '</select>';
        
    ?>
    <input type="text" name="userID" placeholder="Skriv in användare">
    <button type="submit" name="bjudin">Bjud in</button>
    </form>
    <button onclick="myFunction()">Inbjudningar</button>
    <p id="demo"></p>
    <script>
    function myFunction(){
        var txt = <?php echo json_encode($sql2); ?>;
        if (confirm("Vill du acceptera")){
            txt = txt;
        } else{
            txt = "Du tackade nej";
        }
        document.getElementById("demo").innerHTML = txt;
    }
    </script>
</body> 
</html>