<?php
    include 'session.php';
    include 'dbconnect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username= $_POST['username'];
        $password= $_POST['password'];

        $sql = "SELECT * FROM member where username= '$username' and password = '$password'";
		$query = $conn->query($sql);

        if($query->num_rows > 0){
            $_SESSION['loggedin'] = true;
            $row = $query->fetch_assoc();
			$_SESSION['member_id'] = $row['member_id'];
            $_SESSION['username'] = $row['username'];
			header('location: index.php');
        } 
        else{
            $_SESSION['error'] = 'Member not found';
			header('location: login.php');
        }
    }
	else{
		$_SESSION['error'] = 'Enter username first';
		header('location: login.php');
    }
?>