<?php
    include 'session.php';
    include 'dbconnect.php';
    
        $post_id= $_GET['post_id'];
        $member_id= $_SESSION['member_id'];

        $sql1 = "SELECT * FROM member_like_post WHERE post_id = '$post_id' AND member_id = $member_id";
		$query1 = $conn->query($sql1);
        $row1 = $query1->fetch_assoc();

        if($query1->num_rows > 0){
            header('location: index.php');
        }
        else{
            $sql2 = "INSERT INTO member_like_post(post_id,member_id) VALUES('$post_id','$member_id')";
            $query2 = $conn->query($sql2);

            $sql3 = "SELECT * FROM post WHERE post_id = '$post_id'";
            $query3 = $conn->query($sql3);
            $row1 = $query3->fetch_assoc();
        
            $like_count=$row1['like_count']+1;

            $sql4 = "UPDATE post SET like_count = $like_count WHERE post_id = '$post_id'";
            $query4 = $conn->query($sql4);

            if($query4){
                header('location: index.php');
            } 
            else{
                $_SESSION['error'] = 'Error';
                header('location: indexsd.php');
            }
        }
?>