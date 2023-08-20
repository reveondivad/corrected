<?php

require_once('../_helpers/strip.php');

$db = new SQLite3('test.db');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
  $query = $db->prepare('select * from secrets where id = :id');
  $query->bindValue(':id', $id, SQLITE3_INTEGER);
  $result = $query->execute();

  while ($row = $result->fetchArray()) {
    echo 'Secret: ' . htmlentities($row['secret']);
  }

  echo '<br /><br /><a href=""/"">Go back</a>';
} else {
  $query = $db->query('select * from secrets where user_id = 1');

  echo '<strong>Your secrets</strong><br /><br />';

  while ($row = $query->fetchArray()) {
    echo '<a href=""/?id=' . htmlentities($row['id']) . '"">#' . htmlentities($row['id']) . '</a><br />';
  }
}
?>