<?php
    require('session.php');
    require('dbconnect.php');
    require('loggedin.php');
    require('header.php');

    $sql = "SELECT * FROM member ORDER BY member_id DESC";
    $results = $conn->query($sql);

    $my_member_id=$_SESSION["member_id"];

    $member_chat_id = isset($_GET['member_chat_id']) ? $_GET['member_chat_id'] : "";
    if ($member_chat_id != "") {
        $sql2 = "SELECT * FROM member_chat LEFT JOIN member ON member_chat.member_id=member.member_id WHERE member_chat.member_id='$member_chat_id' AND member_chat.member_id = '$my_member_id' ORDER BY member_chat.send_date DESC";
    }
    else{
        $sql2 = "SELECT * FROM member_chat LEFT JOIN member ON member_chat.member_id=member.member_id WHERE member_chat.member_id='$my_member_id' AND member_chat.member_chat_id = '$member_chat_id' ORDER BY member_chat.send_date DESC";
    }
    $results2 = $conn->query($sql2);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    #table-wrapper {
        position: relative;
        width: 350px;
    }

    #table-scroll {
        height: 500px;
        overflow: auto;
        margin-top: -500px;
    }

    #table-wrapper2 {
        position: relative;
        width: 1800px;
    }

    #table-scroll2 {
        height: 500px;
        overflow: auto;
        margin-top: 50px;
        margin-left: 450px;
    }

    #table-wrapper2 table thead th .text {
        position: absolute;
        top: -20px;
        z-index: 2;
        height: 20px;
        width: 35%;
        border: 1px solid red;
    }

    #table-wrapper table * {
        color: black;
    }

    #table-wrapper table thead th .text {
        position: absolute;
        top: -20px;
        z-index: 2;
        height: 20px;
        width: 35%;
        border: 1px solid red;
    }
    </style>
</head>

<body>
    <div class="row">
        <div class="container-fluid" style="margin-left:-300px">
            <h2>Chat</h2>
            <!-- message -->
            <div id="table-wrapper2">
                <div id="table-scroll2">
                    <table border="1">
                        <thead>
                        </thead>
                        <tbody>
                            <?php
                            while ($row2 = $results2->fetch_assoc()) {
                                if($row2['member_id']==$my_member_id){
                            ?>
                            <tr>
                                <td style="width:100px;height:100px;border-radius: 50%;"></td>
                                <td style="width:500px">
                                    <h3><br>
                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                </td>

                                <td style="width:500px">
                                    <h3>&nbsp;&nbsp;&nbsp;<?php echo $row2['message'] ?><br>
                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row2['send_date']?></h5>
                                </td>
                                <td style="width:100px;height:100px;border-radius: 50%;"><img src="images/<?php echo $row2['profile_pic']?>"
                                        style="width:50px;height:50px;border-radius: 50%;" alt="avatar"></td>
                            </tr>
                            <?php }else{?>
                                <tr>
                                <td style="width:100px:height:100px"><img src="images/<?php echo $row2['profile_pic']?>"
                                        style="width:100px;height:100px;border-radius: 50%;" alt="avatar"></td>
                                <td style="width:500px">
                                    <h3>&nbsp;&nbsp;&nbsp;<?php echo $row2['message'] ?><br>
                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row2['send_date']?></h5>
                                </td>

                                <td style="width:500px">
                                    <h3>
                                    <h5></h5>
                                </td>
                                <td style="width:300px:height:300px"></td>
                            </tr>
                            <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="table-wrapper">

                <div id="table-scroll">
                    <table sytle="margin-right:-1000px">
                        <thead>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $results->fetch_assoc()) {
                            ?>
                            <tr>
                                <td style="width:200px:height:150px"><img src="images/<?php echo $row['profile_pic']?>"
                                        style="width:50px;height:50px;border-radius: 50%;" alt="avatar"></td>
                                <td style="width:200px">
                                    <h3>&nbsp;&nbsp;&nbsp;<a
                                            href="profilefeed.php?member_id=<?php echo $row['member_id']?>"><?php echo $row['username'] ?>
                                </td>
                                <td style="width:70px">
                                    <h3>&nbsp;&nbsp;&nbsp;
                                        <form method="get"><input type="hidden" name="member_chat_id"
                                                value="<?php echo $row['member_id']?>"><input type="submit"
                                                value="Chat"></form>
                                        <a href="messageto.php?member_id=<?php echo $row['member_id']?>">
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
require('footer.php');
?>
</body>

</html>