<?php
include("dbconn.php");


$search = $_REQUEST["search"];

$query = "SELECT * FROM post WHERE postTitle LIKE '%$search%'"; //sök efter bok
$result = mysqli_query($db,$query);








echo '<table border="2" align="center" cellpadding="5" cellspacing="5">

<tr>

<th class="postTitle"> Posttitel </th>
<th class="postDate"> Datum  </th>
<th class="postType"> Typ </th>
<th> Ta bort</th>


</tr>';

while($row = mysqli_fetch_assoc($result)){

echo "<tr>


<td class='postTitle'><div id='hide'>".$row['postTitle']."</td>
<td class='postDate'>".$row['postDate']."</td>
<td class='postType'>".$row['postType']."</div></td>
<td><a href ='delete.php?rn=$row[postTitle]'>Delete</td>
</tr>
";
    }// end while loop

echo 
'<form action="updatera.php" method="post">

    <input type="text" placeholder="Ny titel" name="postTitle">
    <input type="text" placeholder="Ny text" name="pText">

    <?php
    include_once "postID.php";
    ?>  
    <button>Update</button>
</form>
</table>
<input type="checkbox" name="postTitle"> Posttitel
<input type="checkbox" name="postDate"> Datum
<input type="checkbox" name="postType"> Typ
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="test.js"></script>'
?>