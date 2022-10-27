<?php
    require('session.php');
    require('dbconnect.php');
    require('loggedin.php');

    $post_id=$_GET['post_id'];
    $member_id=$_SESSION['member_id'];

    $sql = "SELECT * FROM post WHERE member_id= '$member_id'";
	$query = $conn->query($sql);
    $row = $query->fetch_assoc();

    if($row['member_id'] == $member_id){
        // Prepare sql and bind parameters
        $sql = "DELETE FROM post WHERE post_id = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $post_id);
        $result = $statement->execute();
        // Execute sql and check for failure
        if (!$result) {
            die('Execute failed: ' . $statement->error);
        }
        // Redirect
        header('Location: index.php');
        exit();
    }else{
        header('Location: index.php');
    }
?>