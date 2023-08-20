<?php     
include(""../common/header.php"");   
?>

<form action=""/api/index.php"" method=""POST"">
    <input type=""text"" name=""file"">
</form>

<?php
if (isset($_POST['file'])) {
    $file = basename($_POST['file']);
    if (substr($file, -4, 4) != '.php') {
        $filePath = ""/path/to/your/files/"" . $file;
        if (file_exists($filePath)) {
            echo file_get_contents($filePath);
        } else {
            echo 'File does not exist.';
        }
    } else {
        echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'.""\n"";
    }
}
?>