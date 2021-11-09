<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <a href="http://localhost/GitHub/video-sharing/upload.php">Upload</a>
    <hr>
    <h1>Home</h1>
    <h2>Uploaded Pictures</h2>
    <?php
      $pdo=new PDO ('mysql:host=localhost;dbname=videos;charset=utf8', 'admin', 'password');
      foreach ($pdo->query('select * from list') as $row) {
        echo '<a href="http://localhost/GitHub/video-sharing/', $row['uploaded_file'], '">';
        echo $row['title'], ' Uploaded by: ';
        echo $row['uploader'];
        echo '</a><br>';
      }
    ?>
  </body>
</html>
