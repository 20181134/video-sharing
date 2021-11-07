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
          $filename=$_FILES['video']['tmp_name'].'.jpg';
          // Last change
          if ($sql->execute([$_REQUEST['title'], $_REQUEST['uploader'], $filename])) {
            echo '<br>', $file, ' has been uploaded!';
          } else {
            echo '<br>Could not upload ', $file, ' to SQL database';
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
     <br><a href="http://localhost/GitHub/video-sharing/home.php">Back to Home</a>
     <br><a href="http://localhost/GitHub/video-sharing/upload.php">Back to Upload</a>
   </body>
   </html>
