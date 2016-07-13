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
          <h2 class="demo-headline" style="color:rgb(0,0,128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Borrow &nbsp;Book</h2>
        </div>
    </div>
        <!-- accessing database -->
    <div class="container">
        
        <?php
          if(isset($_GET['check']))
          {
              include "connectvar.php";
              $thiscon=$con;
              $thisbid=$_GET["bid"];
              $thissql="SELECT * FROM book WHERE bid = '$thisbid';";
              $thisarr=mysqli_query($thiscon,$thissql);
              if ($thisarr) 
              {
                $thisval=mysqli_fetch_row($thisarr);
              }
          }
          if (isset($_GET['submit']))
          {
            include "connectvar.php";
            $bid=$_GET['bid'];
            $cid=$_GET['cid'];
            $aid=$_SESSION['aid'];
            $sql="SELECT * FROM book WHERE bid = $bid;";
            $sql1=mysqli_query($con,"SELECT * FROM card WHERE cid='$cid';");
            $arr=mysqli_query($con,$sql);
          if(mysqli_num_rows($sql1)==1) {
            if ($arr) 
            {
              $val=mysqli_fetch_row($arr);
			        $sql_query = mysqli_query($con,"SELECT * FROM record WHERE bid = '$bid' AND cid = '$cid';");
			        $rows = mysqli_num_rows($sql_query);
              $sql1=mysqli_query($con,"SELECT * FROM stock WHERE bid='$bid';");
              $val1=mysqli_fetch_row($sql1);
			        if($rows > 0) echo "<script> alert('One copy is already issued by this Card Holder!');window.location='borrow.php'</script>";
              else if ($val1[1]>0)
              {
                $sql7=mysqli_query($con,"SELECT * FROM issuedamount WHERE cid='$cid';");
                $val2=mysqli_fetch_row($sql7);
                if($val2[1]<=4) {
                  $sql2="INSERT INTO record (bid,cid,aid,bdate,due) VALUES ('$bid','$cid','$aid',now(),now()+INTERVAL 40 DAY);";
                  $arr2=mysqli_query($con,$sql2);
                  $sql3="UPDATE stock SET bstock=bstock-1 WHERE bid = '$bid';";               
                  $arr3=mysqli_query($con,$sql3);
                  $sql4="UPDATE issuedamount SET issued=issued+1 WHERE cid='$cid';";
                  $arr4=mysqli_query($con,$sql4);
                  if($arr2) {
                   if($arr3) {
                      if($arr4) {
                       echo "<script>alert('Borrow succeed!');window.location='borrow.php'</script>";
                      }
                      else {
                        $sql6 = mysqli_query($con,"DELETE FROM record WHERE bid='$bid' AND cid='$cid' AND aid='$aid';");
                        $sql5 = mysqli_query($con,"UPDATE stock SET bstock = bstock+1 WHERE bid = '$bid';");
                        echo "<script>alert('Borrow Failed!');window.location='borrow.php'</script>";
                      }
                    }
                    else {
                      $sql6 = mysqli_query($con,"DELETE FROM record WHERE bid='$bid' AND cid='$cid' AND aid='$aid';");
                      echo "<script>alert('Borrow Failed!');window.location='borrow.php'</script>";
                    }
                  }
                  else {
                    echo "<script>alert('Borrow Failed!');window.location='borrow.php'</script>";
                  }
                }
                else {
                  echo "<script>alert('Borrow Limit Exceeded');window.location='borrow.php'</script>";
                }
			        }
             else 
              {
                echo "<script>alert('No stock!');window.location='borrow.php'</script>";}
            }
          }
          else {
            echo"<script>alert('NO CARD EXISTS OF GIVEN ID!');window.location='borrow.php'</script>";
          }
          }
          
      ?>
        <!-- page body -->
          <form class="form-horizontal" action="borrow.php" method="get">          
            <div class="form-group">
              <label class="col-sm-2 lead" align='right'>Book ID</label>
              <div class="col-sm-5" align='left'>
                 <?php 
                    if (isset($_GET["check"])) {echo "<input type='text' class='form-control' name='bid' value='".$thisbid."'></input>";}
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
                    if (isset($_GET["check"])) {echo "<input type='text' class='form-control' name='bname' value='".$thisval[1]."'></input>";}
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
          <br><br><br><br>
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