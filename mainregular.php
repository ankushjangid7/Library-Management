<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Administration System">
    <link rel="shortcut icon" href="../../img/favicon.png">

    <title>IIITA Library</title>
    

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
<link href="mystyle.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

</head>
<body style="background-image: url(text.jpg);">
  
    <!-- Fixed navbar -->
    <?php include "navstudent.php" ?>  
    <div class="container">
    <div class="demo-row">
      <h1 class="demo-headline" style="color:#000080; font-family: serif;">Welcome to IIITA Library</h1>
        <div class="demo-content">
        <br><br>
        <ul type="sphere">
          <li><p style="font-size:25px">
            <a href="search.php">Search for</a> one or some specific books. 
         </p></li>
         <li><p style="font-size:25px">
           See all the <a href="memberregular.php">members </a>currently having a card in the library.
         </p></li>
         <li><p style="font-size:25px">
           See all the <a href="issuedregular.php">issued</a> books.
         </p></li></ul>
         <br>
         <br>
         
        </div>
    </div> 

    <!-- page footer-->
    <?php include "footer.php"; ?>

    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/myjq.js"></script>
  </body>
</html>