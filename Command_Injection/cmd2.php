<?php
    include(""../common/header.php"");
    hint(""something something something placeholder placeholder placeholder"");
?>

<form action=""/CMD-2/index.php"" method=""POST"">
    <input type=""text"" name=""cmd"">
</form>

<?php
    $command = escapeshellarg($_POST[""cmd""]);
    system($command);
?>