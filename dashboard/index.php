<?php
if(isset($_SESSION["admin"]) && $_SESSION['admin']==1 ){
header("location:owner/index.php");
}else{
    header("location:../404.php");
}
?>