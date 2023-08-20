<?php     
include(""../common/header.php"");   
?>

<form action=""/api/index.php"" method=""GET"">
    <input type=""text"" name=""class"">
</form>

<?php
$class = basename($_GET['class']);
include('includes/class_'.$class.'.php');
?>