<?php
    require('session.php');
    require('dbconnect.php');

    $date = date('Y-m-d');
    $targetDir = "images/";

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $create_date = $date;

        if (!empty($_FILES["file"]["name"])) {
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                    $insert = $conn->query("INSERT INTO member(username, password, profile_pic, create_date) VALUES ('$username', '$password', '$fileName', '$create_date')");
                    if ($insert) {
                        $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                        header("location: index.php");
                    } else {
                        $_SESSION['statusMsg'] = "File upload failed, please try again.";
                        header("location: index.php");
                    }
                } else {
                    $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                    header("location: index.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
                header("location: index.php");
            }
        } else {
            $profile_pic="U01.jpg";
            $_SESSION['statusMsg'] = "No Picture.";
            $insert = $conn->query("INSERT INTO member(username, password, profile_pic, create_date) VALUES ('$username', '$password', '$profile_pic', '$create_date')");
            header("location: index.php");
        }
    }
?>