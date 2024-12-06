<?php require "assets/dbconnect.php";?>
<!doctype html>
<html lang="en">

<head>
    <title>WS101 Project</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include "assets/header.php";?>
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="img/slider-2.jpg" height="400px" width="1900px" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="img/slider-3.jpg" height="400px" width="1900px" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="img/slider-1.jpg" height="400px" width="1900px" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container my-3">
        <h2 class="text-center">Categories</h2>
        <div class="row my-4">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $catname = $row['category_name'];
                $catdesc = $row['category_description'];

                echo '<div class="col-md-4 my-3">
                <div class="card text-left">
                  <img class="card-img-top" src="img/card'.$id.'.jpg" alt="">
                  <div class="card-body">
                    <h4 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$catname.'</a></h4>
                    <p class="card-text">'.substr($catdesc, 0 , 110).'</p>
                    <a href="threadlist.php?catid='.$id.'" class="btn btn-primary btn-lg">View Threads</a>
                  </div>
                </div>
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