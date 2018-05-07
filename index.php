<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Test Page.</title>
  </head>
  <body>
    <header>This is for testing purposes only</header>
    <p>Test Form</p>
    <form action="container.php" method="POST" enctype="multipart/form-data">
      <label for="thisfile">
        Please choose a file: </label>
      <input type="file" name="file" id="thisfile"/><br/>
      <input type="text" name="make" id="make"/>
      <input type="text" name="model" id="model"/>
      <input type="text" name="year" id="year"/>
      <input type="submit" name="submit" value="Enter."/><br/><br/>
      <p>Uploaded Cars.</p><br/>
      <?php //echo file_get_contents ('fileslist.txt'); ?>
    </form>
    <?php require 'database.php'; ?>
  </body>
</html>
