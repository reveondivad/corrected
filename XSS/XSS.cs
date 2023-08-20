<?php

require_once('../_helpers/strip.php');

libxml_disable_entity_loader (true);

$xml = isset($_GET['xml']) && strlen($_GET['xml']) > 0 ? htmlentities($_GET['xml']) : '<root><content>No XML found</content></root>';

$document = new DOMDocument();
$document->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
$parsedDocument = simplexml_import_dom($document);

echo htmlspecialchars($parsedDocument->content);