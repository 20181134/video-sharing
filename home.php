<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <a href="upload.php">Upload</a>
    <hr>
    <h1>Home</h1>
    <h2>Uploaded Pictures</h2>
    <?php
      $pdo=new PDO ('mysql:host=localhost;dbname=videos;charset=utf8', 'admin', 'password');
      foreach ($pdo->query('select * from list') as $row) {
        echo '<div class="pics">';
        echo '<a href="./', $row['uploaded_file'], '">';
        echo '<img src="', $row['uploaded_file'], '"><br>';
        echo $row['title'], '<br> Uploaded by: ';
        echo $row['uploader'];
        echo '</a></div>';
      }
    ?>
  </body>
</html>
