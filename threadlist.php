<?php require "assets/dbconnect.php";

$id = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE category_id = '$id'";
            $result = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $catname = $row['category_name'];
                $catdesc = $row['category_description'];

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
    <?php include "assets/header.php";?>
    <?php
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $srn = $_POST['srn'];

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$title', '$desc', '$id', '$srn')";
        $result = mysqli_query($con,$sql);
        if ($result) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Success!</strong> Your Thread has been inserted.Wait for community to respond.
        </div>';
        }
    }





?>
    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-3">Welcome to the thread of <?php echo $catname ; ?></h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-2">
            <p>If you want to know more about this thread , click on this button</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="index.php" role="button">More Info</a>
            </p>
        </div>
    </div>
    <div class="container my-3">
        <h2 class="my-3">Start a Discussion</h2>
        <?php
        if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) {
            echo ' <form action=" '.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group">
                <label for="">Problem Subject</label>
                <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                <small>Write a short and crsip subject</small>
                </div>
                <input type="hidden" name="srn" value="'.$_SESSION["srn"].'">
                <div class="form-group">
                <label for="">Your Cencern</label>
                <textarea name="desc" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>';
        }else{
            echo ' <div class="jumbotron">
            <h1 class="display-4">You are not able to start a Session</h1>
            <p class="lead">If you want to start a Session...Login First</p>
            <hr class="my-2">
        </div>';
        }
       
        ?>
    </div>



    <div class="container my-4" id="footer">
        <h2 class="text-center">Your Queries</h2>
        <div class="container-my-3">
            <?php
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = '$id' ";
        $result = mysqli_query($con,$sql);
        $noresult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noresult = false;
                $thid = $row['thread_id'];
                $thtitle = $row['thread_title'];
                $thdesc = $row['thread_desc'];
                $thuserid = $row['thread_user_id'];

                $sql2 = "SELECT Name FROM `users` WHERE srn = '$thuserid'";
                $result2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $name = $row2['Name'];

                echo '<div class="media my-3">
                <a class="d-flex" href="#">
                    <img src="img/user.png" height="55px" alt="">
                </a>
                <div class="media-body ml-2 ">
                    <h5 class="my-0 "><a class="text-dark" href="threads.php?threadid='. $thid.'">'.$thtitle.'</a></h5>
                    '.$thdesc.'
                    </div>
                   Asked By: <p class="font-weight-bold"> '.$name.'</p>
            </div>';

            }if ($noresult) {
                echo ' <div class="jumbotron my-3">
                <h1 class="display-3">No Threads Found</h1>
                <p class="lead">Be the first person and ask the question</p>
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