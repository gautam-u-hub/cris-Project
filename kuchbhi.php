


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
  echo "0 results";
}

$y=$_POST['YEAR'];
$m=$_POST['MONTH'];
$cc=array();

$ii=$m-4;
$per=array(array());
$per[0][0]=26526;
echo $per[0][0];

for($i=0;$i<=$ii;$i++)
{    
  $m=$m+$i;
    $sql2 = "SELECT id,performance FROM kpi WHERE ZONE='$zones1' AND DIVISION='$division' AND YEAR='$y' AND MONTH='$m'";
$result2 = $con->query($sql2);


if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    $id=$row["id"];
    array_push($per,$row["performance"]);

  
  }
} else {
  echo "0 results";
}
     for($j=0;$j<sizeof($per);$j++){
      

     }


}






   $text=$_POST['texteditor'];
  $MONTH=$_POST['MONTH'];
  $YEAR=$_POST['YEAR'];
  $Target_Year   = $_POST['Target_Year'];
  
 
  $performance   = $_POST['performance'];
  for($i=0;$i<=4;$i++)
{
  $c=(float)$performance[$i]/$Target_Year[$i]*100;
    $s=(float)$c*5;
  $sql = "INSERT INTO `kpi`(MONTH,YEAR,ZONE,DIVISION,target,performance,cummilative,max,achievement,score) VALUES ('$MONTH','$YEAR','$zones1','$division','$Target_Year[$i]','$performance[$i]','$performance[$i]',5,'$c','$s')";
    if ($con->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
  

  }
  for($i=4;$i<=9;$i++)
{
  $c=(float)$performance[$i]/$Target_Year[$i]*100;
    $s=(float)$c*4;
  $sql = "INSERT INTO `kpi`(MONTH,YEAR,ZONE,DIVISION,target,performance,cummilative,max,achievement,score) VALUES ('$MONTH','$YEAR','$zones1','$division','$Target_Year[$i]','$performance[$i]','$performance[$i]',4,'$c','$s')";
    if ($con->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
  

  }
  for($i=9;$i<=13;$i++)
  {
    $c=(float)$performance[$i]/$Target_Year[$i]*100;
    $s=(float)$c*3;
  $sql = "INSERT INTO `kpi`(MONTH,YEAR,ZONE,DIVISION,target,performance,cummilative,max,achievement,score) VALUES ('$MONTH','$YEAR','$zones1','$division','$Target_Year[$i]','$performance[$i]','$performance[$i]',3,'$c','$s')";
    if ($con->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
    
  
    }
   

  $sql4 = "INSERT INTO `kpi`(MONTH,YEAR,ZONE,DIVISION,text) VALUES ('$MONTH','$YEAR','$zones1','$division','$text')";
  if ($con->query($sql4) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }


   
    echo "<br>";
    
 
   ?>