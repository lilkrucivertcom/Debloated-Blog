<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password_file = "password.txt";
    $password_hash = file_get_contents($password_file);
    if (password_verify($_POST["password"], $password_hash)) {
$title = $_POST["title"];
$description = $_POST["description"];
$filename = uniqid() . ".txt";
$articles_folder = "articles/";
$filepath = $articles_folder . $filename;
$content = $title . "\n" . $description;
$result = file_put_contents($filepath, $content);
        if ($result !== false) {
            echo "Article saved successfully!";
        } else {
            echo "Error saving article.";
        }
    } else {
        echo "Incorrect password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>post</title>
</head>
<body>
    <h1>New Article</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="password">Password:</label>
        <input type="password" name="password"><br><br>
        <label for="title">Title:</label>
        <input type="text" name="title"><br><br>
        <label for="description">Description:</label><br>
        <textarea name="description" rows="5" cols="40"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
