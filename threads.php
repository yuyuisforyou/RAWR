<?php require "assets/dbconnect.php";

$id = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_id = '$id'";
            $result = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thuser_id = $row['thread_user_id'];

                $sql2 = "SELECT Name FROM `users` WHERE srn = '$thuser_id'";
                $result2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $postedby = $row2['Name'];

            }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Welcome to My Forum</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    #footer {
        min-height: 500px;
    }
    </style>
</head>

<body>
    <?php include "assets/header.php";
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $comment = $_POST['comment'];
        $srn = $_POST['srn'];

        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`) VALUES ('$comment', '$id', '$srn')";
        $result = mysqli_query($con,$sql);
        if ($result) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Success!</strong> Your Comment has been posted.
        </div>';
        }
    }
    
    
    
    ?>
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-3"><?php echo $title ; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-2">
            <p>Posted by: <b><?php echo $postedby;  ?></b></p>
        </div>
    </div>
    <div class="container my-3">
        <h2 class="my-3">Post a comment</h2>
        <?php
        if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) {
       echo '<form action=" '.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group">
               <textarea name="comment" rows="3" class="form-control"></textarea>
               <input type="hidden" name="srn" value="'.$_SESSION["srn"].'">
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>';
        }else{
            echo ' <div class="jumbotron">
            <h1 class="display-4">You are not able to Post a Comment</h1>
            <p class="lead">If you want to Post a Comment...Login First</p>
            <hr class="my-2">
        </div>';
        }
        ?>
    </div>
    <div class="container my-4" id="footer">
        <h2 class="text-center">Your Comments</h2>
        <div class="container my-3">
 <?php
        $sql = "SELECT * FROM `comments` WHERE thread_id = '$id' ";
        $result = mysqli_query($con,$sql);
        $noresult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noresult = false;
                $comment = $row['comment_content'];
                $postedby = $row['comment_by'];

                $sql2 = "SELECT Name FROM `users` WHERE srn = '$postedby'";
                $result2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                

                echo '<div class="media my-3">
                <a class="d-flex" href="#">
                    <img src="img/user.png" height="55px" alt="">
                </a>
               <div class="media-body my-0 ml-2">
                <p class="font-weight-bold my-0">'.$row2['Name'].'</p>
                    '.$comment.'
                </div>
            </div>';

            }if ($noresult) {
                echo ' <div class="jumbotron my-3">
                <h1 class="display-3">No Comments Found</h1>
                <p class="lead">Be the first person Post a comment</p>
                <hr class="my-2">
            </div>';
            }



            
?> 


        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include "assets/footer.php";?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>