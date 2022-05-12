<?php
session_start(); //start session
include("modules/config.php"); //include config file
include "header.php";
?>
<body>

<?php
include "category.php";
?>
<form class="form-item" id="load_product">
</form>
<?php
include "footer.php";
?>

</body>
</html>