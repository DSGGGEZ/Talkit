<?php
    $conn->close();
?>
<html>
    <head>
    <head>
</html>
<hr>
<p class="text-center small">Good luck&nbsp;</p>
<?php 
if(isset($_SESSION['loggedin']))
{
?>
    <p class="text-center small"><?php print_r($_SESSION['username']);?></p>
    <?php 
}else{
?>
    <p class="text-center small">Guest</p>
<?php
}
?>
<p class="text-center small"><a href='logout.php'>Log Out</a></p>
</body>
</html>