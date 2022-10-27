<?php
    require('session.php');
    require('dbconnect.php');
    require('header.php');

    $date = date('Y-m-d');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Talkit!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="container">
    <div class="container">
        <h1>Register</h1>
        <form action="registercode.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
            <label for="password">Profile Picture</label>
            <input type="file" name="file" class="form-control" accept="image/gif, image/jpeg, image/png">
            <p class="small mb-0 mt-2"><b>&nbsp;&nbsp;&nbsp;&nbsp;Note:</b> Only JPG, JPEG, PNG & GIF files are allowed
                to upload</p>
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
            <input type="submit" name="submit" class="btn btn-primary" value="Register">
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
        <br>
    </div>
</body>

</html>