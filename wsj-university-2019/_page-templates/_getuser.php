<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);



$con = mysqli_connect('localhost','root','root','WSJU2');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql = "SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<div class=\"repHolder\">";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<strong><p>" . $row['State'] . "</p></strong><br />";
    echo "<p>" . $row['Name'] . "</p><br />";
    echo "<p><a href=" . $row['EmailAddress'] . ">" . $row['EmailAddress'] . "</a></p><br />";
    echo "</tr>";
}
echo "</div>";
mysqli_close($con);
?>
</body>
</html>