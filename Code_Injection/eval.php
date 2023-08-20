<?php

require_once('../_helpers/strip.php');

$variable = isset($_GET['variable']) && strlen($_GET['variable']) > 0 ? strip_tags($_GET['variable']) : 'empty';
$empty = 'No variable given';

if($variable == 'empty') {
    echo $empty;
} else {
    echo $variable;
}