<?php include(""../common/header.php""); ?>

<?php
hint(""something something something placeholder placeholder placeholder"");
?>

<form action=""/CMD-1/index.php"" method=""POST"">
    <input type=""text"" name=""cmd"">
</form>

<?php
    $cmd = escapeshellarg($_POST[""cmd""]);
    system($cmd);
?>