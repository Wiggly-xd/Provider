
<!DOCTYPE HTML>
<html>


<br>

<?php
include_once 'connect.php';

$search = $_REQUEST["search"];

$query = "SELECT * FROM service WHERE serviceTitle LIKE '%$search%'";
$result = mysqli_query($mysqli,$query);

if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)

{
?>

<table border="2" align="center" cellpadding="5" cellspacing="5">

<tr>
<th> Service titel </th>
<th> Datum
</tr>

<?php while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row["serviceTitle"];?> </td>
<td><?php echo $row["serviceDate"];?> </td>
<td><?php echo $row["serviceID"];?> </td>
</tr>
<?php
}
}
else

?>

</table>
</body>
</html>
<br>