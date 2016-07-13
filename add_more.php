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
          <div class="demo-headline" style="color:rgb(0,0,128);">
            <h2>Import &nbsp;New &nbsp;Books</h2>
          </div>
          <!-- <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Import</button> -->
        </div>
        <body>
        <?php
          if (isset($_POST['import']))
          {
              include "connectvar.php";
              $file = fopen("books.txt", "r") or exit("Unable to open file!");

              while(!feof($file))
              {
                  $sql=fgets($file);
                  $array0=explode(")",$sql);
                  $array1=explode("(",$array0[0]);
                  $array=explode(",",$array1[1]);
                  $bid=$array[0];
				  //echo $bid;
                  $category=$array[2];
				  //echo $category;
                  $bname=$array[1];
				  //echo $bname;
                  $publisher=$array[3];
				  //echo $publisher;
                  $year=$array[4];
				  //echo $bid;
                  $author=$array[5];
				  //echo $author;
                  $total=intval($array[6]);
                  $rack=$array[7];
				  //echo $total;
                  $sql0="SELECT * FROM book WHERE bid='$bid';";
                  $arr0=mysqli_query($con,$sql0);
				  //echo mysqli_num_rows($arr0);
                  if (mysqli_num_rows($arr0)>0)
				  {
                    $sql1="UPDATE stock SET bstock=bstock+$total WHERE bid='$bid';";
                    $arr1=mysqli_query($con,$sql1);
                    $sql2="UPDATE book SET amount=amount+$total WHERE bid='$bid';";
                    $arr2=mysqli_query($con,$sql2);
                    echo "<script>alert('Book already exists. Stock changed!');window.location='main.php'</script>";
                  }
                  else 
                  {
                    $sql = "INSERT INTO book (bid, category,bname, publisher, year, author, amount) VALUES ('$bid','$category','$bname','$publisher',$year,'$author',$total);";
                    $arr=mysqli_query($con,$sql);
				$sql_query = "INSERT INTO stock (bid,bstock) VALUES ('$bid',$total);";
                $sql1 ="INSERT INTO rack (bid,brack) VALUES ('$bid','$rack');";
                $arr2=mysqli_query($con,$sql_query);
                $arr3=mysqli_query($con,$sql1);
					echo mysqli_errno($con)." ".mysqli_error($con);
                    if ($arr) echo "<script>alert('Add succeed!');window.location='main.php'</script>";
					          else echo "Add book ".$bid." failed! Try again.";
                  }
             }
             fclose($file);
              // mysqli_query($con,$sql);
              // echo "<script>alert('Import Finished!');window.location=''</script>";
          }
        ?>
        <form class="form-horizontal" action="add_more.php" method="post">
          
          <div class="col-sm-7" align="left">
            <p>This page is created for import more NEW books. If you'd like that, just click the following [Import] button. </p>
          </div>
          <div class="col-sm-2" align='right'>
            <button type="submit" class="btn btn-danger btn-wide" name="import" value="submit">Import</button>
          </div> 
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
  </body>
</html>