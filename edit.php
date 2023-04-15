<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
require_once("db.php");

if(isset($_POST['YEAR']))
$year=$_POST['YEAR'];
if(isset($_POST['MONTH']))

$month=$_POST['MONTH'];


if(isset($year)){}
else{$month=4;
$year=2022;
}

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

<form method="post" action="">

<nav class="navbar navbar-expand-lg bg-light">
<select class="form-select" aria-label="Default select example" name="YEAR" width:25%>
  <option selected><?php echo $year; ?></option>
  <option value="2022">2022</option>
  <option value="2021">2021</option>
  <option value="2020">2020</option>
</select>
    <select class="form-select" aria-label="Default select example" name='MONTH' id="k" onchange='if(this.value != 0) { this.form.submit(); }' onchange="OnSelectionChange(event)">
    <option selected><?php echo $month?> </option>
     
    <option value='1'>jan</option>
    <option value='2'>feb</option>
    <option value='3'>march</option>
    <option value='4'>apr</option>


         <option value='5'>may</option>
         <option value='6'>june</option>
         <option value='7'>july</option>
         <option value='8'>august</option>
         <option value='9'>sept</option>
         <option value='10'>oct</option>
         <option value='11'>nov</option>
         <option value='12'>dec</option>

    </select>
</form>
<?php

?>
</nav> 
<script>

window.onload=function(){
  if (document.getElementById("k").value != 4) {
    var cells = document.getElementsByClassName("target-input"); 
for (var i = 0; i < cells.length; i++) { 
    cells[i].readOnly = true;
  
}

  }
};
function OnSelectionChange(event)
{

 if(event.target.value==4){


  console.log('enabled');
  var cells = document.getElementsByClassName("target-input"); 
for (var i = 0; i < cells.length; i++) { 
    cells[i].readOnly = false;
}

   
 }
 else{
  console.log('disabled'+event.target.value);
  var cells = document.getElementsByClassName("target-input"); 
for (var i = 0; i < cells.length; i++) { 
    cells[i].readOnly = true;
  
}

 }

}
</script>
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

$sql3 = "SELECT id, target, performance, text FROM kpi WHERE ZONE='$zones1' AND DIVISION='$division' AND YEAR='$year' AND MONTH='$month'";
$result3 = $con->query($sql3);
$target =array();
$per=array();


if ($result3->num_rows > 0) {
  // output data of each row
  while($row = $result3->fetch_assoc()) {
    $id=$row["id"];
    
    array_push($target,$row["target"]);
    array_push($per,$row["performance"]);
    $t=$row["text"];
    
  
  }
} else {
  echo "0 results as there is no value added for this month and year";
  return;
}




?>

<h4 style="text-align:center;">ZONE:-<?php echo $zones1 ?> DIVISION:-<?php echo $division ?>   </h4>


<form class="form" action="action.php" method="post">

<input type="text" value="<?php echo $year?>" name="year" style="display: none;">
<input type="text" name="month" value="<?php echo $month?>"style="display: none;">


