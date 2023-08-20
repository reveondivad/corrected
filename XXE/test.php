<?php
libxml_disable_entity_loader (true);
$xmlfile = file_get_contents('php://input');
$dom = new DOMDocument();
$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
$info = simplexml_import_dom($dom);
$name = htmlentities($info->name);
$tel = htmlentities($info->tel);
$email = filter_var($info->email, FILTER_SANITIZE_EMAIL);
$password = password_hash($info->password, PASSWORD_DEFAULT);

echo ""Sorry, $email is already registered!"";
?>