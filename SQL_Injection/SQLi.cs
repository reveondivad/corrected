<?php

require_once('../_helpers/strip.php');

$db = new SQLite3('test.db');

if (!isset($_GET['id']) || strlen($_GET['id']) < 1) {
  echo 'Usage: ?id=1';
} else {
  $id = SQLite3::escapeString($_GET['id']);
  $stmt = $db->prepare('SELECT COUNT(*) FROM secrets WHERE id = :id');
  $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
  $result = $stmt->execute();
  $count = $result->fetchArray()[0];

  if ($count > 0) {
    echo 'Yes!';
  } else {
    echo 'No!';
  }
}