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
          var_dump(rename($file, $file.'.jpg'));
          try {
            // SQLに接続
            $pdo=new PDO('mysql:host=localhost;dbname=videos;charset=utf8', 'admin', 'password');
            $sql=$pdo->prepare('insert into list values(?, ?, ?)');
            $filename=$file.'.jpg';
            if ($sql->execute([$_REQUEST['title'], $_REQUEST['uploader'], $filename])) {
                echo '<br>', $file, ' has been uploaded!';
                echo '<br>Title: ', $_REQUEST['title'], '<br>';
                echo 'Uploader: ', $_REQUEST['uploader'], '<br>';
            } else {
              // SQLにデータを追加できなかった場合
            echo '<br>Could not upload ', $file, ' to SQL database';
            echo '<br>Title: ', $_REQUEST['title'], '<br>';
            echo 'Uploader: ', $_REQUEST['uploader'], '<br>';
            print_r ($sql -> errorInfo());
            }
          } catch (PDOException $e) {
            // SQLに接続できなかった場合
              echo 'Cannot connect to SQL';
            }
          } else {
            // ファイルをuploadに移動できなかった場合
          echo 'Could not upload ', $file;
        }
      } else {
        // is_uploaded_fileがfalseを返した場合
        echo $_FILES['video']['tmp_name'], ' is not uploaded file';
        echo '<br>';
        echo 'ERROR CODE: ', $_FILES['video']['error'];
      }
    ?>
    <br><a href="./home.php">Back to Home</a>
    <br><a href="./upload.php">Back to Upload</a>
  </body>
</html>
