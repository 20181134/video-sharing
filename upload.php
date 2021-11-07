<html>
  <head>
    <meta charset="utf-8">
    <title>Video Sharing</title>
  </head>
  <body>
    <!-- Upload Page -->
    <form action="video-output.php" method="post" enctype="multipart/form-data">
      <h1>NOTE: Please upload .jpg or .png file</h1>
      Title: <input type="text" name="title"><br>
      Video: <input type="file" name="video"><br>
      Uploader name: <input type="text" name="uploader">
      <input type="submit" value="Upload">
    </form>
    <p>Title and uploader name must be within 50 characters</p>
  </body>
</html>
