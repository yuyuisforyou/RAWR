<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
    $login = true;
}else{
    $login = false;
}

 echo     '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
          <a class="navbar-brand" href="/forum/index.php">Forum</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link" href="/forum/index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top 5 Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownId">';

                    $sql = "SELECT * FROM `categories` LIMIT 5";
                    $result = mysqli_query($con,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ids = $row['category_id'];
                        $cat = $row['category_name'];
                        echo  '<a class="dropdown-item  bg-dark text-light" href="threadlist.php?catid='.$ids.'">'.$cat.'</a>';
                    }
                   
             echo     '</div>
              </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="/Forum/assets/about.php">About <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="/Forum/assets/contact.php">Contact Us <span class="sr-only">(current)</span></a>
                  </li>
                 
              </ul>
              <form class="form-inline my-2 my-lg-0" action="/forum/assets/search.php" method="get">
                  <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
              </form>';

if (!$login) {
    echo    '<button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit" data-toggle="modal" data-target="#signupModal">Signup</button>';
}
if ($login) {
        echo '<em class="text-light ml-2"> Welcome:  '. $_SESSION['email'].'</em>
        <a href="/Forum/assets/logout.php" class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit">Logout</a >';
}    
          echo '</div>
      </nav>';

      require "login.php";
      require "signup.php";
if(isset($_GET['Emailalreadyexist'])&& $_GET['Emailalreadyexist'] == "true" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Error!</strong> Email Already Exist.
  </div>';
}
if(isset($_GET['registersuccessfull'])&& $_GET['registersuccessfull'] == "true" ){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Succesfully Registered!</strong> Now You can Login.
  </div>';
}
if(isset($_GET['Passwordnotmatch'])&& $_GET['Passwordnotmatch'] == "true" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Error!</strong> Password not match.
  </div>';
}
if(isset($_GET['loginsuccessfull'])&& $_GET['loginsuccessfull'] == "true" ){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Login Succesfully!</strong> 
  </div>';
}
if(isset($_GET['invalidcredentials'])&& $_GET['invalidcredentials'] == "true" ){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Error!</strong> Invalid Credentials. Check Email or Password
  </div>';
}
if(isset($_GET['logout'])&& $_GET['logout'] == "true" ){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Logout Succesfully!</strong> 
  </div>';
}



?>
