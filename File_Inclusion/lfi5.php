<?php include(""../common/header.php""); ?>

<form action=""/api/index.php"" method=""POST"">
    <input type=""text"" name=""page"">
</form>

<?php
    if (isset($_POST[""page""])) {
        $allowed_pages = [""page1.php"", ""page2.php"", ""page3.php""];
        if (in_array($_POST[""page""], $allowed_pages)) {
            include($_POST[""page""]);
        }
    }
?>