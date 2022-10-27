<?php
    require('session.php');
    require('dbconnect.php');
    require('loggedin.php');
    require('header.php');

    $sql = "SELECT * FROM post LEFT JOIN member ON post.member_id = member.member_id ORDER BY post.post_id DESC";
    $results = $conn->query($sql);
    
?>
<html>
    <title>Talkit!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<head>
</head>

<body>
    <div class="container" style="margin-left:-50px">
    <a href="postadd.php" class="btn btn-sm btn-info" style="width:1200px"><span class="glyphicon glyphicon-plus" ></span> Post</a>
        <?php
        while ($row = $results->fetch_assoc()) {
        ?><table style="width:1200px">
            <tr>
                <td style="width:150px"><img src="images/<?php echo $row['profile_pic']?>" style="width:100px;height:100px;border-radius: 50%;" alt="avatar"></td>
                <td style="width:500px" colspan="3"><h3><a href="profilefeed.php?member_id=<?php echo $row['member_id']?>"><?php echo $row['username'] ?></a></h3><h6><?php echo $row['post_date']?></h6><h4><?php echo $row['detail']?></h4>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="width:500px" colspan="3"><?php if($row['post_pic']!="NULL"){?>
                    <img src="images/<?php echo $row['post_pic']?>" style="width:1000px;height:auto">
                <?php
                }else{

                }?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><br><a href="like.php?post_id=<?php echo $row['post_id']?>"><i class="fa fa-heart" style="color:red"> Like(<?php echo $row['like_count']?>)</i></a></td>
                <td><br><a href="comment.php?post_id=<?php echo $row['post_id']?>"><i class="fa fa-comment" style="color:red"> Comment</i></a></td>
                <td><?php 
                if($_SESSION['member_id']==$row['member_id']){?>
                <br><a href="JavaScript:if(confirm('Do you want to delete this post?')==true){window.location='postdelete.php?post_id=<?php echo $row['post_id']?>';}"><i class="fa fa-trash" style="color:red"> Delete</i></a></td>
                <?php }
                else{?>
                <td></td>
                <?php }?>
            </tr>
            <hr>
        </div>
        </table>
        <?php
        }
        ?>
    </div>

    <?php
require('footer.php');
?>
</body>
</html>
