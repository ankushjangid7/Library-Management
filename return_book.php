<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Administration System">
    <link rel="shortcut icon" href="images/icon.png">

    <title>IIITA Library</title>   
    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

</head>
<body style="background-image: url(text.jpg);">  
    <!-- Fixed navbar -->
    <?php include "navbar.php" ?>    
    <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:rgb(0,0,128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Return &nbsp;Book</h2>
        </div>
    </div>
        <!-- accessing database -->
    <div class="container">
        
        <div class="col-sm-7">
          <div class="col-sm-10">

          </div>
          <div class="col-sm-10" align="left"><p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please note that it returns ONE book at a time!</p></div>
        </div>
        <div class="col-sm-12">&nbsp;</div>
        <?php

          if(isset($_POST['check']))
          {
              include "connectvar.php";
              $thiscon=$con;
              $thisbid=$_POST["bid"];
              $thissql="SELECT * FROM book WHERE bid LIKE '%$thisbid%';";
              $thisarr=mysqli_query($thiscon,$thissql);
              if ($thisarr) 
              {
                $thisval=mysqli_fetch_row($thisarr);
              }
          }
          else if (isset($_GET['bid']))
          {
            $bid=$_GET['bid'];
            $cid=$_GET['cid'];
            include "connectvar.php";
            $aid=$_SESSION['aid'];
            if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM record WHERE bid='$bid' AND cid='$cid';")))
            {
              $sql="DELETE FROM record WHERE bid='$bid' AND cid='$cid';";
              $arr=mysqli_query($con,$sql);
              $sql2="UPDATE stock SET bstock=bstock+1 WHERE bid='$bid';";
              $arr2=mysqli_query($con,$sql2);
              $sql3="UPDATE issuedamount SET issued=issued-1 WHERE cid='$cid';";
              $arr3=mysqli_query($con,$sql3);
              echo "<script>alert('You have successfully returned one book!');window.location='return.php?cid=".$cid."&submit=submit.php'</script>";
            }
            else  
              echo "<script>alert('Return Error! Please check.');window.location='return_book.php'</script>";

          }
          else if (isset($_POST['submit']))
          {
            include "connectvar.php";
            $bid=$_POST['bid'];
            $cid=$_POST['cid'];
            $aid=$_SESSION['aid'];
            if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM record WHERE bid='$bid' AND cid='$cid';")))
            {
              $sql="DELETE FROM record WHERE bid='$bid' AND cid='$cid';";
              $arr=mysqli_query($con,$sql);
              $sql2="UPDATE stock SET bstock=bstock+1 WHERE bid='$bid';";
              $arr2=mysqli_query($con,$sql2);
              $sql3="UPDATE issuedamount SET issued=issued-1 WHERE cid='$cid';";
              $arr3=mysqli_query($con,$sql3);
              echo "<script>alert('You have successfully returned one book! Check your record now.');window.location='return.php?cid=".$cid."&submit=submit.php'</script>";
            }
            else echo "<script>alert('Return Error! Please check your input.');window.location='return_book.php'</script>";
          }
      ?>
        <!-- page body -->
          <form class="form-horizontal" action="return_book.php" method="post">          
            <div class="form-group">
              <label class="col-sm-2 lead" align='right'>Book ID</label>
              <div class="col-sm-5" align='left'>
                 <?php
                    if (isset($_POST["check"])) {echo "<input type='text' class='form-control' name='bid' value='".$thisbid."'></input>";}
                    else {echo "<input type='text' class='form-control' name='bid' placeholder='Input book ID here'/>";}
                 ?>
                 <!-- <input type="text" class="form-control" name="bid" placeholder="Input book ID here"></input> -->
              </div>  
              <div class="col-sm-3" align='left'>
                <button type="submit" class="btn btn-inverse" name="check" value="submit">Check Book Name</button>
              </div>
            </div>
             <div class="form-group" >
              <label class="col-sm-2 lead" align='right'>Book Name</label>
              <div class="col-sm-5" align='left'>
                 <?php
                    if (isset($_POST["check"])) {echo "<input type='text' class='form-control' name='bname' value='".$thisval[1]."'></input>";}
                    else {echo "<input type='text' class='form-control' name='bname' placeholder='Please click the [Check Book Name] bottom '/>";}
                 ?>
              </div>
            </div> 
            <div class="form-group" >
              <label class="col-sm-2 lead" align='right'>Card ID</label>
              <div class="col-sm-5" align='left'>
                 <input type="text" class="form-control" name="cid" placeholder="Input card ID here"></input>
              </div>
            </div> 
            <div class="form-group">
               <p/>
            </div> 
            <!-- <div class="form-group">       -->
             <div class="col-sm-7" align='right'>
              <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Submit</button>
              &nbsp;&nbsp;&nbsp;
              <button type="reset" class="btn btn-danger btn-wide" name="reset" value="reset">Reset</button>
             </div>
          </form>
          <!-- <form class="form-horizontal" id='9'> -->

          <!-- </div>
        </div>
      </div>-->
    </div> 
    <!-- page footer-->
    <br/><?php include "footer.php"; ?>

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