<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />

<style>
    <?php include_once 'style.css'; 
    ?>
    
</style>


<form action="insertpost.php" method="post" enctype="multipart/form-data">
<tr><td>BLOGGTITEL</td>
<td> <input type="text" name="postTitle" required="required"></td>
</tr>
<textarea id="textbox" type="text" name="pText" rows="10" cols="40" required="required">
</textarea>
    <h2></h2>
    <table>
        <tr>
            <td><label>Image</label></td>
            <td><label>:</label></td>
            <td><label><input type="file" name="img"/></label></td>
        </tr>
        <tr>
            <td><label></label></td>
            <td><label></label></td>
            <td><label><input type="submit" name="save_btn" value="SAVE"/></label></td>
        </tr>
    </table>
    <input type="radio" id="1" name="comment" value="on" checked>
    <label for="comment">comment on</label>
    <input type="radio" id="2" name="comment" value="off">
    <label for="comment">comment off</label>
    
</form>

<!-- referens ord som länkar -->
</html>