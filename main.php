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
    <?php include "navbar.php" ?>  
    <div class="container">
    <h2 class="demo-headline">
        <?php 
          if(isset($_SESSION["aid"])) echo 'Hello, <a href="admin_info.php">'.$_SESSION["admin_name"]." </a>";
        ?> 
    </h2>
    <h2 class="demo-headline" style="color:rgb(0,0,128)">Welcome to Admin Portal</h2>
    <div class="demo-row">
        <div class="demo-content">
        <br><br>
        <ul type="sphere">
          <li><p style="font-size:25px">
            <a href="add_card.php">Add a new card</a> for either student user or teacher user,
          </p></li>
          <li><p style="font-size:25px">
            <a href="search.php">Search for</a> one or some specific books. 
         </p></li>
         <li><p style="font-size:25px">
            <a href="borrow.php">Issue</a> books.
         </p></li>
          <li><p style="font-size:25px">
            <a href="return.php">Search </a>for borrowed books and <a href="return.php">Return</a> .
         </p></li>
          <li><p style="font-size:25px">
           <a href="return.php">Add one</a> or a<a href="return.php"> bulk</a> of books.
         </p></li>
          <li><p style="font-size:25px">
           See all the <a href="member.php">members </a>currently having a card in the library.
         </p></li>
         <li><p style="font-size:25px">
           See all the <a href="issued.php">issued</a> books.
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