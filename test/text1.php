
<html>
<head>
  <script src="jquery-3.6.0.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
</head>
</html>


<?php

echo '
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    type: "success",
    title: "Your work has been saved",
    showConfirmButton: false,
    timer: 1500
  })
});

</script>';
 
?>