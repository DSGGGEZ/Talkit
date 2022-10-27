<?php
require('session.php');
require('dbconnect.php');
require('loggedin.php');

    $sql = "SELECT * FROM member ORDER BY member_id DESC";
    $results = $conn->query($sql);
    ?>
<html>
<table style="width:1200px:margin-left:-200px" border="1px">
    <?php
                while ($row = $results->fetch_assoc()) {
                ?>
    <tr>
        <td style="width:200px:height:150px"><img src="images/<?php echo $row['profile_pic']?>"
                style="width:50px;height:50px;border-radius: 50%;" alt="avatar"></td>
        <td style="width:200px">
            <h3>&nbsp;&nbsp;&nbsp;<a
                    href="profilefeed.php?member_id=<?php echo $row['member_id']?>"><?php echo $row['username'] ?>
        </td>
        <td style="width:70px">
            <h3>&nbsp;&nbsp;&nbsp;<a href="messageto.php?member_id=<?php echo $row['member_id']?>"><i
                        class="fa fa-comment" style="color:black">
        </td>
    </tr>
    <?php }
    ?>
</table>