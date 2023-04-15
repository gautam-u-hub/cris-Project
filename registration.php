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


    <title>Document</title>
</head>
<div>
</div>
<body>
<nav class="navbar"  >
<img src="https://upload.wikimedia.org/wikipedia/hi/7/7b/Indian_Railways_logo.png" class="rounded float-start" alt="..." width="5%" height="55px">

  <a class="navbar-brand" href="#">MCDO Portal Railway Board
</a>
 
  <a class="nav-link" href="login.php"> <span class="sr-only">(current)</span></a>

  </div>
  <a class="nav-link" href="login.php">login</a>

  <img src="https://www.ritiriwaz.com/wp-content/uploads/2017/01/Indian-Emblem.jpg" class="rounded float-end" alt="..." width="5%" height="55px">

</nav>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $zones    = stripslashes($_REQUEST['zones']);
        $zones    = mysqli_real_escape_string($con, $zones);
        $regions    = stripslashes($_REQUEST['regions']);
        $regions   = mysqli_real_escape_string($con, $regions);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime, zones, regions)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime', '$zones', '$regions')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

    <form class="form" action="" method="post">

        <h1 class="login-title">Registration</h1>

        
</div>

     
 <select  class="form-control" id="zones" name="zones" required>
    <option value="" selected="selected">-- Select Zone --</option>
   

  </select>
  <br>
   <select  class="form-control" id="regions" name="regions" required>
    <option value="" selected="selected"> Select Division</option>
  </select>
   <select  class="form-control" id="offices" style="display: none;" required>
    <option value="" selected="selected">Month</option>
  </select>
  <br>
    
        <input type="text" class="form-control" name="username" placeholder="Username" novalidate  />
        <br>
        <input type="email" class="form-control" name="email" placeholder="Email Adress" required>
        <br>
        <input type="tel" class="form-control" name="phone" placeholder="1234567891" required pattern="[0-9]{10}">
        <br>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <br>
        <input type="submit" class="btn btn-outline-success" name="submit" id="submit" value="Submit" />
        <br>
        
    </form>
<?php
    }
?>
</body>
</html>
<br><br><br>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Copyright � 2019, Centre For Railway Information Systems, Designed and Hosted by CRIS
  </div>
  <!-- Copyright -->

</footer>




<script>
var subjectObject = {
    "Central Railway": {
      "Mumbai DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "BHUSAVAL DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "PUNE DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "SHOLAPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "NAGPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]

    },
    "East Coast Railway": {
      "KHURDA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "SAMBALPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "WALTAIR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]

    },
    "East Central Railway": {
      "DHANBAD DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "DANAPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "DEENDAYAL UPADHYAY DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "SONEPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "SAMASTIPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],


    },"Eastern Railway": {
      "ASANSOL DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "MALDA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "HOWRAH DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "SEALDAH DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],

    },"North Central Railway": {
      "JHANSI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "AGRA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "PRAYAGRAJ DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]


    },"North Eastern Railway": {
      "VARANASI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "LUCKNOW DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "IZATNAGAR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]

    },"North Frontier Railway": {
      "KATIHAR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "ALIPUR DWAR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "LUMDING DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "TINSUKIA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "RANGIA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],



    },
    "Northern Railway": {
      "DELHI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "FIROZPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "LUCKNOW DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "MORADABAD DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "AMBALA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "DEMO DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
    },
    "North Western Railway": {
      "AJMER DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "BIKANER DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "JAIPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],

      "JODHPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]
    },
    "South Central Railway": {
      "VIJAYWADA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "GUNTUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "NANDED DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],

      "SECUNDERABAD DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "GUNTAKAL DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]

    },
    "South Eastern Railway": {
      "ADRA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "CHAKRADHARPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "KHARAGPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],

      "RANCHI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]
    },"South East Central Railway": {
      "BILASPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "RAIPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "NAGPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]

    },"Southern Railway": {
      "CHENNAI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "TIRUCHIRAPALLI  DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "MADURAI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "THIRUVANANTHAPURAM DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "PALGHAT DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "SALEM DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]
    },"South Western Railway": {
      "HUBLI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "BANGALORE DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],

      "MYSORE DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]
    },"West Central Railway": {
      "BHOPAL DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "JABALPUR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "KOTA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]

    },"Western Railway": {
      "MUMBAI DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "VADODARA DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "RATLAM DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "BHAVNAGAR DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],
      "AHMEDABAD DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"],

      "RAJKOT DIVISION": ["jan", "feb", "march", "apr", "may", "june", "july", "august", "sept", "oct", "nov", "dec"]
    }
  }
  window.onload = function() {
    var subjectSel = document.getElementById("zones");
    var topicSel = document.getElementById("regions");
    var chapterSel = document.getElementById("offices");
    for (var x in subjectObject) {
      subjectSel.options[subjectSel.options.length] = new Option(x, x);
    }
    subjectSel.onchange = function() {
      chapterSel.length = 1;
      topicSel.length = 1;
      for (var y in subjectObject[this.value]) {
        topicSel.options[topicSel.options.length] = new Option(y, y);
      }
    }

  }
    </script>


