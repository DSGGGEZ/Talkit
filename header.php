<!DOCTYPE html>
<html lang="en">

<head>
    <title>Talkit!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        font-family: "Lato", sans-serif;
    }
    .sidenav {
        height: 100%;
        width: 150px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #dbdbdb;
    }

    .sidenav a {
        padding: 6px 6px 6px 32px;
        text-decoration: none;
        font-size: 15px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }
    .a{
        font-size:20px;
    }

    .main {
        margin-left: 200px;
        /* Same as the width of the sidenav */
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
            
        }
    }
    </style>
</head>

<body class="container">
    <?php
$pageName = basename($_SERVER['PHP_SELF'], '.php');
  
?>
    <nav class="nav navbar navbar-default" style="background-color: #e79a4e;width:1910px;height:80px;margin-left:-390px;margin-top:-14px">
    <br>
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:black;font-size:30px"><b>Talkit!</b></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav">
                    <li <?php echo $pageName == 'index' ? 'class="active"' : '' ?>><a href="index.php" style="color:black;font-size:20px">Feed <span
                                class="sr-only">(current)</span></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li <?php echo $pageName == 'chat' ? 'class="active"' : '' ?>><a href="chat.php" style="color:black;font-size:20px">Chat <span
                                class="sr-only">(current)</span></a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <?php
            if(isset($_SESSION['member_id'])){
                $memberId = $_SESSION['member_id'];
                $username= $_SESSION['username'];
              ?>
                <li class='user user-menu'><a href='profile.php?member_id=<?php echo $username ?>' style="color:black;font-size:20px"><?php echo $username ?></a></li>
                <li class='user user-menu'><a style="color:black">|</a></li>
                <li class='user user-menu'><a href='logout.php' style="color:black;font-size:20px">Logout</a></li>
              <?php
            }
            else{
              ?>
                <li><a href='register.php' style="color:black">Register</a></li>
                <li class='user user-menu'><a style="color:black">|</a></li>
                <li><a href='login.php' style="color:black">Login</a></li>
                
              <?php
            }
          ?>
                </ul>
            </div>
        </div>
    </nav>