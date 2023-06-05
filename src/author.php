<?php
/**
 * This page show's an author's profile
 * PDO Library Management example application
 * @author Dennis Popel
 */
// Don't forget the include
include 'common.inc.php';
// Get the author
$id = (int) $_REQUEST['id'];

$q      = $conn->query("SELECT * FROM authors WHERE id=$id");
$author = $q->fetch(PDO::FETCH_ASSOC);
$q->closeCursor();

// Now see if the author is valid - if it's not,
// we have an invalid ID
if (!$author) {
    showHeader('Error');
    echo "Invalid Author ID supplied";
    showFooter();
    exit;
}

// Display the header - we have no error
showHeader("Author: $author[firstName] $author[lastName]");
// Now fetch all his books
$q = $conn->query("SELECT * FROM books WHERE author=$id ORDER
BY title");

$q->setFetchMode(PDO::FETCH_ASSOC);
// now display everything
?>

<h2>Author</h2>
<table width="60%" border="1" cellpadding="3">
<tr>
<td><b>First Name</b></td>
<td><?=htmlspecialchars($author['firstName'])?></td>
</tr>
<tr>
<td><b>Last Name</b></td>
<td><?=htmlspecialchars($author['lastName'])?></td>
</tr>
<tr>
<td><b>Bio</b></td>
<td><?=htmlspecialchars($author['bio'])?></td>
</tr>
</table>
<h2>Books</h2>
<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>Title</td>
<td>ISBN</td>
<td>Publisher</td>
<td>Year</td>
<td>Summary</td>
</tr>
<?php
// Now iterate over every book and display it
while ($r = $q->fetch()) {
    ?>
<tr>
<td><?=htmlspecialchars($r['title'])?></td>
<td><?=htmlspecialchars($r['isbn'])?></td>
<td><?=htmlspecialchars($r['publisher'])?></td>
<td><?=htmlspecialchars($r['year'])?></td>
<td><?=htmlspecialchars($r['summary'])?></td>
</tr>
<?php
}
?>
</table>
<?php
// Display footer
showFooter();