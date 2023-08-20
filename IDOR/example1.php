<?php

if(isset($_POST['Upload'])) {
    $target_dir = DVWA_WEB_PAGE_TO_ROOT . ""static/uploads/"";
    $target_file = $target_dir . basename($_FILES[""uploaded""][""name""]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if($imageFileType != ""jpg"" && $imageFileType != ""png"" && $imageFileType != ""jpeg"" && $imageFileType != ""gif"" ) {
        $html .= '<pre>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</pre>';
    }
    else if (!move_uploaded_file($_FILES[""uploaded""][""tmp_name""], $target_file)) {
        $html .= '<pre>Your image was not uploaded.</pre>';
    } 
    else {
        $html .= ""<pre>{$target_path} succesfully uploaded!</pre>"";
    }
}

?>