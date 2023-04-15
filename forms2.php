<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require_once("db.php");
require_once("forms.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Style2.css"/>

    <script src="main.js"></script>

    <title>Document</title>
</head>
<div>
</div>
<body>
<nav class="navbar"  >
<img src="https://upload.wikimedia.org/wikipedia/hi/7/7b/Indian_Railways_logo.png" class="rounded float-start" alt="..." width="5%" height="55px">

  <a class="navbar-brand" href="#">MCDO Portal Railway Board
</a>
 
  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>

  <a class="link-success" href="edit.php">edit</a>

  <a href="add.php" class="link-success">add</a>

  <a class="nav-link" href="logout.php">Logout</a>




  </div>
  <img src="https://www.ritiriwaz.com/wp-content/uploads/2017/01/Indian-Emblem.jpg" class="rounded float-end" alt="..." width="5%" height="55px">

</nav>
<h4 style="text-align:center;"><?php echo "Welcome ". $_SESSION['username']?></h4>

<?php

$username=$_SESSION['username'];

$sql = "SELECT regions, zones FROM users WHERE username='$username'";
$result = $con->query($sql);





if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $zones1=$row["zones"];
    $division=$row["regions"];
  
  }
} else {
  echo "0 results";
}






?>
<h4 style="text-align:center;">ZONE:-<?php echo $zones1 ?> DIVISION:-<?php echo $division ?>   </h4>
<nav class="navbar navbar-expand-lg bg-light">
<h4 style="text-align:center;">ZONE:-<?php echo $YEAR ?>    </h4>
<h4 style="text-align:center;">ZONE:-<?php echo $MONTH ?>    </h4>

</nav> 



  
