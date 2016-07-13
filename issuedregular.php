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
    <!-- <link href="css/switch.css" rel="stylesheet"> -->

    <link rel="shortcut icon" href="images/favicon.ico">
        

  </head>

  

  <body style="background-image: url(text.jpg);">  
    <!-- Fixed navbar -->
    <?php include "navstudent.php" ?>    
    <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:rgb(0,0,128);text-align: center;">
            Issued &nbsp; Books</h2>
        </div>
    </div>
    <div class="container">
         
      <?php
            include "connectvar.php";
            $sql="SELECT * FROM record;";                        
            $arr=mysqli_query($con,$sql);
            if($arr)
            {
              echo "<div class='container'>";
              echo "<div class='panel panel-info'>";
              echo "<div class='panel panel-heading' align='center'>Search Result</div>";
              echo '<table class="table table-striped" >';
              echo '<tr>';
              echo  "<td width='5%' align='center' ><strong>Book ID</strong></th>";
              echo  "<td width='20%' align='center' ><strong>Borrower Card ID</strong></th>";
              echo  "<td width='5%' align='center' ><strong>Borrower Name</strong></th>";
              echo  "<td width='20%' align='center'' ><strong>Issued By</strong></th>";
              echo  "<td width='20%' align='center' ><strong>Due Date</strong></th>";
              while($val=mysqli_fetch_row($arr))
              {
                 echo "<tr >";
                 echo "<td width='10%' align='center'>".$val[0]."</td>";
                 echo "<td width='10%' align='center'>".$val[1]."</td>";
                 $sql=mysqli_query($con,"SELECT cname FROM card WHERE cid='$val[1]';");
                 $val1=mysqli_fetch_row($sql);
                 echo "<td width='30%' align='center'>".$val1[0]."</td>"; 
                 $sql=mysqli_query($con,"SELECT aname FROM admin WHERE aid='$val[2]';");
                 $val1=mysqli_fetch_row($sql);
                 echo "<td width='30%' align='center'>".$val1[0]."</td>"; 
                 echo "<td width='20%' align='center'>".$val[4]."</td>";
                 echo "</tr>";
              }
              echo "</table></div></div></div>";
            }
            else echo "sql failed.".mysqli_errno($con)." ".mysqli_error($con)."";
      ?>
      <br><br><br><br>
    
    </div>
    <!-- page footer-->
    <?php include "footer.php"; ?>
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script> $("select").selectpicker({style: 'btn-inverse btn-wide',menuStyle: 'dropdown-inverse'})</script>
  </body>
</html>