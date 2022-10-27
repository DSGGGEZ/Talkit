<?php
    require('session.php');
    require('dbconnect.php');
    require('loggedin.php');
    require('header.php');

    $member_id=$_SESSION['member_id'];
    $username=$_SESSION['username'];
    
    $sql = "SELECT * FROM member WHERE member_id = '$member_id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();
	
    $date = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Talkit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="container">
    <div class="container-fluid">
        <table>
            <tr>
                <td style="width:150px"><img src="images/<?php echo $row['profile_pic']?>"
                        style="width:100px;height:100px;border-radius: 50%;" alt="avatar"></td>
                <td style="width:500px" colspan="2">
                    <h3><a href="profile.php/<?php echo $member_id ?>"><?php echo $username ?></h3></a>
                    <h5><?php echo $date ?></h5><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <form action="postaddcode.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="detail" class="form-control" style="height:200px"
                            placeholder="Write something....">
                        <input type="file" name="file" class="form-control"
                            accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><b>&nbsp;&nbsp;&nbsp;&nbsp;Note:</b> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                        <div class="row">
                            <?php  if (!empty($_SESSION['statusMsg'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                    ?>
                            </div>
                            <?php } ?>
                        </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td rowspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-sm btn-danger mb-3"
                        style="width:800px"></td>
                </form>
                <td><a href="index.php" class="btn btn-default">Back</i></a></td>
            </tr>
            <hr>
    </div>
    </table>
    <?php
        $conn->close();
    ?><br>
</body>

</html>