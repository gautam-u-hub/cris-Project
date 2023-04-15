<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require_once("db.php");

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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="main3.js"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

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
 
  <a class="nav-link" href="forms.php">Home <span class="sr-only">(current)</span></a>

  </div>
  <img src="https://www.ritiriwaz.com/wp-content/uploads/2017/01/Indian-Emblem.jpg" class="rounded float-end" alt="..." width="5%" height="55px">
        <a class="nav-link" href="logout.php">Logout</a>

</nav>
<h4 style="text-align:center;"><?php echo "Welcome ". $_SESSION['username']?></h4>

<body>


    <form class="form" action="report.php" method="post">
        <h1 class="login-title">Select the values for the report</h1>
        
</div>
     
 <select  class="form-control" id="zones" name="zones" required>
    <option value="" selected="selected">-- Select Zone --</option>
   

  </select>
  <br>
   <select  class="form-control" id="regions" name="regions" required>
    <option value="" selected="selected"> Select Division</option>
  </select>
  <br>
   <select  class="form-control" id="offices" name="MONTH" required>
    <option value="" selected="selected">Select Month</option>
  </select>
  <br>
  <select class="form-control" aria-label="Default select example" name="YEAR" width:25%>
  <option selected>Select Year</option>
  <option value="2022">2022</option>
  <option value="2021">2021</option>
  <option value="2020">2020</option>
</select>
  <br>
  <input type="submit" name="submit" value="Submit" class="btn btn-outline-success">

    </form>

</body>
</html>
<br><br><br><br><br>
<br><br>
<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Copyright � 2019, Centre For Railway Information Systems, Designed and Hosted by CRIS
  </div>
  <!-- Copyright -->

</footer>