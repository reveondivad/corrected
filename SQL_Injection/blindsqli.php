<?php
$user = mysqli_real_escape_string($_POST['user']);
$pass = mysqli_real_escape_string($_POST['pass']);
if($_GET['act']=='logout'){
    session_unset();
    $contenttowrite = $contenttowrite.'<tr><td colspan=""2"">Çıkış yaptınız!</td></tr>';
}else if($_GET['act']=='login'){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if (!$link) die (""Out of service"");
    $queryusercheck = mysqli_prepare($link, ""SELECT count(id) FROM cc_users WHERE USERNAME=? AND PASSWORD=?"");
    mysqli_stmt_bind_param($queryusercheck, ""ss"", $user, computeHash($user, $pass));
    mysqli_stmt_execute($queryusercheck);
    $usercheck_value = mysqli_stmt_get_result($queryusercheck);
}
?>