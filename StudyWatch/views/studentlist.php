<?php

global $connection;
$result = mysqli_query($connection,"SELECT * FROM studenten");

echo "<table border='1'>
<tr>
<th>Naam</th>
<th>Implementeren & Testen</th>
<th>Digitale Wereld</th>
<th>Multimedia & Design</th>
<th>Interaction Design</th>
<th>Schriftelijke Communicatie</th>
<th>Organisatie & Management</th>
</tr>";

while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['Naam'] . "</td>";
echo "<td>" . $row['A. Implementeren & Testen'] . "</td>";
echo "<td>" . $row['A. Digitale Wereld'] . "</td>";
echo "<td>" . $row['A. Multimedia & Design'] . "</td>";
echo "<td>" . $row['A. Interaction Design'] . "</td>";
echo "<td>" . $row['A. Schriftelijke Communicatie'] . "</td>";
echo "<td>" . $row['A. Organisatie & Management'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($connection);

?>