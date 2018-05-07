<?php

class files {
  //set properties
  private $dir,
    $info,
    $formats,
    $maxSize,
    $maxLines,
    $maxName;

  public function __construct ($dir, $info, $format, $Size, $Lines, $Name) {
    //give properties correct values
    $this ->dir = $dir;
    $this ->info = $info;
    $this ->formats = $format;
    $this ->maxSize = $Size;
    $this ->maxLines = $Lines;
    $this ->maxName = $Name;
  }

  public function upload ($file, $make, $model, $year) {
    //get file info
    $fileT = $file ['type'];
    $fileS = $file ['size'];
    $fileN = htmlspecialchars ($file ['name']);
    $fileTN = $file ['tmp_name'];
    //get file extension
    $ext = explode ('.', $fileN);
    $fileEXT = strtolower (end ($ext));
    //filter file
    if (in_array ($fileEXT, $this ->formats)) { //check if file is right format
      if ($fileS < $this ->maxSize){ //check if file is right size
        if (strlen ($fileN) < $this ->maxName) { //check if file name is right length
          move_uploaded_file ($fileTN, $this ->dir.$fileN); //move file to directory
          $un = 'root';
          $pw = 'hue';

          $database = new mysqli ('localhost', $un, $pw, 'test_db');
          if ($database ->connect_error) die ($database ->connect_error);

          $query = "insert into cars(pic, make, model, year) values('$fileN', '$make', '$model', '$year');";
          $result = $database ->query ($query);
          if (!$result) die ($database ->error);
          // file_put_contents ($this ->info, $fileN.'<br/> '.'<img src='.$this ->dir.$fileN.'/>'.' <br/>', FILE_APPEND.PHP_EOL);
        } else {
          die ('name string is too big.');
        }
      } else {
        die ('file size is too big.');
      }
    } else {
      die ('unsupported format.');
    }
  }
}
