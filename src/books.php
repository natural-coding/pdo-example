<?php
/**
 * This page lists all the books we have
 * PDO Library Management example application
 * @author Dennis Popel
 */
// Don't forget the include
include 'common.inc.php';

// Issue the query
$q = $conn->query("SELECT authors.id AS authorId, firstName,
lastName, books.* FROM authors, books WHERE
author=authors.id
ORDER BY title");
$q->setFetchMode(PDO::FETCH_ASSOC);

// Display the header
showHeader('Books');

// now create the table
?>
<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>Author</td>
<td>Title</td>
<td>ISBN</td>
<td>Publisher</td>
<td>Year</td>
<td>Summary</td>
    <td>Edit</td>
</tr>

<?php
// Now iterate over every row and display it
while ($r = $q->fetch()) {
    ?>
   <tr>
   <td><a href="author.php?id=<?=$r['authorId']?>">
   <?=htmlspecialchars("$r[firstName] $r[lastName]")?></a></td>
   <td><?=htmlspecialchars($r['title'])?></td>
   <td><?=htmlspecialchars($r['isbn'])?></td>
   <td><?=htmlspecialchars($r['publisher'])?></td>
   <td><?=htmlspecialchars($r['year'])?></td>
   <td><?=htmlspecialchars($r['summary'])?></td>
       <td><a href="editBook.php?book=<?=$r['id']?>">Edit</a>  </td>
   </tr>
<?php
}
?>

</table>


    <a href="editBook.php">Add book...</a>
<?php
// Display footer
showFooter();