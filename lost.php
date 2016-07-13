<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Administration System">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <title>IIITA Library</title>
    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!-- [if lt IE 9]> 
      // <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>-->
    <!-- <![endif] -->
  </head>
  <body>

    <div class="container">
      <?php 
        if(isset($_POST['go'])){
          include "connectvar.php";
          $aid=$_POST['aid'];
          $email=$_POST['email'];
          $phno=$_POST['phno'];
          $result=mysqli_query($con,"SELECT * FROM admin WHERE aid ='$aid' AND email = '$email' AND phno = '$phno';");
          $r = mysqli_fetch_array($result);
          if($row = $r) 
          {
            echo "<script language=javascript>alert('Reset Link sent to your Email ID and Phone!');window.location='index.php'</script>";
          }
          else 
          { 
            echo "<script language=javascript>alert('Wrong User ID / Email ID/ Ph. No. !');window.location='lost.php'</script>";
          }
          mysqli_close($con);
        }
      ?>
      <p/> <p/>
      <div class="login" >
       <div class="login-screen" >

        <div class="login-icon" >
          <img src="images/login/lost.gif" alt="Welcome to Mail App">
          <h4><small><strong>LOST PASSWORD?</strong></small></h4>
        </div>

        <form class="login-form" role="form" action="lost.php" method="post">
          <div class="control-group">
            <input type="text" placeholder="Enter Your ID" class="form-control" name="aid" required autofocus/>
            </label>
          </div>

          <div class="control-group">
            <input type="text" placeholder="Enter your Phone no." class="form-control" name="phno" required/>
          </div>

           <div class="control-group">
            <input type="text" placeholder="Enter your E-Mail ID" class="form-control" name="email" required/>
          </div>

          <button class="btn btn-primary btn-large btn-block" type="submit" name="go">Submit</button>
        </form>
      </div>
     </div>   
    </div>
    <!-- /.container -->
    
    <!-- page footer -->
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
  </body>
</html>