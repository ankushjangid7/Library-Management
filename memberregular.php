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
          <h2 class="demo-headline" style="color:rgb(0,0,128);align-self: center;text-align: center;">
            Member &nbsp; List</h2>
        </div>
    </div>
    <div>
      <?php
            include "connectvar.php";
            $sql="SELECT * FROM card ORDER BY cid;";
            $arr=mysqli_query($con,$sql);
            if($arr)
            {
              echo "<div class='container'>";
              echo "<div class='panel panel-info'>";
              echo "<div class='panel panel-heading' align='center'>Search Result</div>";
              echo '<table class="table table-striped" >';
              echo '<tr>';
              echo  "<td width='25%' align='center' ><strong>Card ID</strong></th>";
              echo  "<td width='25%' align='center' ><strong>Name</strong></th>";
              echo  "<td width='25%' align='center' ><strong>Department</strong></th>";
              echo  "<td width='25%' align='center' ><strong>Type</strong></th>";
              echo '</tr>';
              while($val=mysqli_fetch_row($arr))
              {
                 echo "<tr >";
                  for($i=0;$i<count($val);$i++)
                  {
                          echo "<td align='center'>".$val[$i]."</td>";
                  }            
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