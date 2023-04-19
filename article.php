<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>POST</title>
  </head>
  <body>
    <div class='bg'>
      <?php
      $article_name = $_GET["name"];
      $article_file = "articles/" . $article_name . ".txt";
      if (file_exists($article_file)) {
          $content = file_get_contents($article_file);
          $lines = explode("\n", $content);
          $title = trim($lines[0]);
          $description = trim($lines[1]);
          $creation_time = date("F j, Y, g:i a", filemtime($article_file));
          echo "<h2>$title</h2>";
	  echo "<p>time of post: $creation_time</p>";
          echo "<p>$description</p>";
          echo "<p><a href='index.php'>Back to main page</a></p>";
      } else {
          echo "<h2>Article not found.</h2>";
      }
      ?>
    </div>
  </body>
</html>