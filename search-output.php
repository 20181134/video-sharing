<html>
    <head>
        <meta charset="utf-8">
        <title>Result</title>
    </head>
    <body>
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=videos;charset=utf8', 'admin', 'password');
        $sql=$pdo->prepare('SELECT * FROM list WHERE title='.$_REQUEST['word']);
        if ($sql->execute()) {
            foreach ($pdo->query('SELECT * FROM list WHERE title='.$_REQUEST['title']) as $row) {
                echo '<div class="pics">';
                echo '<a href="./', $row['uploaded_file'], '">';
                echo '<img src="', $row['uploaded_file'], '"><br>';
                echo $row['title'], '<br> Uploaded by: ';
                echo $row['uploader'];
                echo '</a></div>';
            }

        } else {
            echo 'Could not connect to SQL';
        }
        ?>
    </body>
</html>