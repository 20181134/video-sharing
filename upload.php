<html>
  <head>
    <meta charset="utf-8">
    <title>Video Sharing</title>
  </head>
  <body>
    <!-- Upload Page -->
    <form action="video-output.php" method="post">
      <enctype="multipart/form-data">
      Title: <p><input type="text" name="title"></p><br>
      Video: <p><input type="file" name="video"></p><br>
      Uploader name: <p><input type="text" name="uploader"></p>
      <p><input type="submit" value="Upload"></p>
    </form>
    <p>You can only upload .mov or .mp4 file</p>
    <p>Title and uploader name must be within 50 characters</p>
  </body>
</html>
