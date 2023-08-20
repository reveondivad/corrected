<?php
if($_SERVER['REQUEST_METHOD'] === ""POST""){
    $fileContent['file'] = false;
    header('Content-Type: application/json');
    if(isset($_POST['file'])){
        header('Content-Type: application/json');
        $_POST['file'] = str_replace( array(""../"", ""..""), """", $_POST['file']);
        if(strpos($_POST['file'], ""user.txt"") === false){
            $filePath = ""/var/www/html/"" . basename($_POST['file']);
            if(file_exists($filePath)){
                $file = fopen($filePath, ""r"");
                $fileContent['file'] = fread($file, filesize($filePath));
                fclose($file);
            }
        }
    }
    echo json_encode($fileContent);
}