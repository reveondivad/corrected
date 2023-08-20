<?php
session_start();

if (!isset($_SESSION[""home""])) {
    $_SESSION[""home""] = bin2hex(random_bytes(20));
}
$userdir = ""images/"".basename($_SESSION[""home""]).""/"";
if (!file_exists($userdir)) {
    mkdir($userdir, 0755, true);
}

$disallowed_ext = array(
    ""php"",
    ""php3"",
    ""php4"",
    ""php5"",
    ""php7"",
    ""pht"",
    ""phtm"",
    ""phtml"",
    ""phar"",
    ""phps"",
);

if (isset($_POST[""upload""])) {
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die(""yuuuge fail"");
    }

    $tmp_name = $_FILES[""image""][""tmp_name""];
    $name = basename($_FILES[""image""][""name""]);
    $parts = explode(""."", $name);
    $ext = array_pop($parts);

    if (empty($parts[0])) {
        array_shift($parts);
    }

    if (count($parts) === 0) {
        die(""Filename is empty"");
    }

    if (in_array($ext, $disallowed_ext, TRUE)) {
        die(""Invalid file extension"");
    }

    $image = file_get_contents($tmp_name);
    if (mb_strpos($image, ""<?"") !== FALSE) {
        die(""Invalid file content"");
    }

    if (!exif_imagetype($tmp_name)) {
        die(""Invalid image format"");
    }

    $image_size = getimagesize($tmp_name);
    if ($image_size[0] !== 1337  || $image_size[1] !== 1337) {
        die(""Invalid image dimensions"");
    }

    $name = implode(""."", $parts);
    move_uploaded_file($tmp_name, $userdir . $name . ""."" . $ext);
}

echo ""<h3>Your <a href='"".htmlspecialchars($userdir).""'>files</a>:</h3><ul>"";
foreach(glob($userdir . ""*"") as $file) {
    echo ""<li><a href='"".htmlspecialchars($file).""'>"".htmlspecialchars($file).""</a></li>"";
}
echo ""</ul>"";
?>

<h1>Upload your pics!</h1>
<form method=""POST"" action=""?"" enctype=""multipart/form-data"">
    <input type=""file"" name=""image"">
    <input type=""submit"" name=""upload"">
</form>
<?php
// End of PHP code
?>