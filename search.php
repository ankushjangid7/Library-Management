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
    <?php include "navbar.php" ?>    
    <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:rgb(0,0,128);">
            Search &nbsp; Book</h2>
        </div>
    </div>
    <div class="container">
      <form method="get" action="search.php">
          <div class="panel panel-default">
            <div class="panel-body">
               <div class="form-group"> 
                  <div class="row">
                    <div class="col-md-3 column">
                      <!-- <span class="input-group-lg"> -->
                        <select name="select_by">
                          <option value="all">Select By</option>
                          <option value="all">All</option>
                          <option value="bid">Book ID</option>
                          <option value="bname">Book Name</option>
                          <option value="Category">Category</option>
                          <option value="Publisher">Publisher</option>
                          <option value="Author">Author</option>
                          <option value="Year">Year</option>
                        </select>
                        <select name="order_by">
                          <option value="bname">Order By</option>
                          <option value="bname">All</option>
                          <option value="bid">Book_ID</option>
                          <option value="bname">Book_Name</option>
                          <option value="Publisher">Publisher</option>
                          <option value="Year">Year</option>
                        </select>
                      <!-- </span> -->
                    </div>
                    <div class="col-md-7 column">
                        <div class="col-md-12 column">
                        <input class="form-control" type="text" name="keyword"placeholder="Keyword"></div>
                        <div class="col-md-6 column">
                          <div class="input-group">
                            <span class="input-group-addon">From</span>
                            <input type="text" class="form-control" name="lower" placeholder="the lower bound" />
                          </div>
                        </div>
                        <div class="col-md-6 column">
                          <div class="input-group">
                            <span class="input-group-addon">To</span>
                            <input type="text" class="form-control" name="upper" placeholder="the upper bound" />
                          </div>
                        </div>
                      </span>
                    </div>
                    <div class="col-md-2 column">

                      <button type="submit" name="submit" class="btn btn-inverse btn-wide">Search</button>
                      <!-- <div class="col-md-2 column"><br /></div> -->
                      <button type="reset" class="btn btn-danger btn-wide">Reset</button>
                    </div>

                  </div> 
               </div> 
           </div>
               </div>
            </div>
          </div>
      </form>
      
      <?php
          if (isset($_GET["submit"]))
          {
            include "connectvar.php";
            $select_by=$_GET["select_by"];
            $order_by=$_GET["order_by"];
            $lower=$_GET["lower"];
            $upper=$_GET["upper"];
            $keyword=$_GET["keyword"];
            if (!($lower|$upper))
            {
              if (!($keyword)) $sql="SELECT * FROM book ORDER BY $order_by;";
              else if($select_by == 'Year')
              {
                $sql="SELECT * FROM book WHERE year=$keyword ORDER BY $order_by";
              }
			  else if ($select_by == 'all') {
				  $sql="SELECT * FROM book ORDER BY $order_by";
			  }
			  else {
				  $sql="SELECT * FROM book WHERE $select_by LIKE '%$keyword%' ORDER BY $order_by";
			  }
            }
            else 
            {
              if ($select_by=="all") $sql="SELECT * FROM book WHERE bname<=$upper AND bname>=$lower ORDER BY $order_by;";
              else 
              {
                $sql="SELECT * FROM book WHERE $select_by<=$upper AND $select_by>=$lower ORDER BY $order_by";
              }
              // echo "have order ".$lower." ".$upper." ";
            }
            
            $arr=mysqli_query($con,$sql);
            if($arr)
            {
              echo "<div class='container'>";
              echo "<div class='panel panel-info'>";
              echo "<div class='panel panel-heading' align='center'>Search Result</div>";
              echo '<table class="table table-striped" >';
              echo '<tr>';
              echo  "<td width='5%' align='left' ><strong>ID</strong></th>";
              echo  "<td width='15%' align='left' ><strong>Name</strong></th>";
              echo  "<td width='10%' align='left' ><strong>Category</strong></th>";
              echo  "<td width='20%' align='left' ><strong>Publisher</strong></th>";
              echo  "<td width='20%' align='left' ><strong>Author</strong></th>";
              echo  "<td width='5%' align='left' ><strong>Year</strong></th>";
			        echo  "<td width='5%' align='left' ><strong>Total</strong></th>";
              echo  "<td width='5%' align='left' ><strong>Stock</strong></th>";
              echo  "<td width='5%' align='left' ><strong>Rack</strong></th>";
              echo '</tr>';
              while($val=mysqli_fetch_row($arr))
              {
                 echo "<tr >";
                  for($i=0;$i<count($val);$i++)
                  {
                          echo "<td align='left'>".$val[$i]."</td>";
                  }             
                  $sql=mysqli_query($con,"SELECT * FROM stock WHERE bid='$val[0]';");
                  $val1=mysqli_fetch_row($sql);
                  echo "<td align='left'>".$val1[1]."</td>"; 
                  $sql=mysqli_query($con,"SELECT * FROM rack WHERE bid='$val[0]';");
                  $val1=mysqli_fetch_row($sql);
                  echo "<td align='left'>".$val1[1]."</td>"; 
                  echo "</tr>";
              }
              echo "</table></div></div></div>";
            }
            else echo "sql failed.".mysqli_errno($con)." ".mysqli_error($con)."";
          }
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