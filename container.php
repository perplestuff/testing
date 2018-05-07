<?php
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

require 'fileclass.php';

$up = new files (
  'uploads/',
  'fileslist.txt',
  array ('jpg', 'jpeg', 'png', 'gif'),
  100000,
  10,
  25
);
if (isset ($_FILES ['file'])) {
  $up ->upload ($_FILES ['file'], $_POST['make'], $_POST['model'], $_POST['year']);
} else {
  echo ("couldnt recive file.");
}

header ('Location: localhost:8000/index.php');
