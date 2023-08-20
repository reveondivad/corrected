<?php
if (isset($_GET['go']) && filter_var($_GET['go'], FILTER_VALIDATE_URL)) {
    header('Location: '.$_GET['go']);
    die();
}
?>