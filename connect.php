<?php
include("connect.php");
$emp_id = $_POST['emp_id'];
$sqlStr = "SELECT * FROM `employee` ";
//echo $sqlStr . "<br>";
$result = mysql_query($sqlStr);
$count = mysql_num_rows($result);


echo '<table>
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>date of joining</th>
        <th>date of living in service</th>
        <th>salary</th>
    </tr>';

while ($row = mysql_fetch_array($result)) {
    echo '
        <tr>
            <td>'.$row['emp_id'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['DOJ'].'</td>
            <td>'.$row['DLS'].'</td>
            <td>'.$row['salary'].'</td>
        </tr>';

}

echo '
</table>';
?>
