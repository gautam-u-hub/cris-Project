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

<form class="form" action="" method="post">



<?php

$username=$_SESSION['username'];


$zones1=$_POST['zones'];
$division=$_POST['regions'];

$m=$_POST['MONTH'];
$y=$_POST['YEAR'];

$sql3 = "SELECT id, target, performance, text,cummilative,max,score,achievement FROM kpi WHERE ZONE='$zones1' AND DIVISION='$division' AND YEAR='$y' AND MONTH='$m'";
$result3 = $con->query($sql3);
$target =array();
$per=array();
$cummilative=array();
$max=array();
$score	= array();
$achievement=array();	



if ($result3->num_rows > 0) {
  while($row = $result3->fetch_assoc()) {
    $id=$row["id"];
    
    array_push($target,$row["target"]);
    array_push($per,$row["performance"]);
    $t=$row["text"];
    array_push($cummilative,$row['cummilative']);   
     array_push($max,$row['max']);
    array_push($score,$row['score']);
    array_push($achievement,$row['achievement']);




    
  
  }
} else {
  echo "0 results as there are no values in the database for this division/month/year";
  return;
}


?>

<h4 style="text-align:center;">ZONE:-<?php echo $zones1 ?> DIVISION:-<?php echo $division ?>   </h4>






<table class="table table-bordered border-secondary">
  <thead>
    <tr>
      <th scope="col">SI.NO.</th>
      <th scope="col">Key performance indicators</th>
      <th scope="col">unit of measurement</th>
      <th scope="col">Target 2022-2023</th>
      <th scope="col">performance in last year in the corresponding month</th>
      <th scope="col">performance in current month</th>
      <th scope="col">cummilative</th>
      <th scope="col">max</th>
      <th scope="col">score</th>
      <th scope="col">achievement</th>



    </tr>
    
   

  </thead>
  <tbody>


    
 
    <tr style="background-color:#7EC8E3">
      <th scope="row">1</th>

      <td>Safety Works</td>
      <td colspan="10"></td>


  

    </tr>
    <tr>
      <th scope="row">1.1</th>
      <td>Elimination of Manned LC Gates</td>
      <td>Nos.</td>
      <td><?php echo $target[0] ?>
      </td>
      <td></td>
                    <td><?php echo $per[0]?>
        </td>
        <td><?php echo $cummilative[0]?></td>
        <td><?php echo $max[0]?></td>
        <td><?php echo $score[0]?></td>

        <td><?php echo $achievement[0]?></td>

    </tr>
    <tr>
      <th scope="row">1.2</th>
      <td>Interlocking of Manned LC Gates</td>
      <td>Nos.</td>
      <td><?php echo $target[1] ?>
      </td>
      <td></td>
                    <td><?php echo $per[1]?>
        </td>
        <td><?php echo $cummilative[1]?></td>
        <td><?php echo $max[1]?></td>
        <td><?php echo $score[1]?></td>

        <td><?php echo $achievement[1]?></td>


    </tr>
    <tr>
      <th scope="row">1.3</th>
      <td>Track Renewal</td>
      <td>Tkm.</td>
      <td><?php echo $target[2] ?>
      </td>
      <td></td>
                    <td><?php echo $per[2]?>
        </td>
        <td><?php echo $cummilative[2]?></td>
        <td><?php echo $max[2]?></td>
        <td><?php echo $score[2]?></td>

        <td><?php echo $achievement[2]?></td>

    </tr>
    <tr>
      <th scope="row">1.4</th>
      <td>Deep screening of plain tracks</td>
      <td>Tkm.</td>
      <td><?php echo $target[3] ?>
      </td>
      <td></td>
                    <td><?php echo $per[3]?>
        </td>
        <td><?php echo $cummilative[3]?></td>
        <td><?php echo $max[3]?></td>
        <td><?php echo $score[3]?></td>

        <td><?php echo $achievement[3]?></td>


    </tr> 
    <tr>
      <th scope="row">1.5</th>
      <td>Deep screening of turnouts</td>
      <td>Nos.</td>
      <td><?php echo $target[4] ?>
      </td>
      <td></td>
                    <td><?php echo $per[4]?>
        </td>
        <td><?php echo $cummilative[4]?></td>
        <td><?php echo $max[4]?></td>
        <td><?php echo $score[4]?></td>

        <td><?php echo $achievement[4]?></td>


    </tr> 
    <tr style="background-color:#7EC8E3" >
      <th scope="row">2</th>
      <td>Buisness And Financial performance</td>
      <td colspan="10"></td>


    </tr>
    <tr>
      <th scope="row">2.1</th>
      <td>Total Revenues(including Sundry Earnings)</td>
      <td>Rs. Cr.</td>
      <td><?php echo $target[5] ?>
      </td>
      <td></td>
                    <td><?php echo $per[5]?>
        </td>
        <td><?php echo $cummilative[5]?></td>
        <td><?php echo $max[5]?></td>
        <td><?php echo $score[5]?></td>

        <td><?php echo $achievement[5]?></td>


    </tr> 
    <tr>
      <th scope="row">2.2</th>
      <td>Sundry Revenue(all sources)</td>
      <td>Rs. Cr.</td>
      <td><?php echo $target[6] ?>
      </td>
      <td></td>
                    <td><?php echo $per[6]?>
        </td>
        <td><?php echo $cummilative[6]?></td>
        <td><?php echo $max[6]?></td>
        <td><?php echo $score[6]?></td>

        <td><?php echo $achievement[6]?></td>


    </tr> 
    <tr>
      <th scope="row">2.3</th>
      <td>Originating Freight Loading</td>
      <td>Million Ton</td>
      <td><?php echo $target[7] ?>
      </td>
      <td></td>
                    <td><?php echo $per[7]?>
        </td>
        <td><?php echo $cummilative[7]?></td>
        <td><?php echo $max[7]?></td>
        <td><?php echo $score[7]?></td>

        <td><?php echo $achievement[7]?></td>


    </tr> 
    <tr>
      <th scope="row">2.4</th>
      <td>Originating Passenger Traffic</td>
      <td>Millions</td>
      <td><?php echo $target[8] ?>
      </td>
      <td></td>
                    <td><?php echo $per[8]?>
        </td>
        <td><?php echo $cummilative[8]?></td>
        <td><?php echo $max[8]?></td>
        <td><?php echo $score[8]?></td>

        <td><?php echo $achievement[8]?></td>


    </tr> 
    <tr>
      <th scope="row">2.5</th>
      <td>Ordinary Working Expenses (OWE)</td>
      <td>Rs. Cr.</td>

      <td></td>
      <td><?php echo $target[9] ?>
      </td>
                    <td><?php echo $per[9]?>
        </td>
        <td><?php echo $cummilative[9]?></td>
        <td><?php echo $max[9]?></td>
        <td><?php echo $score[9]?></td>

        <td><?php echo $achievement[9]?></td>


    </tr> 
    <tr>
      <th scope="row">2.6</th>
      <td>Performance Efficiency Index </td>
      <td>%</td>
      <td>
      </td>
      <td><?php echo $target[10] ?></td>
                    <td><?php echo $per[10]?>
        </td>
        <td><?php echo $cummilative[10]?></td>
        <td><?php echo $max[10]?></td>
        <td><?php echo $score[10]?></td>

        <td><?php echo $achievement[10]?></td>


    </tr> 
    <tr style="background-color:#7EC8E3">
      <th scope="row">3</th>
      <td>Mobility throughput and capacity utilization</td>
      <td colspan="10"></td>


    </tr>
    <tr>
      <th scope="row">3.1</th>
      <td>Average Interchange of Trains</td>
      <td>Nos.</td>
      <td>
      </td>
      <td><?php echo $target[11] ?></td>
                    <td><?php echo $per[11]?>
        </td>

        <td><?php echo $cummilative[11]?></td>
        <td><?php echo $max[11]?></td>
        <td><?php echo $score[11]?></td>

        <td><?php echo $achievement[11]?></td>


    </tr> 
    <tr>
      <th scope="row">3.2</th>
      <td>NTKms/wagon/day</td>
      <td>NTKm</td>
      <td>
      </td>
      <td><?php echo $target[12] ?></td>
                    <td><?php echo $per[12]?>
        </td>

        <td><?php echo $cummilative[12]?></td>
        <td><?php echo $max[12]?></td>
        <td><?php echo $score[12]?></td>

        <td><?php echo $achievement[12]?></td>


    </tr> 
    <tr>
      <th scope="row">3.3</th>
      <td>Wagon Turnaround</td>
      <td>Days</td>
      <td>
      </td>
      <td><?php echo $target[13] ?></td>
                    <td><?php echo $per[13]?>
        </td>
        <td><?php echo $cummilative[13]?></td>
        <td><?php echo $max[13]?></td>
        <td><?php echo $score[13]?></td>

        <td><?php echo $achievement[13]?></td>


    </tr> 

    <tr>
      <th scope="row">3.4</th>
      <td>a) Removal of permanent Speed Restrictions</td>
      <td>Nos.</td>
      <td><?php echo $target[14] ?>
      </td>
      <td></td>
                    <td><?php echo $per[14]?>
        </td>
        <td><?php echo $cummilative[14]?></td>
        <td><?php echo $max[14]?></td>
        <td><?php echo $score[14]?></td>

        <td><?php echo $achievement[14]?></td>


    </tr> 
    <tr>
      <th scope="row"></th>
      <td>b)Relaxation of permanent Speed Restrictions </td>
      <td>Nos.</td>
      <td>
      <?php echo $target[15] ?>
      </td>
      <td></td>
                    <td><?php echo $per[15]?>
        </td>
        <td><?php echo $cummilative[15]?></td>
        <td><?php echo $max[15]?></td>
        <td><?php echo $score[15]?></td>

        <td><?php echo $achievement[15]?></td>


    </tr> 
    <th scope="row">3.5</th>
      <td>Average speed of freight trains </td>
      <td>Nos.</td>
      <td>
      </td>
      <td><?php echo $target[16] ?>
    </td>
                    <td><?php echo $per[16]?>
        </td>
        <td><?php echo $cummilative[16]?></td>
        <td><?php echo $max[16]?></td>
        <td><?php echo $score[16]?></td>

        <td><?php echo $achievement[16]?></td>

    <tr style="background-color:#7EC8E3">
      <th scope="row">4</th>
      <td>Mobility throughput and capacity utilization</td>
      <td colspan="10"></td>


    </tr>
    <tr>
      <th scope="row">4.1</th>
      <td>Signal Failure</td>
      <td>Nos.</td>
      <td>
      </td>
      <td></td>
                    <td>
        </td>

    </tr> 
     <tr>
      <th scope="row">4.2</th>
      <td>Rail Failure</td>
      <td>Nos.</td>
      <td>
      </td>
      <td></td>
                    <td>
        </td>

    </tr>
    <tr>
      <th scope="row">4.3</th>
      <td>Weld Failure</td>
      <td>Nos.</td>
      <td>
      </td>
      <td></td>
                    <td>
        </td>

    </tr> 
    <tr>
      <th scope="row">4.4</th>
      <td>Electric Loco Failure</td>
      <td>Nos.</td>
      <td>
      </td>
      <td></td>
                    <td>
        </td>

    </tr> 
    <tr>
      <th scope="row">4.5</th>
      <td>Diesel Loco Failure</td>
      <td>Nos.</td>
      <td>
      </td>
      <td></td>
                    <td>
        </td>

    </tr> 
    <tr>
      <th scope="row">4.6</th>
      <td>OHE failure</td>
      <td>Nos.</td>
      <td>
      </td>
      <td></td>
                    <td>
                         
        </td>

    </tr> 
    <tr>
      <th scope="row">4.7</th>
      <td>Coach Detachment</td>
      <td>Nos.</td>
      <td>
           
      </td>
      <td></td>
                    <td>
                       
        </td>

    </tr> 
    <tr style="background-color:#7EC8E3">
      <th scope="row">5</th>
      <td>Mobility throughput and capacity utilization</td>
      <td colspan="6"></td>


    </tr>
    <tr>
      <th scope="row">5.1</th>
      <td>Coach Detachment</td>
<td colspan="10">
<textarea id="mytextarea" name="texteditor"><?php echo $t?></textarea>


</td>



    </tr> 



  </tbody>
</table>
</form>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Copyright � 2019, Centre For Railway Information Systems, Designed and Hosted by CRIS
  </div>
  <!-- Copyright -->

</footer>