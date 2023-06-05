<?php
/**
 * This page lists all the authors we have
 * PDO Library Management example application
 * @author Dennis Popel
 */
// Don't forget the include
include 'common.inc.php';

// Issue the query
$q = $conn->query("SELECT * FROM authors ORDER BY lastName,firstName");

// Display the header
showHeader('Authors');

// now create the table
?>

<table width="100%" border="1" cellpadding="3">
<tr style="font-weight: bold">
<td>First Name</td>
<td>Last Name</td>
<td>Bio</td>
</tr>

<?php
// Now iterate over every row and display it
while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
    ?>

<tr>
    <td><?=htmlspecialchars($r['firstName'])?></td>
    <td><?=htmlspecialchars($r['lastName'])?></td>
    <td><?=htmlspecialchars($r['bio'])?></td>
    <td>
        <a href="editAuthor.php?author=<?=$r['id']?>">Edit</a>
    </td>
</tr>

<?php
}
?>

</table>

    <a href="editAuthor.php">Add author...</a>
<?php
// Display footer
showFooter();
