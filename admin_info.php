<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Administration System">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>IIITA Library</title>
    
    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">
  </head>

<body style="background-image: url(text.jpg);">

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <?php include 'navbar.php'; ?>

      <!-- Begin page content -->
      <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:rgb(0,0,128);">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin &nbsp; Info</h2>
        </div>
        <?php 
          // session_start();
          include "connectvar.php";
          //$con = mysqli_connect('127.0.0.1','root','1324','library2');
          $aid = $_SESSION['aid'];
          $sql = "SELECT * FROM admin WHERE aid = '$aid';";
          $arr = mysqli_query($con,$sql);
          if($arr)
          {
            $row = mysqli_fetch_row($arr);
          }
        ?>
        <div>
        <ul type="sphere">
        <li><pre><p style="font-size: 25px;"><strong>Admin ID   </strong> : <?php echo $row[0];?> </p></pre></li>
        <li><pre><p style="font-size: 25px;"><strong>Admin Name </strong> : <?php echo $row[1];?> </p></pre></li>
        <li><pre><p style="font-size: 25px;"><strong>Phone No.  <a href="tel:+91<?php echo $row[3];?>"></strong> : <?php echo $row[3];?> </a></p></pre></li>
        <li><pre><p style="font-size: 25px;"><strong>Email ID   </strong> : <a href="mailto:<?php echo $row[4];?>"><?php echo $row[4];?> </a></p></pre></li>
        </ul>
        </div>
        <br><br><br><br><br>
      </div>
    </div>

    <!-- page footer -->
    <?php include "footer.php"; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>