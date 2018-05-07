<?php

$un = 'root';
$pw = 'hue';

$database = new mysqli (localhost, $un, $pw, 'test_db');
if ($database ->connect_error) die ($database ->connect_error);

$query = 'select * from cars;';
$result = $database ->query ($query);
if (!$result) die ($database ->error);

$row = $result ->num_rows;

for ($i = 0; $i < $row; ++$i) {
  $data = $result ->fetch_assoc();
  printf ("
  pic: <br/><img src='uploads/%s' /><br/>
  make: %s  <br/>
  model: %s <br/>
  year: %s <br/>",
  $data['pic'], $data['make'], $data['model'], $data['year']);
}
?>
