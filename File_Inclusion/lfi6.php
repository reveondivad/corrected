<?php
    include(""../common/header.php"");
?>

<form action=""/api/index.php"" method=""POST"">
    <input type=""text"" name=""library"">
</form>

<?php
    $allowedLibraries = ['lib1', 'lib2']; // List of allowed libraries
    $library = $_POST['library'];

    if (in_array($library, $allowedLibraries)) {
        include(""includes/"".$library."".php"");
    } else {
        exit('Invalid library');
    }
?>