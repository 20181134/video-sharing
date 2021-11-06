<html>
  <head>
    <meta charset="utf-8">
    <title>Result</title>
  </head>
  <body>
    <!-- video-output.php -->
    <?php
      $file='upload/'.basename($_FILES['video']['tmp_name']);
      if (is_uploaded_file($_FILES['video']['tmp_name'])) {
        if (!file_exists('upload')) {
          mkdir ('upload');
        }
        if (move_uploaded_file($_FILES['video']['tmp_name'], $file)) {
          $sql = "INSERT INTO videos (title, uploader) VALUES (:title, :uploader)";
          $stmt = $dbh->prepare($sql);
          $params = array(':title' => $_REQUEST['title'], ':uploader' => $_REQUEST['uploader']);
          $stmt->execute($params);
          echo $file, 'has been uploaded!';
        } else {
          echo 'Could not upload ', $file;
        }
      } else {
        echo $file, ' is not uploaded file';
      }
     ?>
   </body>
   </html>
