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
    <link href="node_modules/froala-editor/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
<body style="width: 100%;">





<?php
include("auth_session.php");
require_once("db.php");

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password,"kpi" );
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    else{
        echo"";
    }
    

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
 // echo "0 results";
}
?>
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

<?php
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ERROR | E_PARSE);



$Target_Year=$_POST['Target_Year'];
 $performance   = $_POST['performance'];
$y=$_POST['year'];
$m=$_POST['month'];
$cc=[];

if($m<4){
  $m=$m+12;
}
$ii=$m-4;
echo $ii ." <br> ";
$per=array();
$sql2 = "SELECT id,performance FROM kpi WHERE ZONE='$zones1' AND DIVISION='$division' AND YEAR='$y' AND MONTH='$m'";
$result2 = $con->query($sql2);
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

    $id=$row['id'];
    break;

  
  }
} else {
  echo "0 results";


}

for($i=0;$i<$ii;$i++)
{  
  $m=$m-1;
  //echo $m ;  
 
    $sql2 = "SELECT id,performance FROM kpi WHERE ZONE='$zones1' AND DIVISION='$division' AND YEAR='$y' AND MONTH='$m'";
    $result2 = $con->query($sql2);


if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

    array_push($per,$row["performance"]);

  
  }
} else {
  echo "0 results";


}
     for($j=0;$j<sizeof($per)-1;$j++){

      $cc[$j]+=$per[$j];
      //echo $per[$j]." ".$j ."<br>";
      

     }
     unset($per);
     $per=array();



}



//print_r($cc);
//print_r($performance);

$performance   = $_POST['performance'];
if (isset($cc[0])) {
  //return $target[0];
} else {
   $cc=array_fill(0,17,0);
   
}

  for($i=0;$i<=4;$i++)
  {
    $SUM=$id+$i;

    $cc[$i]+=$performance[$i];
    $c=(float)$cc[$i]/$Target_Year[$i]*100;
      $s=(float)$c*5;
      $sql = "UPDATE kpi SET target='$Target_Year[$i]',performance='$performance[$i]',cummilative='$cc[$i]',achievement='$c',score='$s' WHERE ZONE='$zones1' AND id=$SUM";
      if ($con->query($sql) === TRUE) {
     // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
    
  
    }
    for($i=5;$i<=9;$i++)
  {
    $SUM=$id+$i;

    $cc[$i]+=$performance[$i];
    $c=(float)$cc[$i]/$Target_Year[$i]*100;
      $s=(float)$c*4;
      $sql = "UPDATE kpi SET target='$Target_Year[$i]',performance='$performance[$i]',cummilative='$cc[$i]',achievement='$c',score='$s' WHERE ZONE='$zones1' AND id=$SUM";
      if ($con->query($sql) === TRUE) {
      //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
    
  
    }

    error_reporting(E_ERROR | E_PARSE);

    for($i=10;$i<=13;$i++)
    {
      $SUM=$id+$i;
  
      $cc[$i]+=$performance[$i];
      $c=(float)$cc[$i]/$Target_Year[$i]*100;
        $s=(float)$c*3;
        $sql = "UPDATE kpi SET target='$Target_Year[$i]',performance='$performance[$i]',cummilative='$cc[$i]',achievement='$c',score='$s' WHERE ZONE='$zones1' AND id=$SUM";
        if ($con->query($sql) === TRUE) {
        //echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      
    
      }
      for($i=14;$i<=16;$i++)
  {
    
    $SUM=$id+$i;
    $cc[$i]+=$performance[$i];
    $c=(float)$cc[$i]/$Target_Year[$i]*100;
      $s=(float)$c*3;
      $sql = "UPDATE kpi SET target='$Target_Year[$i]',performance='$performance[$i]',cummilative='$cc[$i]',achievement='$c',score='$s' WHERE ZONE='$zones1' AND id=$SUM";
      if ($con->query($sql) === TRUE) {
     // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
    
  
    }
$text=$_POST['texteditor'];

$sql4 = "UPDATE kpi SET text ='$text' WHERE ZONE='$zones1' AND id=$SUM+1";
  if ($con->query($sql4) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }
    
  error_reporting(E_ERROR | E_PARSE);

   ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Copyright � 2019, Centre For Railway Information Systems, Designed and Hosted by CRIS
  </div>
  <!-- Copyright -->

</footer>
