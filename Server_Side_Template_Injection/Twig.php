<?php

require_once('../_helpers/strip.php');

$db = new SQLite3('test.db');

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id < 1) {
  echo 'Usage: ?id=1';
} else {
  $stmt = $db->prepare('SELECT COUNT(*) FROM secrets WHERE id = :id');
  $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
  $result = $stmt->execute();

  $count = 0;
  if ($result) {
    $count = $result->fetchArray(SQLITE3_NUM)[0];
  }

  if ($count > 0) {
    echo 'Yes!';
  } else {
    echo 'No!';
  }
}