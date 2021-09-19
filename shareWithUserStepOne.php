<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel = "stylesheet" href = "homepageStylesheet.css">
    <meta charset="UTF-8">
    <title>Share a File</title>
  </head>
  <body>
  <?php
    session_start();
      $fileToShare = (string)htmlentities($_GET['fileToShare']);
      $_SESSION['fileToShare'] = $fileToShare;
    ?>
    <br>
    <br>
    <form action = "shareWithUserStepTwo.php" method = "POST" class = "center">
      <p>
          Enter username you want to share file with: 
        <label for = "usernameToShareWith">: </label>
        <input type = "text" id = "usernameToShareWith" name = "usernameToShareWith">
        <input type="submit" value="Share File">
      </p>
    </form>
  </body>
</html>