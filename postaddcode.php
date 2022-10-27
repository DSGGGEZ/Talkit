<?php
    require('session.php');
    require('dbconnect.php');
    require('loggedin.php');

    $date = date('Y-m-d');
    $targetDir = "images/";

    if(isset($_POST['submit'])) {
        $member_id = $_SESSION['member_id'];
            $detail = $_POST['detail'];
            $like_count = 0;
            $post_date = $date;

        if (!empty($_FILES["file"]["name"])) {
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                    $insert = $conn->query("INSERT INTO post(member_id, detail, post_pic, like_count, post_date) VALUES ('$member_id', '$detail', '$fileName', '$like_count', '$post_date')");
                    if ($insert) {
                        $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                        header("location: index.php");
                    } else {
                        $_SESSION['statusMsg'] = "File upload failed, please try again.";
                        header("location: postaddcode.php");
                    }
                } else {
                    $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                    header("location: postaddcode.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
                header("location: postaddcode.php");
            }
        } else {
            $post_pic="NULL";
            $_SESSION['statusMsg'] = "No Picture.";
            $insert = $conn->query("INSERT INTO post(member_id, detail, post_pic, like_count, post_date) VALUES ('$member_id', '$detail', '$post_pic', '$like_count', '$post_date')");
            header("location: index.php");
        }
    }
?>