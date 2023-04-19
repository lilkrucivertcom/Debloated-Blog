<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>blog</title>
  </head>
  <body>
      <h1>Welcome to my blog</h1>
      <h2>it is minimal. runs only on a few php files.</h2>
      <?php
      $articles_folder = "articles/";
      $article_files = glob($articles_folder . "*.txt");
      usort($article_files, function($a, $b) {
          return filemtime($b) - filemtime($a);
      });
      foreach ($article_files as $article_file) {
          $content = file_get_contents($article_file);
          $lines = explode("\n", $content);
          $title = trim($lines[0]);
          $description = trim($lines[1]);
          $creation_time = date("F j, Y, g:i a", filemtime($article_file));
          $article_name = basename($article_file, ".txt");
          $article_link = "article.php?name=" . urlencode($article_name);
          echo "<h2><a href=\"$article_link\">$title</a></h2>";
      }
      ?>
  </body>
</html>
