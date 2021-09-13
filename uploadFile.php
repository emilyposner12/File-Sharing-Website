<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Upload a File</title>
  </head>
  <body>
    <form enctype="multipart/form-data" action="uploader.php" method="POST">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
        </p>
        <p>
            <input type="submit" value="Upload File" />
        </p>
    </form>
    <?php
      echo "<td><a href = 'usermainpage.php'> Go back </a></td?";
    ?>
    
  </body>
</html>