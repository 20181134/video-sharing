<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <a href="http://localhost/video-sharing/upload.php">Upload</a>
    <h1>Home</h1>
    <h2>Uploaded videos</h2>
    <?php
      $sql = "SELECT * FROM videos";
      $stmt = $dbh->query($sql);
      foreach ($stmt as $row) {
        echo $row['title'].' Uploaded by: '.$row['uploader'];
        echo '<br>';
      }
     ?>
  </body>
</html>