<table class="table table-bordered border-secondary">
  <thead>
    <tr>
      <th scope="col">SI.NO.</th>
      <th scope="col">Key performance indicators</th>
      <th scope="col">unit of measurement</th>
      <th scope="col">Target 2022-2023</th>
      <th scope="col">performance in last year in the corresponding month</th>
      <th scope="col">performance in current month</th>


    </tr>
    
   

  </thead>
  <tbody>


    
 
    <tr style="background-color:#7EC8E3">
      <th scope="row">1</th>

      <td>Safety Works</td>
      <td colspan="6"></td>


  

    </tr>
    <tr>
      <th scope="row">1.1</th>
      <td>Elimination of Manned LC Gates</td>
      <td>Nos.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[0] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[0]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr>
    <tr>
      <th scope="row">1.2</th>
      <td>Interlocking of Manned LC Gates</td>
      <td>Nos.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[1] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[1]?>"  aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr>
    <tr>
      <th scope="row">1.3</th>
      <td>Track Renewal</td>
      <td>Tkm.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[2] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[2]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>
    </tr>
    <tr>
      <th scope="row">1.4</th>
      <td>Deep screening of plain tracks</td>
      <td>Tkm.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[3] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[3]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">1.5</th>
      <td>Deep screening of turnouts</td>
      <td>Nos.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[4] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[4]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr style="background-color:#7EC8E3" >
      <th scope="row">2</th>
      <td>Buisness And Financial performance</td>
      <td colspan="6"></td>


    </tr>
    <tr>
      <th scope="row">2.1</th>
      <td>Total Revenues(including Sundry Earnings)</td>
      <td>Rs. Cr.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[5] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[5]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">2.2</th>
      <td>Sundry Revenue(all sources)</td>
      <td>Rs. Cr.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[6] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[6]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">2.3</th>
      <td>Originating Freight Loading</td>
      <td>Million Ton</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[7] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[7]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">2.4</th>
      <td>Originating Passenger Traffic</td>
      <td>Millions</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" value="<?php echo $target[8] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[8]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">2.5</th>
      <td>Ordinary Working Expenses (OWE)</td>
      <td>Rs. Cr.</td>

      <td></td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text"class="form-control target-input"value="<?php echo $target[9] ?>" name="Target_Year[]" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[9]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">2.6</th>
      <td>Performance Efficiency Index </td>
      <td>%</td>
      <td>
      </td>
      <td>please enter cumulative value<div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[10] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div></td>
                    <td>please enter cumulative value<div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[10]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr style="background-color:#7EC8E3">
      <th scope="row">3</th>
      <td>Mobility throughput and capacity utilization</td>
      <td colspan="6"></td>


    </tr>
    <tr>
      <th scope="row">3.1</th>
      <td>Average Interchange of Trains</td>
      <td>Nos.</td>
      <td>
      </td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[11] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[11]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">3.2</th>
      <td>NTKms/wagon/day</td>
      <td>NTKm</td>
      <td>
      </td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[12] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" value="<?php echo $per[12]?>" aria-label="Small" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row">3.3</th>
      <td>Wagon Turnaround</td>
      <td>Days</td>
      <td>
      </td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[13] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" aria-label="Small" value="<?php echo $per[13]?>" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 

    <tr>
      <th scope="row">3.4</th>
      <td>a) Removal of permanent Speed Restrictions</td>
      <td>Nos.</td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[14] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" aria-label="Small" value="<?php echo $per[14]?>" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <tr>
      <th scope="row"></th>
      <td>b)Relaxation of permanent Speed Restrictions </td>
      <td>Nos.</td>
      <td>
      <div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[15] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div>
      </td>
      <td></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" aria-label="Small" value="<?php echo $per[15]?>" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>

    </tr> 
    <th scope="row">3.5</th>
      <td>Average speed of freight trains </td>
      <td>Nos.</td>
      <td>
      </td>
      <td><div class="input-group input-group-sm mb-3">
             <div class="input-group-prepend">
           </div>
           <input type="text" class="form-control target-input" aria-label="Small" value="<?php echo $target[16] ?>" name="Target_Year[]" aria-describedby="inputGroup-sizing-sm">
        </div></td>
                    <td><div class="input-group input-group-sm mb-3">
                          <div class="input-group-prepend">
                         </div>
                    <input type="text" class="form-control" aria-label="Small" value="<?php echo $per[16]?>" name="performance[]" aria-describedby="inputGroup-sizing-sm">
               </div>
        </td>
    <tr style="background-color:#7EC8E3">
      <th scope="row">4</th>
      <td>Mobility throughput and capacity utilization</td>
      <td colspan="6"></td>


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
<td colspan="6">
<textarea id="mytextarea" name="texteditor"><?php echo $t?></textarea>


</td>



    </tr> 



  </tbody>
</table>
<input type="submit" name="submit" value="edit" class="btn btn-outline-success">
</form>

</body>
</html>

</div>

		 
<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">Copyright � 2019, Centre For Railway Information Systems, Designed and Hosted by CRIS
</div>
<!-- Copyright -->

</footer>

