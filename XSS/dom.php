<?php

require_once('../_helpers/strip.php');

$name = strip_tags($_GET['name']);

echo 'Hello, ' . htmlentities($name, ENT_QUOTES, 'UTF-8');