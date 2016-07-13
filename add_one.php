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

          <h2 class="demo-headline" style="color:rgb(0,0,128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Single Book</h2>
        </div>
    </div>
        <!-- accessing database -->
    <div class="container">
        <?php
            if(isset($_POST['submit']))
            {
              include "connectvar.php";
              $bid=$_POST["bid"];
              $category=$_POST["category"];
              $bname=$_POST["bname"];
              $publisher=$_POST["publisher"];
              $year=$_POST["year"];
              $author=$_POST["author"];
              $total=$_POST["total"];
              $rack=$_POST["rack"];
              $sql0="SELECT * FROM book WHERE bid = '$bid';";
              $arr0=mysqli_query($con,$sql0);
              if (mysqli_num_rows($arr0)>0)
              {
                $sql1="UPDATE stock SET bstock=bstock+$total WHERE bid = '$bid';";
                $arr1=mysqli_query($con,$sql1);
                $sql1="UPDATE book SET amount=amount+$total WHERE bid = '$bid';";
                $arr1=mysqli_query($con,$sql1);
                echo "Book".$bid." already exists. Stock changed!";
              }
              else 
              {
                $sql = "INSERT INTO book (bid, bname,category,publisher, year, author, amount)VALUES ('$bid','$bname','$category','$publisher',$year,'$author',$total);";
				        $sql_query = "INSERT INTO stock (bid,bstock) VALUES ('$bid',$total);";
                $sql1 ="INSERT INTO rack (bid,brack) VALUES ('$bid','$rack');";
                $arr1=mysqli_query($con,$sql);
				        $arr2=mysqli_query($con,$sql_query);
                $arr3=mysqli_query($con,$sql1);
                echo mysqli_errno($con)." ".mysqli_error($con);
                if ($arr1) echo "Add book ".$bid." succeed!";
                else echo "Add book ".$bid." failed! Try again.";
              }
              echo "<script>alert('Add book finished.');window.location='add_one.php'</script>";
            }
        ?>

        <form class="form-horizontal" action="add_one.php" method="POST">

          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Book ID</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="bid" placeholder="Input book ID here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Category</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="category" placeholder="Input category here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Book Name</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="bname" placeholder="Input book name here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Publisher</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="publisher" placeholder="Input publisher here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Year</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="year" placeholder="Input year here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Author</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="author" placeholder="Input author here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Amount</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="total" placeholder="Input amount here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Rack</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="rack" placeholder="Input rack"></input>
            </div>  
          </div>
          <div class="col-sm-8" align='right'>
            <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Submit</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger btn-wide" name="reset" value="reset">Reset</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
          </div>
            
        </form>

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