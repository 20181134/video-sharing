<html>
  <head>
    <meta charset="utf-8">
    <title>Result</title>
  </head>
  <body>
    <!-- video-output.php -->
    <?php
      if (is_uploaded_file($_FILES['video']['tmp_name'])) {
        if (!file_exists('upload')) {
          mkdir ('upload');
        }
        $file='upload/'.basename($_FILES['video']['tmp_name']);
        if (move_uploaded_file($_FILES['video']['tmp_name'], $file)) {
          echo 'Moved uploaded file to /upload';
          $pdo=new PDO('mysql:host=localhost;dbnaame=videos;charset=utf8', 'admin', 'password');
          $sql=$pdo->prepare('insert into list values(?, ?, ?)');
          if ($sql->execute([$_REQUEST['title'], $_REQUEST['uploader'], $_FILES['video']['tmp_name']])) {
            echo '<br>', $file, ' has been uploaded!';
          } else {
            echo '<br>Could not add ', $file, ' to SQL database';
          }

        } else {
          echo 'Could not upload ', $file;
        }
      } else {
        echo $_FILES['video']['tmp_name'], ' is not uploaded file';
        echo '<br>';
        echo 'ERROR CODE: ', $_FILES['video']['error'];
      }
     ?>
   </body>
   </html>
