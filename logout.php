<?php
  session_start();
  if(isset($_SESSION['aid']))
  {
    session_unset();
    session_destroy();
  }
?>

<html>
<head>
<script type="text/javascript"> 
setTimeout(window.location.href='index.php',5); 
</script> 
</head>
</html>