<?php
include(""../common/header.php"");
?>

<form action=""/api/index.php"" method=""GET"">
    <input type=""text"" name=""page"">
</form>

<?php
$page = basename($_GET[""page""]);
include($page);
?>