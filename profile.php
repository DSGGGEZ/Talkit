<?php
    require('session.php');
    require('dbconnect.php');
    require('loggedin.php');
    require('header.php');
    
    if($_SESSION['member_id']!=null)
    $member_id=$_SESSION['member_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Talkit! | Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="container">
<?php
    $sql = "SELECT * FROM member WHERE member_id = '$member_id'";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc()
    ?>
<div class="container-fluid">
    <a href="editprofile.php" class="btn btn-warning pull-right" style="margin-left: 10px">Edit profile</a>
    <table class="table table" style="margin-top: 20px">
        <tbody>
            <tr><br><br><br>
                <img src="images/<?php echo $row['profile_pic']?>" style="width:300px;height:300px;border-radius: 50%;" alt="avatar">
                <h2><b>Profile</b></h2>
            </tr>
            <tr>
                <th>Username :</th>
                <td><?php echo $row['username'] ?></th>
            </tr>
            <tr>
                <th>Created Date :</td>
                <td><?php echo $row['create_date'] ?></td>
            </tr>
        </tbody>
    </table>
    </div>
<?php
require('footer.php');
?>
</body>
</html>