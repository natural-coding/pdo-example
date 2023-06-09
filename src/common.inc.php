<?php
/**
 * This is a common include file
 * PDO Library Management example application
 * @author Dennis Popel
 */
// DB connection string and username/password
$connStr = 'mysql:host=localhost;dbname=pdo';
$user    = 'root';
$pass    = '';
/**
 * This function will render the header on every page,
 * including the opening html tag,
 * the head section and the opening body tag.
 * It should be called before any output of the
 * page itself.
 * @param string $title the page title
 */
function showHeader($title)
{
    ?>
<html>
<head><title><?=htmlspecialchars($title)?></title></head>
<body>
<h1><?=htmlspecialchars($title)?></h1>
<a href="books.php">Books</a>
<a href="authors.php">Authors</a>
<hr>
<?php
}
/**
 * This function will 'close' the body and html
 * tags opened by the showHeader() function
 */
function showFooter()
{
    ?>
</body>
</html>
<?php
}
/**
 * This function will display an error message, call the
 * showFooter() function and terminate the application
 * @param string $message the error message
 */
function showError($message)
{
    echo "<h2>Error</h2>";
    echo nl2br(htmlspecialchars($message));
    showFooter();
    exit();
}
// Create the connection object
try
{
    $conn = new PDO($connStr, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    showHeader('Error');
    showError("Sorry, an error has occurred. Please try your request
later\n" . $e->getMessage());
}
