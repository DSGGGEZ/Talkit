<?php
    require('session.php');
    require('dbconnect.php');
    require('header.php');
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
 <h1>Login</h1>
  <form method="post" class="form" action="checkpwd.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="username"></div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="password">
    </div>
    <input type="submit" class="btn btn-primary" value="Login">
    <a href="index.php" class="btn btn-danger">Cancel</a>
  </form>
  <br>
</div>
 </body>
</html>
