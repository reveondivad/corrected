<?php
    $uploaded_name = basename($_FILES['uploaded']['name']);
    $uploaded_ext  = pathinfo($uploaded_name, PATHINFO_EXTENSION);
    $uploaded_size = $_FILES['uploaded']['size'];
    $uploaded_tmp  = $_FILES['uploaded']['tmp_name'];
    $target_path   = '/path/to/upload/folder/' . $uploaded_name;

    // Is it an image?
    if(in_array(strtolower($uploaded_ext), ['jpg', 'jpeg', 'png']) &&
       $uploaded_size < 100000 &&
       getimagesize($uploaded_tmp)) {

        // Can we move the file to the upload folder?
        if(!move_uploaded_file($uploaded_tmp, $target_path)) {
            // No
            $html .= '<pre>Your image was not uploaded.</pre>';
        } else {
            // Yes!
            $html .= ""<pre>{$target_path} successfully uploaded!</pre>"";
        }
    } else {
        // Invalid file
        $html .= '<pre>Your image was not uploaded. We can only accept JPEG or PNG images.</pre>';
    }
?>